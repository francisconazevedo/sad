<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Sala
 *
 */
class Turma extends Model
{
    protected $table = 'turmas';

    protected $primaryKey = 'id_turma';

    public $timestamps = false;

    public $incrementing = false;

    protected $fillable = [
        'id_turma', 'disciplina', 'professor', 'dias_horario', 'numero_alunos', 'curso', 'periodo', 'acessibilidade', 'qualidade'
    ];

}
