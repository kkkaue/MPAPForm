<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cargo extends Model
{
    use HasFactory, SoftDeletes;
    protected $connection = 'pgsql';
    protected $table = 'cargos';
    protected $guarded = [
        'id',
    ];
}
