<?php

namespace App\Http\Controllers;

use App\Http\Requests\FuncionarioRequest;
use Illuminate\Http\Request;
use App\Models\ModelSetor;
use App\Models\ModelFuncionario;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
class FuncionarioController extends Controller
{
    private $objSetor;
    private $objFuncionario;

    public function __construct()
    {
        $this->objSetor= new ModelSetor();
        $this->objFuncionario = new ModelFuncionario();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $funcionario = $this->objFuncionario->all()->sortBy('nome');
        return view('index',compact('funcionario'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $setor = $this->objSetor->all()->sortBy('nome');
        return view('create',compact('setor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome'=>'required',
            'sobrenome'=>'required',
            'cep'=>'required',
            'endereco'=>'required',
            'numero'=>'required',
            'complemento'=>'required',
            'bairro'=>'required',
            'cidade'=>'required',
            'uf'=>'required|size:2',
            'dataNascimento'=>'required|size:10',
            'sexo'=>'required',
            'email'=>'required',
            'telefone'=>'required|size:13',
            'celular'=>'required|size:14',
            'rg'=>'required|size:12',
            'cpf'=>'required|size:14',
            'salarioAtual'=>'required',
            'dataAdm'=>'required|size:10',
            'status'=>'required',
            'id_setor'=>'required',
        ]);

        if ($validator->fails()) {
            //return redirect('funcionario/create')->with('toast_error',$validator->messages()->all())->withInput();
            return redirect('funcionario/create')->with('toast_error',"Todos os campos do formulário são obrigatórios!")->withInput();
        }

        $cad = $this->objFuncionario->create([
            'nome'=>$request->nome,
            'sobrenome'=>$request->sobrenome,
            'cep'=>$request->cep,
            'endereco'=>$request->endereco,
            'numero'=>$request->numero,
            'complemento'=>$request->complemento,
            'bairro'=>$request->bairro,
            'cidade'=>$request->cidade,
            'uf'=>$request->uf,
            'datanasci'=>$request->dataNascimento,
            'sexo'=>$request->sexo,
            'email'=>$request->email,
            'telefone'=>$request->telefone,
            'celular'=>$request->celular,
            'rg'=>$request->rg,
            'cpf'=>$request->cpf,
            'salarioAtual'=>$request->salarioAtual,
            'dataAdm'=>$request->dataAdm,
            'status'=>$request->status,
            'id_setor'=>$request->id_setor,
        ]);
        if($cad){
            return redirect('funcionario')->with('toast_success','Funcionario cadastrado!');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $funcionario = $this->objFuncionario->find($id);
        return view('show',compact('funcionario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $funcionario = $this->objFuncionario->find($id);
        $setor = $this->objSetor->all();
        return view('create',compact('funcionario','setor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nome'=>'required',
            'sobrenome'=>'required',
            'cep'=>'required',
            'endereco'=>'required',
            'numero'=>'required',
            'complemento'=>'required',
            'bairro'=>'required',
            'cidade'=>'required',
            'uf'=>'required|size:2',
            'dataNascimento'=>'required|size:10',
            'sexo'=>'required',
            'email'=>'required',
            'telefone'=>'required|size:13',
            'celular'=>'required|size:14',
            'rg'=>'required|size:12',
            'cpf'=>'required|size:14',
            'salarioAtual'=>'required',
            'dataAdm'=>'required|size:10',
            'status'=>'required',
            'id_setor'=>'required',
        ]);

        if ($validator->fails()) {
            //return redirect('funcionario/create')->with('toast_error',$validator->messages()->all())->withInput();
            return redirect('funcionario/create')->with('toast_error',"Todos os campos do formulário são obrigatórios!")->withInput();
        }

        $this->objFuncionario->where(['id'=> $id])->update([
            'nome'=>$request->nome,
            'sobrenome'=>$request->sobrenome,
            'cep'=>$request->cep,
            'endereco'=>$request->endereco,
            'numero'=>$request->numero,
            'complemento'=>$request->complemento,
            'bairro'=>$request->bairro,
            'cidade'=>$request->cidade,
            'uf'=>$request->uf,
            'datanasci'=>$request->dataNascimento,
            'sexo'=>$request->sexo,
            'email'=>$request->email,
            'telefone'=>$request->telefone,
            'celular'=>$request->celular,
            'rg'=>$request->rg,
            'cpf'=>$request->cpf,
            'salarioAtual'=>$request->salarioAtual,
            'dataAdm'=>$request->dataAdm,
            'status'=>$request->status,
            'id_setor'=>$request->id_setor,
        ]);
        return redirect('funcionario');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = $this->objFuncionario->destroy($id);
        return($del)?"sim":"não";
    }
}
