<?php

namespace App\Services;

use App\Services\Traits\ConsumeExternalService;

class EvaluationService
{
    use ConsumeExternalService;

    protected $url;
    protected $token;

    public function __construct()
    {
        $this->token = config('services.micro_02.token');
        $this->url = config('services.micro_02.url');
    }

    public function getEvaluationsCompany(string $company)
    {
        $response = $this->request('get', "/evaluations/{$company}");

        return $response->body();
    }
}
