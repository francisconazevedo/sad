<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Horario
 *
 */
class Horario extends Model
{
    protected $table = 'horarios_salas';

    protected $primaryKey = 'id_horario';

    public $timestamps = false;

    public $incrementing = false;

    protected $fillable = [
        'id_horario',
        'horario',
        'id_sala',
        'id_turma'
    ];

    public function turmas(){
        return $this->belongsTo('App\Turma', 'id_turma', 'id_turma');
    }
}
