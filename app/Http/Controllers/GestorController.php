<?php

namespace App\Http\Controllers;

class GestorController extends Controller
{
    public function index() {
        return view('gestor.gestor.index');
    }

    public function salas()
    {
        return view('salas.index');
    }

    public function addSalas()
    {
        return view('salas.add');
    }

    public function turmas()
    {
        return view('turmas.index');
    }

    public function addTurmas()
    {
        return view('turmas.add');
    }
}
