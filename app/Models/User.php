<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Relação 1:N entre usuario e chamados
    public function chamdos()
    {
        return $this->hasMany(Chamado::class);
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'email',
        'telefone',
        'status',
        'scope',
        'chamados_abertos',
        'chamados_andamento',
        'chamados_resolvido',
    ];
}
