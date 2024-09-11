<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use PhpParser\Node\Stmt\Return_;
use Spatie\Permission\Models\Role;


class UserController extends Controller
{
    //funcion para mostrar todos los usuarios de la tabla users
    public function index()
    {
        //Obtengo todos los usuarios de la base de datos
        $users = User::all();

        // Retornar la vista 'users.index' con los datos de los usuarios

        return view ('users.index', compact('users'));

    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create'); // Asegúrate de que este archivo exista en resources/views/users/
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed', // Asume que hay un campo de confirmación de contraseña
        ]);

        // Creación de un nuevo usuario
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users.show', [
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {    $roles=role::all();
        return view('users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {

        //dd($request);
        $request->validate([
            'name' => 'required|string|max:255',
            'roles' => 'required|array',
        ]);

        // Actualizar el nombre del usuario
        $user->update(['name' => $request->name]);

        // Sincronizar los roles
        $user->roles()->sync($request->roles);

        // Redirigir con un mensaje de éxito
        return redirect()->route('users.index')->with('success', 'Roles asignados correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }






}
