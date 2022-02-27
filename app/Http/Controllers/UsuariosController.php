<?php

namespace App\Http\Controllers;

use App\Models\Register;
use App\Models\User;
use App\Models\Usuarios;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function panel()
    {
        $users = DB::table('users')->select('id','name','email','rol')->get();
        return view('users.panelUser', compact('users'));
    }

    public function create(){
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => ['required', 'string', 'min:5', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'password' => ['required', 'confirmed', 'string', 'min:8'],
        ];

        $messages = [
            'name.required' => 'El nombre es obligatorio.',
            'name.min' => 'El nombre debe tener mínimo 5 caracteres.',
            'name.max' => 'El nombre no debe tener más de 255 caracteres.',
            'email.required' => 'El email es obligatorio.',
            'email.unique' => 'El email ya ha sido registrado.',
            'email.max' => 'El email no debe tener más de 255 caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
            'password.min' => 'La contraseña debe tener mínimo 8 caracteres.'
        ];

        $this->validate($request, $rules, $messages);
        var_dump($request->rol);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'rol' => $request->rol
        ]);
        
        return redirect()->route('panel.panel');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function show(Usuarios $usuarios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function edit($usuario)
    {
        // var_dump(DB::table('users')->where('id', $usuario)->get());
        $user= DB::table('users')->where('id', $usuario)->get();
        return view('users.editUser', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $datosUsuario = request()->except(['_token','_method']);
        $datosUsuario['password']=Hash::make($request->password);
        DB::table('users')->where('id', $id)->update($datosUsuario);
        return redirect()->route('panel.panel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function delete($usuario)
    {
        //
    
        DB::table('users')->where('id', $usuario)->delete();
        return redirect()->route('panel.panel');
    }
}
