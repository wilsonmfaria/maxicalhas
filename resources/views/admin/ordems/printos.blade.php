@extends('layouts.admin')

@section('content')
<style>
@media print {
  div {
    break-inside: avoid;
  }
}
</style>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fira+Mono:wght@500&display=swap" rel="stylesheet">
<div class="content">
    <div class="card">
        <div class="card-body" style="font-family: 'Fira Mono', monospace; font-size: 1.25rem;">
            <div class="text-center">
            <p class="text-center">[MAXI Calhas] -
                Calhas|Coifas|Condutores|Pingadeiras|Exaustores|Rufos|Chaminés|Tubulações</p>
            <p class="text-center">R. Antônio Bernardes Pereira 81, São Geraldo, Varginha-MG
                Tel:(35)3221-5679/(35)98887-2205</p>
            </div>
            <hr />
            <div class="row">
                <div class="col">
                    <strong>Pedido:</strong> {{$ordem->id}}
                </div>
                <div class="col">
                    <strong>Data:</strong> {{ date('d/m/Y H:i', strtotime($ordem->created_at))}}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <strong>Vendedor:</strong> {{$ordem->funcionario_nome}}
                </div>
            </div>
            
            <div class="row">
                <div class="col">
                    <strong>Cliente:</strong> {{$cliente->nome}}
                </div>
                <div class="col">
                    <strong>Telefone:</strong> {{$cliente->telefone}}
                    {{$cliente->celular == '' ? '' : ' | '.$cliente->celular}}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <strong>CPF:</strong> {{$cliente->cpf}}
                </div>
                <div class="col">
                    <strong>CNPJ:</strong> {{$cliente->cnpj}}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <strong>Endereço:</strong> {{$cliente->rua}} {{$cliente->numero}} {{$cliente->bairro}}
                    {{$cliente->cidade}}
                    {{$cliente->estado}} {{$cliente->cep == '' ? '' : 'CEP: '.$cliente->cep}}
                </div>
                <div class="col"><strong>Local da Obra:</strong> {{$ordem->local_obra}}</div>
            </div>
            <hr />
            <div class="row">
                <div class="col">
                    <strong>Itens da Ordem de Serviço</strong>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <strong>Descrição</strong>
                </div>
                <div class="col">
                    <strong>Valor</strong>
                </div>
            </div>
            @foreach($items as $item)
            <div class="row">
                <div class="col">
                    {{$item->descricao}}
                </div>
                <div class="col">
                    R$ {{number_format($item->valor,2,'.','')}}
                </div>
            </div>
            @endforeach
            <div class="row">
                <div class="col text-right">
                    <strong>Valor Bruto:</strong>
                </div>
                <div class="col border-top">
                    <strong>R$ {{number_format($total,2,'.','')}} </strong>
                </div>
            </div>
            <div class="row">
                <div class="col text-right">
                    <strong>Abatimento:</strong>
                </div>
                <div class="col">
                    <strong>R$ {{number_format($ordem->valor_desconto,2,'.','')}} </strong>
                </div>
            </div>
            <div class="row">
                <div class="col text-right">
                    <strong>Valor Final:</strong>
                </div>
                <div class="col border-top">
                    <strong>R$ {{number_format($ordem->valor_final,2,'.','')}} </strong>
                </div>
            </div>
            <hr />
            <p>Obs1. Não é válido como documento fiscal.<br />
            Obs2. Nota fiscal somente será emitida após o término do serviço.</p>
            
            <div class="row">
                <div class="col text-center">
                    <strong>Orçamento Aprovado</strong><br/><br/>
                    _______________________________________________
                </div>
                <div class="col text-center">
                    <strong>Obra concluída e autorizada para emissão de NF.</strong><br/><br/>
                    _______________________________________________
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body" style="font-family: 'Fira Mono', monospace; font-size: 1.25rem;">
            <div class="text-center">
            <p class="text-center">[MAXI Calhas] -
                Calhas|Coifas|Condutores|Pingadeiras|Exaustores|Rufos|Chaminés|Tubulações</p>
            <p class="text-center">R. Antônio Bernardes Pereira 81, São Geraldo, Varginha-MG
                Tel:(35)3221-5679/(35)98887-2205</p>
            </div>
            <hr />
            <div class="row">
                <div class="col">
                    <strong>Pedido:</strong> {{$ordem->id}}
                </div>
                <div class="col">
                    <strong>Data:</strong> {{ date('d/m/Y H:i', strtotime($ordem->created_at))}}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <strong>Vendedor:</strong> {{$ordem->funcionario_nome}}
                </div>
            </div>
            
            <div class="row">
                <div class="col">
                    <strong>Cliente:</strong> {{$cliente->nome}}
                </div>
                <div class="col">
                    <strong>Telefone:</strong> {{$cliente->telefone}}
                    {{$cliente->celular == '' ? '' : ' | '.$cliente->celular}}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <strong>CPF:</strong> {{$cliente->cpf}}
                </div>
                <div class="col">
                    <strong>CNPJ:</strong> {{$cliente->cnpj}}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <strong>Endereço:</strong> {{$cliente->rua}} {{$cliente->numero}} {{$cliente->bairro}}
                    {{$cliente->cidade}}
                    {{$cliente->estado}} {{$cliente->cep == '' ? '' : 'CEP: '.$cliente->cep}}
                </div>
            </div>
            <hr />
            <div class="row">
                <div class="col">
                    <strong>Itens da Ordem de Serviço</strong>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <strong>Descrição</strong>
                </div>
                <div class="col">
                    <strong>Valor</strong>
                </div>
            </div>
            @foreach($items as $item)
            <div class="row">
                <div class="col">
                    {{$item->descricao}}
                </div>
                <div class="col">
                    R$ {{number_format($item->valor,2,'.','')}}
                </div>
            </div>
            @endforeach
            <div class="row">
                <div class="col text-right">
                    <strong>Total:</strong>
                </div>
                <div class="col border-top">
                    <strong>R$ {{number_format($total,2,'.','')}} </strong>
                </div>
            </div>
            <div class="row">
                <div class="col text-right">
                    <strong>Valor Combinado:</strong>
                </div>
                <div class="col">
                    <strong>R$ {{number_format($ordem->valor_final,2,'.','')}} </strong>
                </div>
            </div>
            <hr />
            <p>Obs1. Não é válido como documento fiscal.<br />
            Obs2. Nota fiscal somente será emitida após o término do serviço.</p>
            
            <div class="row">
                <div class="col text-center">
                    <strong>Orçamento Aprovado</strong><br/><br/>
                    _______________________________________________
                </div>
                <div class="col text-center">
                    <strong>Obra concluída e autorizada para emissão de NF.</strong><br/><br/>
                    _______________________________________________
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
@endsection