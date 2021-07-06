<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateCompany;
use App\Http\Resources\CompanyResource;
use App\Jobs\CompanyCreated;
use App\Models\Company;
use App\Services\CompanyService;
use App\Services\EvaluationService;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    protected $evaluationService;
    protected $companyService;

    public function __construct(EvaluationService $evaluationService, CompanyService $companyService)
    {
        $this->evaluationService = $evaluationService;
        $this->companyService = $companyService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $companies = $this->companyService->getCompanies($request->get('filter', ''));

        return CompanyResource::collection($companies);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateCompany $request)
    {
        $company = $this->companyService->createNewCompany($request->validated(), $request->image);

        CompanyCreated::dispatch($company->email)
                            ->onQueue('queue_email');

        return new CompanyResource($company);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $uuid
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        $company = $this->companyService->getCompanyByUUID($uuid);

        $evaluations = $this->evaluationService->getEvaluationsCompany($uuid);

        return (new CompanyResource($company))
                        ->additional([
                           'evaluations' => json_decode($evaluations)
                        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $uuid
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateCompany $request, $uuid)
    {
        $this->companyService->updateCompany($uuid, $request->validated(), $request->image);

        return response()->json([
            'message' => 'Updated'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $uuid
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        $this->companyService->deleteCompany($uuid);

        return response()->json([], 204);
    }
}
