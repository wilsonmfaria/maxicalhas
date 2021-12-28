<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Funcionario;

use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($letra)
    {
        if($letra == '&'){
            $nomes = Funcionario::
              where('nome','not like','A%')
            ->where('nome','not like','B%')
            ->where('nome','not like','C%')
            ->where('nome','not like','D%')
            ->where('nome','not like','E%')
            ->where('nome','not like','F%')
            ->where('nome','not like','G%')
            ->where('nome','not like','H%')
            ->where('nome','not like','I%')
            ->where('nome','not like','J%')
            ->where('nome','not like','k%')
            ->where('nome','not like','L%')
            ->where('nome','not like','M%')
            ->where('nome','not like','N%')
            ->where('nome','not like','O%')
            ->where('nome','not like','P%')
            ->where('nome','not like','Q%')
            ->where('nome','not like','R%')
            ->where('nome','not like','S%')
            ->where('nome','not like','T%')
            ->where('nome','not like','U%')
            ->where('nome','not like','V%')
            ->where('nome','not like','X%')
            ->where('nome','not like','Y%')
            ->where('nome','not like','Z%')
            ->where('nome','not like','W%')
            ->orderBy('nome', 'ASC')->get(["nome","id"]);
        }else{
            $nomes = Funcionario::where('nome','like',$letra.'%')->orderBy('nome', 'ASC')->get(["nome","id"]);
        }
        if (count($nomes) > 0){
            $funcionario = Funcionario::where('id',$nomes[0]->id)->get();
            return view('admin.Funcionarios.home', compact('nomes','funcionario','letra'));
        }
        $funcionario = null;
        return view('admin.funcionarios.home', compact('nomes','funcionario','letra'));
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexNav($letra,$id)
    {
        if($letra == '&'){
            $nomes = Funcionario::
              where('nome','not like','A%')
            ->where('nome','not like','B%')
            ->where('nome','not like','C%')
            ->where('nome','not like','D%')
            ->where('nome','not like','E%')
            ->where('nome','not like','F%')
            ->where('nome','not like','G%')
            ->where('nome','not like','H%')
            ->where('nome','not like','I%')
            ->where('nome','not like','J%')
            ->where('nome','not like','k%')
            ->where('nome','not like','L%')
            ->where('nome','not like','M%')
            ->where('nome','not like','N%')
            ->where('nome','not like','O%')
            ->where('nome','not like','P%')
            ->where('nome','not like','Q%')
            ->where('nome','not like','R%')
            ->where('nome','not like','S%')
            ->where('nome','not like','T%')
            ->where('nome','not like','U%')
            ->where('nome','not like','V%')
            ->where('nome','not like','X%')
            ->where('nome','not like','Y%')
            ->where('nome','not like','Z%')
            ->where('nome','not like','W%')
            ->orderBy('nome', 'ASC')->get(["nome","id"]);
        }else{
            $nomes = Funcionario::where('nome','like',$letra.'%')->orderBy('nome', 'ASC')->get(["nome","id"]);
        }
        $funcionario = Funcionario::where('id',$id)->get();
        return view('admin.funcionarios.home', compact('nomes','funcionario','letra'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $funcionario = Funcionario::create([
            "nome"     => $request["nome"],
            "cpf"      => $request["cpf"],
            "telefone" => $request["telefone"],
            "Celular"  => $request["Celular"],
            "rua"      => $request["rua"],
            "numero"   => $request["numero"],
            "bairro"   => $request["bairro"],
            "cidade"   => $request["cidade"],
            "estado"   => $request["estado"]
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $funcionario = Funcionario::find($id);
        $funcionario->nome     = $request["nome"];
        $funcionario->cpf      = $request["cpf"];
        $funcionario->telefone = $request["telefone"];
        $funcionario->Celular  = $request["Celular"];
        $funcionario->rua      = $request["rua"];
        $funcionario->numero   = $request["numero"];
        $funcionario->bairro   = $request["bairro"];
        $funcionario->cidade   = $request["cidade"];
        $funcionario->estado   = $request["estado"];
        $funcionario->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Funcionaio::find($id)->delete();
        return back();
    }
}
