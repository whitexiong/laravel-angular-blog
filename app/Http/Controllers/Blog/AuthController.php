<?php


namespace App\Http\Controllers\Blog;



use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends BlogController
{
    public function login()
    {
        $user = User::query()->where('name','white')->first();
        $token = Auth::guard('blog')->login($user);
        dd($token);
        return $this->success('');
    }
}