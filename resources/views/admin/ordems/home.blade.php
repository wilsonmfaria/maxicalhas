@extends('layouts.admin')

@section('content')
<div class="content">

    <div class="row">
        <div class="fixed-abcdario bg-white text-center rounded p-2 m-2">
            <div class="list-group" style="font-family: 'Courier New', monospace; font-size:25px;">
                <span><a class='btn btn-light' href='/admin/ordemsNav/&'>#</a> <a class='btn btn-light'
                        href='/admin/ordemsNav/M'>M</a></span>
                <span><a class='btn btn-light' href='/admin/ordemsNav/A'>A</a> <a class='btn btn-light'
                        href='/admin/ordemsNav/N'>N</a></span>
                <span><a class='btn btn-light' href='/admin/ordemsNav/B'>B</a> <a class='btn btn-light'
                        href='/admin/ordemsNav/O'>O</a></span>
                <span><a class='btn btn-light' href='/admin/ordemsNav/C'>C</a> <a class='btn btn-light'
                        href='/admin/ordemsNav/P'>P</a></span>
                <span><a class='btn btn-light' href='/admin/ordemsNav/D'>D</a> <a class='btn btn-light'
                        href='/admin/ordemsNav/Q'>Q</a></span>
                <span><a class='btn btn-light' href='/admin/ordemsNav/E'>E</a> <a class='btn btn-light'
                        href='/admin/ordemsNav/R'>R</a></span>
                <span><a class='btn btn-light' href='/admin/ordemsNav/F'>F</a> <a class='btn btn-light'
                        href='/admin/ordemsNav/S'>S</a></span>
                <span><a class='btn btn-light' href='/admin/ordemsNav/G'>G</a> <a class='btn btn-light'
                        href='/admin/ordemsNav/T'>T</a></span>
                <span><a class='btn btn-light' href='/admin/ordemsNav/H'>H</a> <a class='btn btn-light'
                        href='/admin/ordemsNav/U'>U</a></span>
                <span><a class='btn btn-light' href='/admin/ordemsNav/I'>I</a> <a class='btn btn-light'
                        href='/admin/ordemsNav/V'>V</a></span>
                <span><a class='btn btn-light' href='/admin/ordemsNav/J'>J</a> <a class='btn btn-light'
                        href='/admin/ordemsNav/X'>X</a></span>
                <span><a class='btn btn-light' href='/admin/ordemsNav/K'>K</a> <a class='btn btn-light'
                        href='/admin/ordemsNav/Y'>Y</a></span>
                <span><a class='btn btn-light' href='/admin/ordemsNav/L'>L</a> <a class='btn btn-light'
                        href='/admin/ordemsNav/Z'>Z</a></span>
                <span><a class='btn btn-light' href='/admin/ordemsNav/W'>W</a> <a class='btn btn-light'
                        href='/admin/ordemsNav/&'>#</a></span>
            </div>
        </div>
        <div class="fixed-lista bg-white text-center rounded p-2 m-2">
            <div class="overflow-auto">
                <div class="list-group">
                    @foreach($nomes as $nome)
                    <a href="/admin/ordemNav/{{$letra}}/{{$nome->id}}" class="list-group-item list-group-item-action">
                        <span>{{$nome->cliente_nome}}</span><br/>
                        <span class="badge badge-pill badge-light">Aberto em: {{ date('d/m/Y', strtotime($nome->created_at)) }}</span>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col col-lg">
            <div class="row my-2">
                <div class="col">
                    <button type="button" class="btn btn-success" data-toggle="modal"
                        data-target="#ModalCRIAR">Cadastrar nova OS</button>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="alert alert-light fixed-card">
                        @if($ordem)
                        <div class="row mb-3">
                            <div class="col text-dark">
                                <h4>OS {{$ordem[0]->id}} | {{$ordem[0]->cliente_nome}}</h4>
                                <h6>Responsável(s): {{$ordem[0]->funcionario_nome}}</h6>
                                <hr />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col h6 text-monospace text-dark">
                                <p><strong>Data de Abertura:</strong>
                                    {{ date('d/m/Y H:i', strtotime($ordem[0]->created_at))}}</p>
                                <p><strong>Concluida:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    {{$ordem[0]->concluida}}</p>
                                <p><strong>Paga:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    {{$ordem[0]->paga}}</p>
                                <br /><br />
                                <p><strong>Valor Final:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; R$
                                    {{number_format($ordem[0]->valor_final,2,'.','')}}
                                </p>
                                <p><strong>Valor Pago:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; R$
                                    {{number_format($ordem[0]->total_pago,2,'.','')}}
                                </p>
                                <hr />
                                <p><strong>Em Aberto:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; R$
                                    {{number_format($ordem[0]->total_devido,2,'.','')}}
                                </p>


                            </div>
                            <div class="col">
                                <div class="overflow-auto">
                                    <div class="list-group">
                                        <table class="table table-sm"
                                            style="font-family: 'Courier New', monospace;color:black;">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        Item
                                                    </th>
                                                    <th>
                                                        Valor
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($items as $item)
                                                <tr>
                                                    <td>
                                                        {{$item->descricao}}
                                                    </td>
                                                    <td>
                                                        R$
                                                        {{number_format($item->valor,2,'.','')}}
                                                    </td>
                                                </tr>
                                                @endforeach
                                                <tr>
                                                    <td>
                                                        TOTAL
                                                    </td>
                                                    <td>
                                                        R$ {{number_format($total,2,'.','')}}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col text-right">
                                <a type="button" class="btn btn-primary" href="{{ route('admin.ordems.show', $ordem[0]->id) }}">Imprimir</a>
                                <button type="button" class="btn btn-warning" data-toggle="modal"
                                    onclick='pegaTotalED()' data-target="#ModalEDITAR">Editar</button>
                                <form action="{{ route('admin.ordems.destroy', $ordem[0]->id) }}" method="POST"
                                    onsubmit="return confirm('Tem certeza?');" style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="btn btn-danger" value="Excluir">
                                </form>
                            </div>
                        </div>
                        @else
                        Nenhum ordem foi cadastrado com a letra {{$letra}}...
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal CRIAR-->
<div class="modal fade" id="ModalCRIAR" tabindex="-1" role="dialog" aria-labelledby="ModalCRIARLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalCRIARLabel">Cadastro de Nova OS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.ordems.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="cliente_nome" class="col-2 col-form-label">Cliente</label> 
                        <div class="col-8">
                        <select id="cliente_nome" name="cliente_nome" class="custom-select">
                            @foreach($clientes as $cliente)
                            <option value="{{$cliente->id}}-{{$cliente->nome}}">{{$cliente->nome}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label for="funcionario_nome" class="col-2 col-form-label">Responsável*</label>
                        <div class="col-8">
                            <input id="funcionario_nome" name="funcionario_nome"
                                placeholder="Entre com o funcionario_nome completo" type="text" class="form-control"
                                required="required" autocomplete="off">
                        </div>
                    </div>
                    <hr />
                    <label for="inputFormRow" class="col-form-label">Items da ordem de serviço:</label>
                    <div id="inputFormRow">
                        <div class="input-group mb-1">
                            <input type="text" name="descricaoOS[]" class="form-control m-input"
                                placeholder="Descrição do produto/serviço" autocomplete="off" required="required">

                            <input onblur="pegaTotal()" type="number" lang="en_US" step="0.01" name="valorOS[]"
                                class="form-control m-input" placeholder="Valor do produto/serviço" autocomplete="off"
                                value=0 required="required">
                            <div class="input-group-append">
                                <button id="removeRow" type="button" class="btn btn-danger">Remover</button>
                            </div>
                        </div>
                    </div>
                    <div id="newRow"></div>
                    <button id="addRow" type="button" class="btn btn-sm btn-info">Novo Produto/Serviço</button>
                    <strong>
                        <div class="float-right" id="totalOS"></div>
                    </strong>
                    <hr />
                    <div class="form-group row">
                        <label for="valor_final" class="col-2 col-form-label">Valor Final*</label>
                        <div class="col-8">
                            <input id="valor_final" name="valor_final" placeholder="Entre com o valor final combinado"
                                type="number" lang="us-US" step="0.01" class="form-control" required="required" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="total_pago" class="col-2 col-form-label">Total Pago</label>
                        <div class="col-8">
                            <input onblur='calcDevido()' id="total_pago" name="total_pago" placeholder="Entre com o valor já pago"
                                type="number" lang="en_US" step="0.01" class="form-control" required="required" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="total_devido" class="col-2 col-form-label">Total Em Aberto</label>
                        <div class="col-8">
                            <input id="total_devido" name="total_devido" placeholder="Entre com o valor a ser paga"
                                type="number" lang="en_US" step="0.01" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2">Concluida</label>
                        <div class="col-8">
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="concluida" id="concluida_0" type="checkbox"
                                class="custom-control-input" value="Sim">
                                <label for="concluida_0" class="custom-control-label">Marcado (Sim) | Desmarcado (Não)</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2">Paga</label>
                        <div class="col-8">
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="paga" id="paga_0" type="checkbox"
                                class="custom-control-input" value="Sim">
                                <label for="paga_0" class="custom-control-label">Marcado (SIM) | Desmarcado (Não)</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@isset($ordem)
<!-- Modal EDITAR-->
<div class="modal fade" id="ModalEDITAR" tabindex="-1" role="dialog" aria-labelledby="ModalEDITARLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalEDITARLabel">Cadastro de Novo ordem</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.ordems.update',$ordem[0]->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="cliente_nome" class="col-2 col-form-label">Cliente*</label>
                        <div class="col-8">
                            <input id="cliente_nomeED" name="cliente_nome"
                                placeholder="Entre com o cliente_nome completo" type="text" class="form-control"
                                required="required" value="{{$ordem[0]->id}}-{{$ordem[0]->cliente_nome}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="funcionario_nome" class="col-2 col-form-label">Responsável*</label>
                        <div class="col-8">
                            <input id="funcionario_nomeED" name="funcionario_nome"
                                placeholder="Entre com o funcionario_nome completo" type="text" class="form-control"
                                required="required" value="{{$ordem[0]->funcionario_nome}}" autocomplete="off">
                        </div>
                    </div>
                    <hr />
                    <label for="inputFormRowED" class="col-form-label">Items da ordem de serviço:</label>
                    @foreach($items as $item)
                    <div id="inputFormRowED">
                        <div class="input-group mb-1">
                            <input type="text" name="descricaoOSED[]" class="form-control m-input"
                                placeholder="Descrição do produto/serviço" autocomplete="off"
                                value="{{$item->descricao}}" required="required">

                            <input onblur="pegaTotalED()" type="number" lang="en_US" step="0.01" name="valorOSED[]"
                                class="form-control m-input" placeholder="Valor do produto/serviço" autocomplete="off"
                                value="{{$item->valor}}" required="required">
                            <div class="input-group-append">
                                <button id="removeRowED" type="button" class="btn btn-danger">Remover</button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div id="newRowED"></div>
                    <button id="addRowED" type="button" class="btn btn-sm btn-info">Novo Produto/Serviço</button>
                    <strong>
                        <div class="float-right" id="totalOSED"></div>
                    </strong>
                    <hr />
                    <div class="form-group row">
                        <label for="valor_finalED" class="col-2 col-form-label">Valor Final*</label>
                        <div class="col-8">
                            <input id="valor_finalED" name="valor_final" placeholder="Entre com o valor final combinado"
                                type="number" lang="us-US" step="0.01" class="form-control" required="required"
                                value="{{$ordem[0]->valor_final}}" required="required" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="total_pago" class="col-2 col-form-label">Total Pago</label>
                        <div class="col-8">
                            <input onblur='calcDevidoED()' id="total_pagoED" name="total_pago" placeholder="Entre com o valor já pago"
                                type="number" lang="en_US" step="0.01" class="form-control"
                                value="{{$ordem[0]->total_pago}}" required="required" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="total_devido" class="col-2 col-form-label">Total Em Aberto</label>
                        <div class="col-8">
                            <input id="total_devidoED" name="total_devido" placeholder="Entre com o valor a ser paga"
                                type="number" lang="en_US" step="0.01" class="form-control"
                                value="{{$ordem[0]->total_devido}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2">Concluida</label>
                        <div class="col-8">
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="concluida" id="concluida_0" type="checkbox" {{$ordem[0]->concluida == "Sim" ? "checked" : ""}}
                                    class="custom-control-input" value="Sim">
                                <label for="concluida_0" class="custom-control-label">Marcado (Sim) | Desmarcado (Não)</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2">Paga</label>
                        <div class="col-8">
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="paga" id="paga_0" type="checkbox" {{$ordem[0]->paga == "Sim" ? "checked" : ""}}
                                    class="custom-control-input" value="Sim">
                                <label for="paga_0" class="custom-control-label">Marcado (Sim) | Desmarcado (Não)</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endisset
@endsection
@section('scripts')
<script type="text/javascript">

//FUNCOES PARA CONTROLE DA CRIACAO DE OS
$("#addRow").click(function() {
    var html = '';
    html += '<div id="inputFormRow">';
    html += '<div class="input-group mb-1">';
    html += '<input type="text" name="descricaoOS[]" class="form-control m-input" placeholder="Descrição do produto/serviço" autocomplete="off" required="required">';
    html += '<input onblur="pegaTotal()" type="number" step="0.01" lang="en-US" name="valorOS[]" class="form-control m-input" placeholder="Valor do produto/serviço" autocomplete="off" value=0 required="required">';
    html += '<div class="input-group-append">';
    html += '<button id="removeRow" type="button" class="btn btn-danger">Remover</button>';
    html += '</div>';
    html += '</div>';
    $('#newRow').append(html);
});
$(document).on('click', '#removeRow', function() {
    $(this).closest('#inputFormRow').remove();
});

function pegaTotal() {
    total = 0.00;
    $('input[name="valorOS[]"]').each(function() {
        val = $(this).val();
        total += Number.parseFloat(val);
    });
    $("#totalOS").text("TOTAL: R$ " + total);
    $("#valor_final").val(total);
};

function calcDevido() {
    total = 0.00;
    var total = $('#valor_final').val();
    var pago = $('#total_pago').val();
    final = Number.parseFloat(total)-Number.parseFloat(pago);
    $("#total_devido").val(final);
};

//FUNCOES PARA CONTROLE DA EDICAO DE OS
$("#addRowED").click(function() {
    var html = '';
    html += '<div id="inputFormRowED">';
    html += '<div class="input-group mb-1">';
    html += '<input type="text" name="descricaoOSED[]" class="form-control m-input" placeholder="Descrição do produto/serviço" autocomplete="off" required="required">';
    html += '<input onblur="pegaTotalED()" type="number" step="0.01" lang="en-US" name="valorOSED[]" class="form-control m-input" placeholder="Valor do produto/serviço" autocomplete="off" required value=0 required="required">';
    html += '<div class="input-group-append">';
    html += '<button id="removeRowED" type="button" class="btn btn-danger">Remover</button>';
    html += '</div>';
    html += '</div>';
    $('#newRowED').append(html);
});
$(document).on('click', '#removeRowED', function() {
    $(this).closest('#inputFormRowED').remove();
});

function pegaTotalED() {
    total = 0.00;
    $('input[name="valorOSED[]"]').each(function() {
        val = $(this).val();
        total += Number.parseFloat(val);
    });
    $("#totalOSED").text("TOTAL: R$ " + total);
    $("#valor_finalED").val(total);
};

function calcDevidoED() {
    total = 0.00;
    var total = $('#valor_finalED').val();
    var pago = $('#total_pagoED').val();
    final = Number.parseFloat(total)-Number.parseFloat(pago);
    $("#total_devidoED").val(final);
};
</script>
@parent

@endsection