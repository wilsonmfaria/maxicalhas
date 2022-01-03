<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Cliente;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function bkpdata()
    {
        return $success = \File::copy('storage\\database\\database.sqlite','storage\\database\\database.sqlite.bkp');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($letra)
    {
        if($letra == '&'){
            $nomes = Cliente::
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
            ->orderBy('nome', 'ASC')
            ->get(["nome","id","telefone"]);
        }else{
            $nomes = Cliente::where('nome','like',$letra.'%')->orderBy('nome', 'ASC')->get(["nome","id","telefone"]);
        }
        if (count($nomes) > 0){
            $cliente = Cliente::where('id',$nomes[0]->id)->get();
            return view('admin.clientes.home', compact('nomes','cliente','letra'));
        }
        $cliente = null;
        return view('admin.clientes.home', compact('nomes','cliente','letra'));
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexNav($letra,$id)
    {
        if($letra == '&'){
            $nomes = Cliente::
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
            ->orderBy('nome', 'ASC')
            ->get(["nome","id"]);
        }else{
            $nomes = Cliente::where('nome','like',$letra.'%')->orderBy('nome', 'ASC')->get(["nome","id","telefone"]);
        }
        $cliente = Cliente::where('id',$id)->get();
        return view('admin.clientes.home', compact('nomes','cliente','letra'));
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
        $cliente = Cliente::create([
            "nome"     => $request["nome"],
            "cpf"      => $request["cpf"],
            "cnpj"      => $request["cnpj"],
            "telefone" => $request["telefone"],
            "Celular"  => $request["Celular"],
            "rua"      => $request["rua"],
            "numero"   => $request["numero"],
            "bairro"   => $request["bairro"],
            "cidade"   => $request["cidade"],
            "estado"   => $request["estado"]
        ]);
        $this.bkpdata();
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
        $cliente = Cliente::find($id);
        $cliente->nome     = $request["nome"];
        $cliente->cpf      = $request["cpf"];
        $cliente->cnpj      = $request["cpf"];
        $cliente->telefone = $request["telefone"];
        $cliente->Celular  = $request["Celular"];
        $cliente->rua      = $request["rua"];
        $cliente->numero   = $request["numero"];
        $cliente->bairro   = $request["bairro"];
        $cliente->cidade   = $request["cidade"];
        $cliente->estado   = $request["estado"];
        $cliente->save();
        $this.bkpdata();
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
        $cliente = Cliente::find($id);
        $ordems = $cliente->ordems;
        if(count($ordems) > 0){
            return back()->with('erroDELETE', 'Ação Bloqueada! Esse cliente possui Ordens de Serviço cadastradas no sistema.'); ;
        }
        return back();
    }
}
