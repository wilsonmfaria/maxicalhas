<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Cliente;
use App\Ordem;
use App\Item;
use Illuminate\Http\Request;

class OrdemServicoController extends Controller
{
    public function bkpdata(){
        $success = \File::copy('storage\\database\\database.sqlite','storage\\database\\database.sqlite.bkp');
        return null;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($letra)
    { 
        if($letra == '&'){
            $nomes = Ordem::
              where('cliente_nome','not like','A%')
            ->where('cliente_nome','not like','B%')
            ->where('cliente_nome','not like','C%')
            ->where('cliente_nome','not like','D%')
            ->where('cliente_nome','not like','E%')
            ->where('cliente_nome','not like','F%')
            ->where('cliente_nome','not like','G%')
            ->where('cliente_nome','not like','H%')
            ->where('cliente_nome','not like','I%')
            ->where('cliente_nome','not like','J%')
            ->where('cliente_nome','not like','k%')
            ->where('cliente_nome','not like','L%')
            ->where('cliente_nome','not like','M%')
            ->where('cliente_nome','not like','N%')
            ->where('cliente_nome','not like','O%')
            ->where('cliente_nome','not like','P%')
            ->where('cliente_nome','not like','Q%')
            ->where('cliente_nome','not like','R%')
            ->where('cliente_nome','not like','S%')
            ->where('cliente_nome','not like','T%')
            ->where('cliente_nome','not like','U%')
            ->where('cliente_nome','not like','V%')
            ->where('cliente_nome','not like','X%')
            ->where('cliente_nome','not like','Y%')
            ->where('cliente_nome','not like','Z%')
            ->where('cliente_nome','not like','W%')
            ->orderBy('cliente_nome', 'ASC')
            ->orderBy('created_at', 'DESC')->get(["cliente_nome","id","created_at"]);
        }else{
            $nomes = Ordem::where('cliente_nome','like',$letra.'%')->orderBy('cliente_nome', 'ASC')
            ->orderBy('created_at', 'DESC')->get(["cliente_nome","id","created_at"]);
        }
        $clientes = Cliente::orderBy('nome')->get(['id','nome']);
        if (count($nomes) > 0){
            $ordem = Ordem::where('id',$nomes[0]->id)->get();
            $items = Item::where('ordem_id',$nomes[0]->id)->get();
            $total = 0;
            foreach($items as $item){
                $x = floatval($item->valor);
                $total += $x;
            }
            return view('admin.ordems.home', compact('nomes','ordem','letra','items','total','clientes'));

        }
        $ordem = null;
        return view('admin.ordems.home', compact('nomes','ordem','letra','clientes'));
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexNav($letra,$id)
    {
        if($letra == '&'){
            $nomes = Ordem::
              where('cliente_nome','not like','A%')
            ->where('cliente_nome','not like','B%')
            ->where('cliente_nome','not like','C%')
            ->where('cliente_nome','not like','D%')
            ->where('cliente_nome','not like','E%')
            ->where('cliente_nome','not like','F%')
            ->where('cliente_nome','not like','G%')
            ->where('cliente_nome','not like','H%')
            ->where('cliente_nome','not like','I%')
            ->where('cliente_nome','not like','J%')
            ->where('cliente_nome','not like','k%')
            ->where('cliente_nome','not like','L%')
            ->where('cliente_nome','not like','M%')
            ->where('cliente_nome','not like','N%')
            ->where('cliente_nome','not like','O%')
            ->where('cliente_nome','not like','P%')
            ->where('cliente_nome','not like','Q%')
            ->where('cliente_nome','not like','R%')
            ->where('cliente_nome','not like','S%')
            ->where('cliente_nome','not like','T%')
            ->where('cliente_nome','not like','U%')
            ->where('cliente_nome','not like','V%')
            ->where('cliente_nome','not like','X%')
            ->where('cliente_nome','not like','Y%')
            ->where('cliente_nome','not like','Z%')
            ->where('cliente_nome','not like','W%')
            ->orderBy('cliente_nome', 'ASC')
            ->orderBy('created_at', 'DESC')->get(["cliente_nome","id","created_at"]);
        }else{
            $nomes = Ordem::where('cliente_nome','like',$letra.'%')->orderBy('cliente_nome', 'ASC')
            ->orderBy('created_at', 'DESC')->get(["cliente_nome","id","created_at"]);
        }
        $clientes = Cliente::orderBy('nome')->get(['id','nome']);
        $ordem = Ordem::where('id',$id)->get();
        $items = Item::where('ordem_id',$id)->get();
        $total = 0;
        foreach($items as $item){
            $x = floatval($item->valor);
            $total += $x;
        }
        return view('admin.ordems.home', compact('nomes','ordem','letra','items','total','clientes'));
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
        $nome = explode('-',$request["cliente_nome"])[1];
        $id = explode('-',$request["cliente_nome"])[0];
        $paga = $request["paga"] == "Sim" ? "Sim" : "Não";
        $concluida = $request["concluida"] == "Sim" ? "Sim" : "Não";
        $novaordem = [
            "cliente_nome" => $nome,
            "cliente_id" => $id,
            "funcionario_nome" => $request["funcionario_nome"],
            "valor_final" => $request["valor_final"],
            "total_pago" => $request["total_pago"],
            "total_devido" => $request["total_devido"],
            "paga" => $paga,
            "concluida" => $concluida
        ];
        $ordem = Ordem::create($novaordem);

        $OSid = $ordem->id;
        foreach($request["descricaoOS"] as $key=>$item){
            $descricao = $request["descricaoOS"][$key];
            $valor = $request["valorOS"][$key];
            Item::create([
                'ordem_id' => $OSid,
                'descricao' => $descricao,
                'valor'     => $valor
            ]);
        }
        $this->bkpdata();
        return redirect('/admin/ordemNav/&/'.$OSid);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ordem = Ordem::find($id);
        $items = Item::where('ordem_id',$id)->get();
        $total = 0;
        foreach($items as $item){
            $x = floatval($item->valor);
            $total += $x;
        }
        $cliente = Cliente::find($ordem->cliente_id);
        return view('admin.ordems.printos', compact('ordem','cliente','items','total'));
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
        $nome = explode('-',$request["cliente_nome"])[1];
        $id = explode('-',$request["cliente_nome"])[0];
        $paga = $request["paga"] == "Sim" ? "Sim" : "Não";
        $concluida = $request["concluida"] == "Sim" ? "Sim" : "Não";
        $novaordem = Ordem::find($id);
        $novaordem->cliente_nome = $nome;
        $novaordem->cliente_id = $id;
        $novaordem->funcionario_nome = $request["funcionario_nome"];
        $novaordem->valor_final = $request["valor_final"];
        $novaordem->total_pago = $request["total_pago"];
        $novaordem->total_devido = $request["total_devido"];
        $novaordem->paga = $paga;
        $novaordem->concluida = $concluida;
        $novaordem->save();
        Item::where('ordem_id',$id)->delete();
        foreach($request["descricaoOSED"] as $key=>$item){
            $descricao = $request["descricaoOSED"][$key];
            $valor = $request["valorOSED"][$key];
            Item::create([
                'ordem_id' => $id,
                'descricao' => $descricao,
                'valor'     => $valor
            ]);
        }
        $this->bkpdata();
        return redirect('/admin/ordemNav/&/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Item::where('ordem_id',$id)->delete();
        Ordem::find($id)->delete();
        return redirect('/admin/ordemsNav/A');
    }
}
