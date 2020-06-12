@extends('templates.template')

@section('content')
    <h1 class="text-center"> @if(@isset($funcionario))EDITAR @else CADASTRO @endif</h1>
    <hr>
    <div class="col-6 m-auto text-center">
            @if(isset($errors) && count($errors)>0)
                <div class="text-center mt-4 mb-4 p-2 alert-danger">
                    @foreach($errors->all() as $erro)
                        {{$erro}}<br>
                    @endforeach
                </div>
            @endif

        @if(@isset($funcionario))
            <form name="formEdit" id="formCad" method="post" action="{{url("funcionario/$funcionario->id")}}">
                @method('PUT')
        @else
           <form name="formCad" id="formCad" method="post" action="{{url('funcionario')}}">
        @endif

            @csrf
            <br/>
            <input class="form-control" type="text" name="nome" id="nome" placeholder="Nome" value="{{$funcionario->nome ?? ''}}"> <br/>
            <input class="form-control" type="text" name="sobrenome" id="sobrenome" placeholder="Sobrenome" value="{{$funcionario->sobrenome ?? ''}}"> <br/>
            <input class="form-control" type="text" name="cep" id="cep" placeholder="CEP" onkeypress="$(this).mask('00000-000');" value="{{$funcionario->cep ?? ''}}"> <br/>
            <input class="form-control" type="text" name="endereco" id="endereco" placeholder="Endereco" value="{{$funcionario->endereco ?? ''}}"> <br/>
            <input class="form-control" type="text" name="numero" id="numero" placeholder="Numero" value="{{$funcionario->numero ?? ''}}"> <br/>
            <input class="form-control" type="text" name="complemento" id="complemento" placeholder="Complemento" value="{{$funcionario->complemento ?? ''}}"> <br/>
            <input class="form-control" type="text" name="bairro" id="bairro" placeholder="Bairro" value="{{$funcionario->bairro ?? ''}}"> <br/>
            <input class="form-control" type="text" name="cidade" id="cidade" placeholder="Cidade" value="{{$funcionario->cidade ?? ''}}"> <br/>
            <input class="form-control" type="text" name="uf" id="uf" placeholder="UF"  maxlength="2" value="{{$funcionario->uf ?? ''}}"> <br/>
            <input class="form-control" type="text" name="email" id="email" placeholder="E-mail"  value="{{$funcionario->email ?? ''}}"> <br/>
            <input class="form-control" type="text" name="telefone" id="telefone" placeholder="Telefone" onkeypress="$(this).mask('(00)0000-0000');"  maxlength="13" value="{{$funcionario->telefone ?? ''}}"> <br/>
            <input class="form-control" type="text" name="celular" id="celular" placeholder="Celular" onkeypress="$(this).mask('(00)00000-0000');"  maxlength="14" value="{{$funcionario->celular ?? ''}}"> <br/>
            <input class="form-control" type="text" name="dataNascimento" id="dataNascimento" placeholder="Data de Nascimento" onkeypress="$(this).mask('00/00/0000');"  maxlength="10" value="{{$funcionario->datanasci ?? ''}}"> <br/>
            <select class="form-control" name="sexo" id="sexo" >
                <option value={{$funcionario->sexo ?? ''}}>{{$funcionario->sexo ?? ''}}</option>
                <option value="Feminino">Feminino</option>
                <option value="Masculino">Masculino</option>
            </select><br/>
            <input class="form-control" type="text" name="rg" id="rg" placeholder="RG" onkeypress="$(this).mask('00.000.000-0');"  maxlength="12" value="{{$funcionario->rg ?? ''}}">  <br/>
            <input class="form-control" type="text" name="cpf" id="cpf" placeholder="CPF" onkeypress="$(this).mask('000.000.000-00');"  maxlength="14" value="{{$funcionario->cpf ?? ''}}"> <br/>
            <input class="form-control" type="text" name="dataAdm" id="dataAdm" placeholder="Data de Admissão"onkeypress="$(this).mask('00/00/0000');"  maxlength="10" value="{{$funcionario->dataAdm ?? ''}}"> <br/>
            <select class="form-control" name="status" id="status" >
                <option value={{$funcionario->status ?? ''}}>{{$funcionario->status ?? ''}}</option>
                <option value="Ativo">Ativo</option>
                <option value="Inativo">Inativo</option>
            </select><br/>
            <input class="form-control" type="double" name="salarioAtual" id="salarioAtual" placeholder="Salario Atual"  value="{{$funcionario->salarioAtual ?? ''}}"> <br/>
            <select class="form-control" name="id_setor" id="id_setor" >
                <option value="{{$funcionario->relSetor->id ?? ''}}">{{$funcionario->relSetor->nome ?? 'Setor'}}</option>
                @foreach($setor as $setores)
                    <option value="{{$setores->id}}">{{$setores->nome}}</option>
                @endforeach
            </select><br/>
            <input class="@if(@isset($funcionario)) btn btn-warning @else btn btn-success @endif" type="submit" value="@if(@isset($funcionario))Editar @else Cadastrar @endif"> <br/>
        </form>
        <br/>
    </div>
@endsection
