<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function  __construct()
    {
        $this->middleware('permission:user-read|user-create|user-edit|user-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:user-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $roles = Role::all();

        $users = User::query()
            ->when(
                $request->search,
                function ($query) use ($request) {
                    $query->where('email', 'Like', '%' . $request->search . '%')
                        ->orwhere('nom', 'Like', '%' . $request->search . '%')
                        ->orwhere('prenom', 'Like', '%' . $request->search . '%')
                        ->orwhere('departement', 'Like', '%' . $request->search . '%');
                }
            )
            ->orderBy('email', 'desc')
            ->paginate(10);



        return view('users.index', compact('users', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //$users = User::all();
        $users = User::all();
        $roles = Role::all();

        return view('users.form', compact('users', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            //'name' => ['required'],
            'email' => ['required', 'lowercase', 'email', 'unique:' . User::class],
            'nom' => ['required'],
            'prenom' => ['required'],
            'departement' => ['max:255'],
            'password' => ['required', 'min:3']
        ]);

        $user = User::create([
            //'name' => $request->name,
            'email' => $request->email,
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'departement' => $request->departement,
            'password' => Hash::make($request->password)
        ]);

        $user->assignRole($request->input('roles', []));

        event(new Registered($user));

        return redirect(route('users.index'));
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
    public function edit(User $user)
    {
        $roles = Role::all();

        return view('users.form', ['user' => $user, 'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'string',
            'email' => ['required', 'string', 'email', 'unique:users,email,' . $id],
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'departement' => 'string',
        ]);

        $user = User::findOrfail($id);
        $user->update($data);

        if (!empty($request->password)) {
            $user->update([
                'password' => bcrypt($request->password)
            ]);
        }

        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $user->assignRole($request->input('roles', []));

        $user->save();

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    }
}
