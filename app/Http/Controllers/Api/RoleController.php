<?php

namespace App\Http\Controllers\Api;;
use App\Http\Collections\RoleCollection;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Role\CreateRoleRequest;
use App\Http\Resources\Role\RoleResource;
use App\Services\RoleService;
use Illuminate\Http\Request;

class RoleController extends BaseController
{
    private RoleService $roleService;

    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }

    public function index()
    {
        return $this->respond(new RoleCollection($this->roleService->getAllRoles()));
    }

    public function show($id)
    {
        return $this->respond($this->roleService->findById($id));
    }

    public function store(CreateRoleRequest $request)
    {
        $createRole = $this->roleService->createRole($request->all());
        return $this->respond(new RoleResource($createRole));
    }
}
