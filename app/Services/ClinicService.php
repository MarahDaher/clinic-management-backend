<?php

namespace App\Services;

use App\Models\Clinic;
use App\Repositories\Interfaces\ClinicRepositoryInterface;

class ClinicService
{
    protected $clinicRepository;

    public function __construct(ClinicRepositoryInterface $clinicRepository)
    {
        $this->clinicRepository = $clinicRepository;
    }

    public function getAllClinics()
    {
        return $this->clinicRepository->getAll();
    }

    public function createClinic(array $data): Clinic
    {
        $createClinic = $this->clinicRepository->create($data);
        return $createClinic;
    }
}
