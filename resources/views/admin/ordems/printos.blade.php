@extends('layouts.admin')

@section('content')
<div class="content">
    <div class="card">
        <div class="card-body text-monospace">
            <div class="text-center">
                <img src="{{URL::asset('/images/logo.png')}}" class="img-fluid" style="max-height:150px;"
                    alt="Logo Maxicalhas">
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
            <br />
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
                    <strong>Itens da Ordem de Serviço:</strong><br /><br />
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <strong>Descricao</strong>
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
            <p>Obs1. Não é válido como documento fiscal.</p>
            <p>Obs2. Nota fiscal somente será emitida após o término do serviço.</p>
            <br />
            <div class="row">
                <div class="col text-center">
                    <strong>Orçamento Aprovado</strong><br /><br /><br />
                    _______________________________________________
                </div>
                <div class="col text-center">
                    <strong>Obra concluída e autorizada para emissão de NF.</strong><br /><br /><br />
                    _______________________________________________
                </div>
            </div>
            <br /><br /><br />
            <hr />
            <p class="text-center">[MAXI Calhas] -
                Calhas|Coifas|Condutores|Pingadeiras|Exaustores|Rufos|Chaminés|Tubulações</p>
            <p class="text-center">R. Antônio Bernardes Pereira 81, São Geraldo, Varginha-MG
                Tel:(35)3221-5679/(35)98887-2205</p>



        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
@endsection