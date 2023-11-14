<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Formulario extends Model
{
    use HasFactory, SoftDeletes;
    protected $connection = 'pgsql';
    protected $table = 'formularios';
    protected $guarded = [
        'id',
    ];

    public function anexos()
    {
        return $this->hasMany(Anexo::class, 'formulario_id', 'id');
    }
}
