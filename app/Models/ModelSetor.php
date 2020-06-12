<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelSetor extends Model
{
    protected $table = 'setor';

    public function relFuncionario(){
        return $this->hasMany('App\Models\ModelFuncionario','id_setor');
    }
}
