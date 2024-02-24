<?php

namespace App\Repositories\Interfaces;

use App\Models\Clinic;

interface ClinicRepositoryInterface
{
    public function getAll();
    public function findById($id): Clinic;
    public function create(array $data): Clinic;
    public function update($id, array $data);
    public function delete($id);
}
