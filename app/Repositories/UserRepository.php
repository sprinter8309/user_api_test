<?php

namespace App\Repositories;

use App\Models\User;
use App\Constants\UserConst;
use Illuminate\Database\Eloquent\Collection;

class UserRepository
{
    public function getUserById(string $user_id): ?User
    {
        return User::where('id', $user_id)
                   ->where('is_delete', UserConst::USER_IS_NOT_DELETED)->first();
    }
    
    public function getAllUsers(): Collection
    {
        return User::where('is_delete', UserConst::USER_IS_NOT_DELETED)->get();
    }
    
    public function editUser(User $new_user): bool
    {
        return $new_user->save();
    }
    
    public function deleteUser(string $user_id): bool
    {
        $delete_user = $this->getUserById($user_id);
        $delete_user->is_delete = UserConst::USER_IS_DELETED;
        return $delete_user->save();
    }    
}
