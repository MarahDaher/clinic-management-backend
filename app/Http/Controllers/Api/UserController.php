<?php

namespace App\Http\Controllers\Api;

use App\Http\Collections\UserCollection;
use App\Http\Controllers\BaseController;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Resources\User\UserResource;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        return $this->respond(new UserCollection($this->userService->getAllUsers()));
    }

    public function show($id)
    {
        return $this->respond($this->userService->findUserById($id));
    }

    public function store(CreateUserRequest $request)
    {
        $createUser = $this->userService->createUser($request->all());
        return $this->respond(new UserResource($createUser));
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $updateUser = $this->userService->updateUser($request->all(), $id);
        return $this->respond(new UserResource($updateUser));
    }
}
