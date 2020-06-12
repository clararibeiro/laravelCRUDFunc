@extends('templates.template')

@section('content')
    <h1 class="text-center">Visualizar</h1>
    <hr>

    <div class="col-6 m-auto text-center">
        @php
            $setor = $funcionario->find($funcionario->id)->relSetor;
        @endphp
        <table class="table table-sm table-info">
            <tbody>
            <tr>
                <th scope="row">Matricula: </th>
                <td>{{$funcionario->id}}</td>
            </tr>
            <tr>
                <th scope="row">Nome: </th>
                <td>{{$funcionario->nome}}</td>
            </tr>
            <tr>
                <th scope="row">Sobrenome: </th>
                <td>{{$funcionario->sobrenome}}</td>
            </tr>
            <tr>
                <th scope="row">Endereço: </th>
                <td>{{$funcionario->endereco}}</td>
            </tr>
            <tr>
                <th scope="row">Numero: </th>
                <td>{{$funcionario->numero}}</td>
            </tr>
            <tr>
                <th scope="row">Complemento: </th>
                <td>{{$funcionario->complemento}}</td>
            </tr>
            <tr>
                <th scope="row">Bairro: </th>
                <td>{{$funcionario->bairro}}</td>
            </tr>
            <tr>
                <th scope="row">Cidade: </th>
                <td>{{$funcionario->cidade}}</td>
            </tr>
            <tr>
                <th scope="row">UF: </th>
                <td>{{$funcionario->uf}}</td>
            </tr>
            <tr>
                <th scope="row">CEP: </th>
                <td>{{$funcionario->cep}}</td>
            </tr> <tr>
                <th scope="row">E-mail: </th>
                <td>{{$funcionario->email}}</td>
            </tr>
            <tr>
                <th scope="row">Telefone: </th>
                <td>{{$funcionario->telefone}}</td>
            </tr>
            <tr>
                <th scope="row">Celular: </th>
                <td>{{$funcionario->celular}}</td>
            </tr>
            <tr>
                <th scope="row">Data de Nascimento: </th>
                <td>{{$funcionario->datanasci}}</td>
            </tr>
            <tr>
                <th scope="row">RG: </th>
                <td>{{$funcionario->rg}}</td>
            </tr>
            <tr>
                <th scope="row">CPF: </th>
                <td>{{$funcionario->cpf}}</td>
            </tr>
            <tr>
                <th scope="row">Data de Admissão: </th>
                <td>{{$funcionario->dataAdm}}</td>
            </tr>
            <tr>
                <th scope="row">Status: </th>
                <td>{{$funcionario->status}}</td>
            </tr>
            <tr>
                <th scope="row">Setor: </th>
                <td>{{$setor->nome}}</td>
            </tr>
            <tr>
                <th scope="row">Salário Atual: </th>
                <td>R$ {{$funcionario->salarioAtual}}</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
