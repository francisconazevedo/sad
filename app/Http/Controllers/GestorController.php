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
}
