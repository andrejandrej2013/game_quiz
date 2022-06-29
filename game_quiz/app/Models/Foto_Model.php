<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto_Model extends Model
{
    use HasFactory;

    protected $table = 'foto';

    protected $fillable = [
        'foto',
        'game_id'
    ];
}
