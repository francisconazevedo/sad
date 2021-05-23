<?php

namespace App\Http\Controllers;

class TurmaController extends Controller
{
    public function index() {
        return view('gestor.index');
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
