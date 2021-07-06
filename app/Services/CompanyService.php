<?php

namespace App\Services;

use App\Models\Company;

class CompanyService
{
    protected $repository;

    public function __construct(Company $company)
    {
        $this->repository = $company;
    }

    public function getCompanies(string $filter = '')
    {
        return $this->repository
                        ->getCompanies($filter);
    }

    public function createNewCompany(array $data)
    {
        return $this->repository->create($data);
    }

    public function getCompanyByUUID(string $uuid = null)
    {
        return $this->repository->where('uuid', $uuid)->firstOrFail();
    }

    public function deleteCompany(string $uuid = null)
    {
        $company = $this->getCompanyByUUID($uuid);

        return $company->delete();
    }

    public function updateCompany(string $uuid = '', array $data)
    {
        $company = $this->getCompanyByUUID($uuid);

        $company->update($data);

        return $company->delete();
    }
}
