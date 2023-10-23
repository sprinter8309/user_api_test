<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Controllers\Controller;
use App\Services\UserService;
use App\Models\Dto\UserDto;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function __construct(protected UserService $user_service)
    {
        $this->user_service = $user_service;
    }
    
    public function userView(string $user_id): JsonResponse
    {
        return response()->json($this->user_service->getSingleUser($user_id));
    }
    
    public function userList(): JsonResponse
    {
        return response()->json($this->user_service->getUserList());
    }
    
    public function userAdd(CreateUserRequest $request): JsonResponse 
    {
        return response()->json($this->user_service->addNewUser(UserDto::loadFromArray($request->all())));        
    }
    
    public function userUpdate(UpdateUserRequest $request): JsonResponse
    {
        return response()->json($this->user_service->updateUserData(UserDto::loadFromArray($request->all())));
    }
    
    public function userDelete(string $user_id): JsonResponse 
    {
        return response()->json($this->user_service->deleteUserData($user_id));
    }
}

