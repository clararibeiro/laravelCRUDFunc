<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelFuncionario extends Model
{
    protected $table = 'funcionario';
    protected $fillable = ['nome','id_setor', 'sobrenome', 'cep', 'endereco', 'numero', 'complemento', 'bairro', 'cidade', 'uf', 'datanasci', 'sexo', 'email', 'telefone', 'celular', 'rg', 'cpf', 'salarioAtual', 'dataAdm', 'status'];

    public function relSetor(){
        return $this->hasOne('App\Models\ModelSetor','id','id_setor');
    }
}
