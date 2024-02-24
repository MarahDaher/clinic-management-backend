<?php

namespace App\Http\Controllers\Api;

use App\Http\Collections\ClinicCollection;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Clinic\CreateClinicRequest;
use App\Http\Resources\Clinic\ClinicResource;
use App\Services\ClinicService;
use Illuminate\Http\Request;

class ClinicController extends BaseController
{
    private ClinicService $clinicService;

    public function __construct(ClinicService $clinicService)
    {
        $this->clinicService = $clinicService;
    }

    public function index()
    {
        return $this->respond(new ClinicCollection($this->clinicService->getAllClinics()));
    }

    public function store(CreateClinicRequest $request)
    {
        $createRole = $this->clinicService->createClinic($request->all());
        return $this->respond(new ClinicResource($createRole));
    }
}
