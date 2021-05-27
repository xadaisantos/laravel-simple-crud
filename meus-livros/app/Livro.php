<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    protected $table = "livros";
    protected $fillable = ["titulo", "autor", "paginas", "lido"];
    public $timestamps = false;
}