<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game_Model extends Model
{
    use HasFactory;
    protected $table = 'game';

    protected $fillable = [
        'name',
        'description'
    ];
}
