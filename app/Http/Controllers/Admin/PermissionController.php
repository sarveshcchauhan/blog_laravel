<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\admin\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::all();
        return view('admin.permission.show', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permission.permission');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|unique:permissions'
        ]);

        $permission = new Permission;
        $permission->name = $request->name;
        $permission->pfor = $request->pfor;
        $permission->save();
        return redirect(route('permission.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\model\admin\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model\admin\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = Permission::where('id', $id)->first();
        return view('admin/permission/edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model\admin\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $Permission)
    {
        $validate = $request->validate([
            'name' => 'required|unique:permissions'
        ]);
        $permission = Permission::find($Permission->id);
        $permission->name = $request->name;
        $permission->pfor = $request->pfor;
        $permission->save();

        return redirect(route('permission.index'))->with('message', 'Permission successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model\admin\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $Permission)
    {
        Permission::where('id', $Permission->id)->delete();
        return redirect(route('permission.index'));
    }
}
