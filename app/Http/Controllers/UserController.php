<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateformRequest;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware("auth");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view("users.index", ["users" => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();

        return view("users.create", ["roles" => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateformRequest $request)
    {
        $usuario = new User();

        $usuario->name = $request->get("name");
        $usuario->email = $request->get("email");
        $usuario->password = bcrypt($request->get("password"));

        $usuario->save();
        $usuario->asignarRol($request->get("rol"));

        return redirect("/users");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view("users.show", ["user" => User::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();

        return view("users.edit", ["user" => $user, "roles" => $roles]);
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
        $this->validate(request(), ["email" => ["required", "email", "max:255", "unique:users,email," . $id]]);

        $usuario = User::find($id);

        $usuario->name = $request->get("name");
        $usuario->email = $request->get("email");

        $pass = $request->get("password");
        if ($pass) {
            $usuario->password = bcrypt($request->get("password"));
        } else {
            unset($usuario->password);
        }

        $role = $usuario->roles;
        if (count($role) > 0) {
            $role_id = $role[0]->id;
            User::find($id)->roles()->updateExistingPivot($role_id, ["role_id" => $request->get("rol")]);
        } else {
            $usuario->asignarRol($request->get("rol"));
        }

        $usuario->update();

        return redirect("/users");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
    }
}
