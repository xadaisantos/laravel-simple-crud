<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Frase extends Model
{
    protected $table = 'frases';
    // nome da tabela: nome da classe, coloca em minusculo, plural
    // mesmo que omitido, o atributo acima existe nas condicoes mencionadas (minusculo plural)
    public $timestamps = false;
    protected $fillable = ["english", "portuguese"];
    // a linha acima desabilita as timestamps
    // que sao por default colocadas no FrasesController
}