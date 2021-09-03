<?php

namespace App\Http\Controllers;

use App\Exceptions\BusinessException;
use App\Http\Controllers\Blog\BlogController;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends BlogController
{
    protected $except = ['create'];
    /**
     * 角色列表
     * @return JsonResponse
     */
    public function index()
    {

    }

    /**
     * 创建一个角色
     * @return Builder|\Illuminate\Database\Eloquent\Model
     * @throws BusinessException
     */
    public function create()
    {

    }


    /**
     * @return Builder|\Illuminate\Database\Eloquent\Model
     * @throws BusinessException
     */
    public function store()
    {
        $name = $this->verifyString('name');
        $route = $this->verifyString('route');
        $guard_name = $this->verifyString('guard_name');
        return Permission::create([
            'name' => $name,
            'route' => $route,
            'guard_name' => $guard_name,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    /**
     * 更新角色信息
     * @return int
     * @throws BusinessException
     */
    public function edit()
    {
        $id = $this->verifyId('id');
        $name = $this->verifyId('name');
        return Role::query()->where('id', $id)
            ->update([
                'name' => $name,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
