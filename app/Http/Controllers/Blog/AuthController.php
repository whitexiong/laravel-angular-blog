<?php


namespace App\Http\Controllers\Blog;


use App\Enums\UserEnums;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends BlogController
{
    public function login()
    {
        $user = User::query()->where('name', 'white')->first();
        $token = Auth::guard('blog')->login($user);
        return $this->success('');
    }

    /**
     * 注册用户名是否存在
     * @return JsonResponse
     */
    public function exist()
    {
        $request = \Request::all();
        $name = isset($request['username']) ? $request['username'] : null;
        $count = User::query()->where('name', $name)->count();
        if ($count) {
            return $this->fail(UserEnums::USERNAME_EXIST);
        }
        return $this->success();
    }
}