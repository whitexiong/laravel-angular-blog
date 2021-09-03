<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Blog\BlogController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class RoleController extends BlogController
{
    protected $except = ['index'];

    /**
     * 角色列表
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $roleList = Role::query()->get();
        return $this->successPaginate($roleList);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $name = $this->verifyString('name');
        $guardName = $this->verifyString('guard_name');
        return Role::create([
            'name' => $name,
            $guardName => $guardName,
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * @param $id
     * @return int
     * @throws \App\Exceptions\BusinessException
     */
    public function edit($id)
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
        //
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
