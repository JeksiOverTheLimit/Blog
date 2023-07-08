<?php
namespace App\Services;
use App\Models\User;


class UserService{
     
    public function findByUserId(int $userId): User
    {
        $user = User::find($userId);
        return $user;
    }

    public function create(array $formFields): User
    {
        return User::create($formFields);
    }

}