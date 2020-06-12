@extends('templates.template')

@section('content')
    <h1 class="text-center">CRUD - FUNCIONARIOS</h1>
    <hr>
    <div class="text-center mt-3 mb-4">
        <a href="{{url('funcionario/create')}}">
            <button class="btn btn-primary">Cadastrar</button>
        </a>
    </div>
    <div class="col-10 m-auto">
        @csrf
        <table class="table text-center">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Matricula</th>
                <th scope="col">Nome</th>
                <th scope="col">Sobrenome</th>
                <th scope="col">Email</th>
                <th scope="col">Celular</th>
                <th scope="col">CEP</th>
                <th scope="col">Setor</th>
                <th scope="col">Salario Atual</th>
                <th scope="col">Ações</th>
            </tr>
            </thead>
            <tbody>

            @foreach($funcionario as $funcionarios)

                @php
                    $setor = $funcionarios->find($funcionarios->id)->relSetor;
                @endphp
                <tr>
                    <th scope="row">{{$funcionarios->id}}</th>
                    <td>{{$funcionarios->nome}}</td>
                    <td>{{$funcionarios->sobrenome}}</td>
                    <td>{{$funcionarios->email}}</td>
                    <td>{{$funcionarios->celular}}</td>
                    <td>{{$funcionarios->cep}}</td>
                    <td>{{$setor->nome}}</td>
                    <td>R$ {{$funcionarios->salarioAtual}}</td>
                    <td>
                        <a href="{{url("funcionario/$funcionarios->id")}}">
                            <button class="btn btn-dark">Visualizar</button>
                        </a>
                        <a href="{{url("funcionario/$funcionarios->id/edit")}}">
                            <button class="btn btn-warning">Editar</button>
                        </a>
                        <a href="{{url("funcionario/$funcionarios->id")}}" class="js-del">
                            <button class="btn btn-danger">Deletar</button>
                        </a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
@endsection
