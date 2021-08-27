<?php

namespace Blog;

use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class AuthTest extends TestCase
{
    public function testCreateUser()
    {
//        $role = Role::create(['name' => 'whitess']);
        /** @var Role $role */
//        $role =  Role::query()->where('name', 'root')->get();
//         $user =  User::query()->create([
//            'name' => 'white',
//            'email' => '986247535@qq.com',
//            'password' => '123456',
//        ]);
//        $role = Role::query()->where('id', 1)->get();
//        /** @var Permission $permission */
//        $permission = Permission::query()->where('name','edit articles')->get();
//        /** @var User $user */
//        $user =  User::query()->where('name', 'white')->get();
//        $role->givePermissionTo('edit articles');
//        $setRoot =  $permission->assignRole('whitess');
//        dd($setRoot);
    }

    public function testJwt()
    {
        $response =  $this->json('post', 'blog/auth/login');
        dd($response->getOriginalContent());
        $response->assertJson(['errno' => 1]);
    }
}
