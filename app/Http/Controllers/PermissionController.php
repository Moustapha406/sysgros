<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function  __construct()
     {
         $this->middleware('permission:permission-read|permission-create|permission-edit|permission-delete', ['only' => ['index', 'store']]);
         $this->middleware('permission:permission-create', ['only' => ['create', 'store']]);
         $this->middleware('permission:permission-edit', ['only' => ['edit', 'update']]);
         $this->middleware('permission:permission-delete', ['only' => ['destroy']]);
     }


    public function index(Request $request)
    {
        $permissions = Permission::query()
            ->when(
                $request->search,
                function ($query) use ($request) {
                    $query->where('name', 'Like', '%' . $request->search . '%');
                }
            )->orderBy('name', 'desc')->paginate(10);

        return view("permission.index", compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view("permission.form", compact("roles"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => ["required", 'unique:permissions,name']
        ]);

        $per = Permission::create($request->only('name'));

        // $permission=Permission::create(['name'=>$request->name,]);

        $per->save();

        return redirect()->route('permissions.index')->with('success', 'La permission est bien ajouté');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $permission = Permission::findOrFail($id);
        $roles = Role::all();

        return view("permission.form", compact("permission", 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => ['required', 'string'],
        ]);

        $permission = Permission::findOrfail($id);
        $permission->update($data);
        $permission->save();

        return redirect()->route('permissions.index')->with('success', 'La permission  a été bien modifier');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Permission::findOrFail($id)->delete();

        return redirect()->route('permissions.index')->with('success', "La permission a été supprimé avec succées");
    }
}