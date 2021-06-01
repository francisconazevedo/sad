<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Sala
 *
 */
class Sala extends Model
{
    protected $table = 'salas';

    protected $primaryKey = 'id_sala';

    public $timestamps = false;

    public $incrementing = false;

    protected $fillable = [
        'id_sala', 'numero_cadeiras', 'acessivel', 'qualidade'
    ];

}
