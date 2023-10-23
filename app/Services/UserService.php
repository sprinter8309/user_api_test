<?php

namespace App\Services;

use App\Factories\UserFactory;
use App\Repositories\UserRepository;
use App\Models\Dto\UserDto;
use App\Models\User;
use App\Constants\UserConst;
use App\Helpers\ResponseHelper;
use Illuminate\Database\Eloquent\Collection;

class UserService
{
    public function __construct(protected UserRepository $user_repository,
                                protected UserFactory $user_factory)
    {
        $this->user_repository = $user_repository;
        $this->user_factory = $user_factory;
    }
    
    public function getSingleUser(string $user_id): ?User
    {
        return $this->user_repository->getUserById($user_id);
    }
    
    public function getUserList(): Collection
    {
        return $this->user_repository->getAllUsers();  
    }

    public function addNewUser(UserDto $create_user_dto): array
    {
        $new_user = $this->user_factory->createUser($create_user_dto);
        
        if ($this->user_repository->editUser($new_user)) {
            return ResponseHelper::message(UserConst::USER_ADD_SUCCESS);
        } else {
            return ResponseHelper::message(UserConst::USER_ADD_ERROR);
        }
    }
    
    public function updateUserData(UserDto $update_user_dto): array
    {
        $editUserRecord = $this->user_repository->getUserById($update_user_dto->id);
        
        $editUserRecord->email = ($update_user_dto->email) ?? $editUserRecord->email;
        $editUserRecord->name = ($update_user_dto->name) ?? $editUserRecord->name;
        $editUserRecord->age = ($update_user_dto->age) ?? $editUserRecord->age;
        $editUserRecord->sex = ($update_user_dto->sex) ?? $editUserRecord->sex;
        $editUserRecord->birthday = ($update_user_dto->birthday) ?? $editUserRecord->birthday;
        $editUserRecord->phone = ($update_user_dto->phone) ?? $editUserRecord->phone;
          
        if ($this->user_repository->editUser($editUserRecord)) {
            return ResponseHelper::message(UserConst::USER_UPDATE_SUCCESS);
        } else {
            return ResponseHelper::message(UserConst::USER_UPDATE_ERROR);
        }
    }
    
    public function deleteUserData(string $user_id): array
    {
        if ($this->user_repository->deleteUser($user_id)) {
            return ResponseHelper::message(UserConst::USER_DELETE_SUCCESS);
        } else {
            return ResponseHelper::message(UserConst::USER_DELETE_ERROR);
        }
    }
}
