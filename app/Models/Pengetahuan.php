<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengetahuan extends Model
{
    use HasFactory;

    protected $table = 'pengetahuan';

    public function gejala()
    {
        return $this->hasMany('App\Models\Gejala', 'id', 'gejala_id');
    }
}
