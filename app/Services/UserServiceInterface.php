<?php
namespace App\Services;
use App\Models\User;

interface UserServiceInterface {
    public function findByUserId(int $userId): User;
    public function create(array $formFields): User;
}