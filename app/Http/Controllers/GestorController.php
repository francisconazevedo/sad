<?php

namespace App\Http\Controllers;

class GestorController extends Controller
{
    public function index() {
        return view('gestor.gestor.index');
    }

    public function salas()
    {
        return view('gestor.salas.index');
    }

    public function addSalas()
    {
        return view('gestor.salas.add');
    }

    public function turmas()
    {
        return view('gestor.turmas.index');
    }

    public function addTurmas()
    {
        return view('gestor.turmas.add');
    }
}
