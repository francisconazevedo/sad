<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\UserEndereco
 *
 * @method static \Illuminate\Database\Eloquent\Builder|UserEndereco newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserEndereco newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserEndereco query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $user_id
 * @property string $cep
 * @property string $endereco
 * @property string $numero
 * @property string $complemento
 * @property string $bairro
 * @property string $cidade
 * @property string $uf
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserEndereco whereBairro($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserEndereco whereCep($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserEndereco whereCidade($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserEndereco whereComplemento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserEndereco whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserEndereco whereEndereco($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserEndereco whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserEndereco whereNumero($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserEndereco whereUf($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserEndereco whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserEndereco whereUserId($value)
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Query\Builder|UserEndereco onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|UserEndereco whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|UserEndereco withTrashed()
 * @method static \Illuminate\Database\Query\Builder|UserEndereco withoutTrashed()
 */
class UserEndereco extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'cep', 'endereco', 'numero', 'complemento', 'bairro', 'bairro_id', 'cidade', 'uf'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function bairro()
    {
        return $this->belongsTo('App\Models\Bairro');
    }
}
