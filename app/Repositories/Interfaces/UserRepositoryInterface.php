<?php


use App\Models\User;

interface UserRepositoryInterface
{
    public function all();

    public function getByUser(User $user);
}