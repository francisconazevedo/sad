<?php

namespace App\Http\Controllers\Gestor;

use App\Models\User;

class UsuariosController extends Controller
{
    public function index()
    {
        $usuarios = User::paginate(15);
        return view('gestor.usuarios.index', compact('usuarios'));
    }

    public function livewire($id = null)
    {
        return view('gestor.usuarios.livewire')->with('id', $id);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('gestor.usuarios.index');
    }
}
