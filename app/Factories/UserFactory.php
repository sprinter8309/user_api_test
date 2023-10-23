<?php

namespace App\Factories;

use App\Models\User;
use App\Models\Dto\UserDto;

class UserFactory
{
    public function createUser(UserDto $create_user_dto): User
    {
        $new_user = new User();
        
        $new_user->email = $create_user_dto->email;
        $new_user->name = $create_user_dto->name;
        $new_user->age = $create_user_dto->age ?? null;
        $new_user->sex = $create_user_dto->sex;
        $new_user->birthday = $create_user_dto->birthday ?? null;
        $new_user->phone = $create_user_dto->phone;
        
        return $new_user;
    }
}
