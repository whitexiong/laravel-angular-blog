<?php


use App\Models\User;

class UserRepository implements UserRepositoryInterface
{

    public function all()
    {
        return User::all();
    }

    public function getByUser(User $user)
    {
        return User::query()->where('id', $user->id)->get();
    }
}