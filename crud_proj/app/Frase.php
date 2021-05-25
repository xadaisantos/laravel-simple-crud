<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Frase extends Model
{
    protected $table = 'frases';
    public $timestamps = false;
    protected $fillable = ["english", "portuguese"];
}