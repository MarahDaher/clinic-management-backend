<?php

namespace App\Repositories;

use App\Models\Clinic;
use App\Repositories\Interfaces\ClinicRepositoryInterface;

class ClinicRepository implements ClinicRepositoryInterface
{
    public function getAll()
    {
        return Clinic::all();
    }

    public function findById($id): Clinic
    {
        return Clinic::find($id);
    }

    public function create(array $data): Clinic
    {
        return Clinic::create($data);
    }

    public function update($id, array $attributes)
    {
        $Clinic = Clinic::findOrFail($id);
        $Clinic->update($attributes);
        return $Clinic;
    }

    public function delete($id)
    {
        $Clinic = Clinic::findOrFail($id);
        return $Clinic->delete();
    }
}
