@extends('layouts.admin')

@section('content')
<div class="content">

    <div class="row">
        <div class="fixed-abcdario bg-white text-center rounded p-2 m-2">
        <div class="list-group" style="font-family: 'Courier New', monospace; font-size:25px;">
                <span><a class='btn btn-light' href='/admin/clientesNav/&'>#</a> <a class='btn btn-light'
                        href='/admin/clientesNav/M'>M</a></span>
                <span><a class='btn btn-light' href='/admin/clientesNav/A'>A</a> <a class='btn btn-light'
                        href='/admin/clientesNav/N'>N</a></span>
                <span><a class='btn btn-light' href='/admin/clientesNav/B'>B</a> <a class='btn btn-light'
                        href='/admin/clientesNav/O'>O</a></span>
                <span><a class='btn btn-light' href='/admin/clientesNav/C'>C</a> <a class='btn btn-light'
                        href='/admin/clientesNav/P'>P</a></span>
                <span><a class='btn btn-light' href='/admin/clientesNav/D'>D</a> <a class='btn btn-light'
                        href='/admin/clientesNav/Q'>Q</a></span>
                <span><a class='btn btn-light' href='/admin/clientesNav/E'>E</a> <a class='btn btn-light'
                        href='/admin/clientesNav/R'>R</a></span>
                <span><a class='btn btn-light' href='/admin/clientesNav/F'>F</a> <a class='btn btn-light'
                        href='/admin/clientesNav/S'>S</a></span>
                <span><a class='btn btn-light' href='/admin/clientesNav/G'>G</a> <a class='btn btn-light'
                        href='/admin/clientesNav/T'>T</a></span>
                <span><a class='btn btn-light' href='/admin/clientesNav/H'>H</a> <a class='btn btn-light'
                        href='/admin/clientesNav/U'>U</a></span>
                <span><a class='btn btn-light' href='/admin/clientesNav/I'>I</a> <a class='btn btn-light'
                        href='/admin/clientesNav/V'>V</a></span>
                <span><a class='btn btn-light' href='/admin/clientesNav/J'>J</a> <a class='btn btn-light'
                        href='/admin/clientesNav/X'>X</a></span>
                <span><a class='btn btn-light' href='/admin/clientesNav/K'>K</a> <a class='btn btn-light'
                        href='/admin/clientesNav/Y'>Y</a></span>
                <span><a class='btn btn-light' href='/admin/clientesNav/L'>L</a> <a class='btn btn-light'
                        href='/admin/clientesNav/Z'>Z</a></span>
                <span><a class='btn btn-light' href='/admin/clientesNav/W'>W</a> <a class='btn btn-light'
                        href='/admin/clientesNav/&'>#</a></span>
            </div>
        </div>
        <div class="fixed-lista bg-white text-center rounded p-2 m-2">
            <div class="overflow-auto">
                <div class="list-group">
                    @foreach($nomes as $nome)
                    <a href="/admin/clienteNav/{{$letra}}/{{$nome->id}}"class="list-group-item list-group-item-action">
                        <span >{{ $nome->nome }}</span>
                        </br>
                        <span class="badge badge-pill badge-light">{{ $nome->telefone }}</span><span class="badge badge-pill badge-light">{{ $nome->celular }}</span>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col col-lg">
            <div class="row my-2">
                <div class="col">
                    <button type="button" class="btn btn-success" data-toggle="modal"
                        data-target="#ModalCRIAR">Cadastrar novo Cliente</button>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="alert alert-light">
                        @if($cliente)
                        <div class="row mb-3">
                            <div class="col">
                                <h4>{{$cliente[0]->id}} | {{$cliente[0]->nome}}</h4>
                                <h6>Criado em: {{ date('d/m/Y', strtotime($cliente[0]->created_at))}}</h6>
                                <hr />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col h6 text-monospace text-dark">
                                
                                <p><strong>Endereço:</strong> {{$cliente[0]->rua}} {{$cliente[0]->numero}}
                                    {{$cliente[0]->bairro}}</p>
                                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$cliente[0]->cidade}}
                                    {{$cliente[0]->estado}} {{$cliente[0]->cep == '' ? '' : 'CEP: '.$cliente[0]->cep}}
                                </p>
                                <p><strong>CPF:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$cliente[0]->cpf}}</p>
                                <p><strong>CNPJ:</strong>&nbsp;&nbsp;&nbsp;&nbsp; {{$cliente[0]->cnpj}}</p>
                                <p><strong>Telefone:</strong> {{$cliente[0]->telefone}}</p>
                                <p><strong>Celular:</strong>&nbsp; {{$cliente[0]->celular}}</p>
                                @foreach($cliente[0]->ordems as $ordem)
                                    <a class="btn btn-sm btn-secondary" href="/admin/ordemNav/@/{{$ordem->id}}">OS-{{$ordem->id}}</a> 
                                    @if($loop->index+1 % 6 == 0)
                                        <br/>
                                    @endif 
                                @endforeach
                            </div>
                        </div>
                        <div class="row">

                            <div class="col text-right">
                                <button type="button" class="btn btn-warning" data-toggle="modal"
                                    data-target="#ModalEDITAR">Editar</button>
                                <form action="{{ route('admin.clientes.destroy', $cliente[0]->id) }}" method="POST" onsubmit="return confirm('Tem certeza?');" style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="btn btn-danger" value="Excluir">
                                </form>
                            </div>
                        </div>
                        @else
                        Nenhum cliente foi cadastrado com a letra {{$letra}}...
                        @endif
                    </div>
                    @if (\Session::has('erroDELETE'))
                        <div class="alert alert-danger">
                            {!! \Session::get('erroDELETE') !!}
                        </div>
                    @endif
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
                <h5 class="modal-title" id="ModalCRIARLabel">Cadastro de Novo Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route("admin.clientes.store") }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="nome" class="col-2 col-form-label">Nome*</label>
                        <div class="col-8">
                            <input id="nome" name="nome" placeholder="Entre com o nome completo" type="text"
                                class="form-control" required="required">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cpf" class="col-2 col-form-label">CPF</label>
                        <div class="col-8">
                            <input id="cpf" name="cpf" placeholder="XXX.XXX.XXX-XX" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cnpj" class="col-2 col-form-label">CNPJ</label>
                        <div class="col-8">
                            <input id="cnpj" name="cnpj" placeholder="XX.XXX.XXX/XXXX-XX" type="text"
                                class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="telefone" class="col-2 col-form-label">Telefone</label>
                        <div class="col-8">
                            <input id="telefone" name="telefone" placeholder="(XX) XXXXX-XXXX" type="text"
                                class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Celular" class="col-2 col-form-label">Celular</label>
                        <div class="col-8">
                            <input id="Celular" name="Celular" placeholder="(XX) XXXXX-XXXX" type="text"
                                class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="rua" class="col-2 col-form-label">Logradouro</label>
                        <div class="col-8">
                            <input id="rua" name="rua" placeholder="Entre com o logradouro" type="text"
                                class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="numero" class="col-2 col-form-label">Número</label>
                        <div class="col-8">
                            <input id="numero" name="numero" placeholder="Entre com o número da casa" type="text"
                                class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="bairro" class="col-2 col-form-label">Bairro</label>
                        <div class="col-8">
                            <input id="bairro" name="bairro" placeholder="Entre com o bairro" type="text"
                                class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cidade" class="col-2 col-form-label">Cidade*</label>
                        <div class="col-8">
                            <input id="cidade" name="cidade" placeholder="Entre com a cidade" type="text"
                                class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="estado" class="col-2 col-form-label">Estado*</label>
                        <div class="col-8">
                            <select id="estado" name="estado" class="custom-select" required="required">
                                <option value='AC'>AC</option>
                                <option value='AL'>AL</option>
                                <option value='AP'>AP</option>
                                <option value='AM'>AM</option>
                                <option value='BA'>BA</option>
                                <option value='CE'>CE</option>
                                <option value='ES'>ES</option>
                                <option value='GO'>GO</option>
                                <option value='MA'>MA</option>
                                <option value='MT'>MT</option>
                                <option value='MS'>MS</option>
                                <option value='MG' selected>MG</option>
                                <option value='PA'>PA</option>
                                <option value='PB'>PB</option>
                                <option value='PR'>PR</option>
                                <option value='PE'>PE</option>
                                <option value='PI'>PI</option>
                                <option value='RJ'>RJ</option>
                                <option value='RN'>RN</option>
                                <option value='RS'>RS</option>
                                <option value='RO'>RO</option>
                                <option value='RR'>RR</option>
                                <option value='SC'>SC</option>
                                <option value='SP'>SP</option>
                                <option value='SE'>SE</option>
                                <option value='TO'>TO</option>
                                <option value='DF'>DF</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@isset($cliente)
<!-- Modal EDITAR-->
<div class="modal fade" id="ModalEDITAR" tabindex="-1" role="dialog" aria-labelledby="ModalEDITARLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalEDITARLabel">Cadastro de Novo Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.clientes.update', [$cliente[0]->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">

                    <div class="form-group row">
                        <label for="nome" class="col-2 col-form-label">Nome*</label>
                        <div class="col-8">
                            <input id="nome" name="nome" placeholder="Entre com o nome completo" type="text"
                                class="form-control" required="required" value='{{$cliente[0]->nome}}'>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cpf" class="col-2 col-form-label">CPF</label>
                        <div class="col-8">
                            <input id="cpf" name="cpf" placeholder="XXX.XXX.XXX-XX" type="text" class="form-control"
                                value='{{$cliente[0]->cpf}}'>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cnpj" class="col-2 col-form-label">CNPJ</label>
                        <div class="col-8">
                            <input id="cnpj" name="cnpj" placeholder="XX.XXX.XXX/XXXX-XX" type="text"
                                class="form-control" value='{{$cliente[0]->cnpj}}'>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="telefone" class="col-2 col-form-label">Telefone</label>
                        <div class="col-8">
                            <input id="telefone" name="telefone" placeholder="(XX) XXXXX-XXXX" type="text"
                                class="form-control" value='{{$cliente[0]->telefone}}'>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Celular" class="col-2 col-form-label">Celular</label>
                        <div class="col-8">
                            <input id="Celular" name="Celular" placeholder="(XX) XXXXX-XXXX" type="text"
                                class="form-control" value='{{$cliente[0]->celular}}'>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="rua" class="col-2 col-form-label">Logradouro</label>
                        <div class="col-8">
                            <input id="rua" name="rua" placeholder="Entre com o logradouro" type="text"
                                class="form-control" value='{{$cliente[0]->rua}}'>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="numero" class="col-2 col-form-label">Número</label>
                        <div class="col-8">
                            <input id="numero" name="numero" placeholder="Entre com o número da casa" type="text"
                                class="form-control" value='{{$cliente[0]->numero}}'>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="bairro" class="col-2 col-form-label">Bairro</label>
                        <div class="col-8">
                            <input id="bairro" name="bairro" placeholder="Entre com o bairro" type="text"
                                class="form-control" value='{{$cliente[0]->bairro}}'>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cidade" class="col-2 col-form-label">Cidade*</label>
                        <div class="col-8">
                            <input id="cidade" name="cidade" placeholder="Entre com a cidade" type="text"
                                class="form-control" value='{{$cliente[0]->cidade}}'>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="estado" class="col-2 col-form-label">Estado*</label>
                        <div class="col-8">
                            <select id="estado" name="estado" class="custom-select" required="required">
                                <option value='AC' {{$cliente[0]->estado == 'AC' ? 'selected' : ''}}>AC</option>
                                <option value='AL' {{$cliente[0]->estado == 'AL' ? 'selected' : ''}}>AL</option>
                                <option value='AP' {{$cliente[0]->estado == 'AP' ? 'selected' : ''}}>AP</option>
                                <option value='AM' {{$cliente[0]->estado == 'AM' ? 'selected' : ''}}>AM</option>
                                <option value='BA' {{$cliente[0]->estado == 'BA' ? 'selected' : ''}}>BA</option>
                                <option value='CE' {{$cliente[0]->estado == 'CE' ? 'selected' : ''}}>CE</option>
                                <option value='ES' {{$cliente[0]->estado == 'ES' ? 'selected' : ''}}>ES</option>
                                <option value='GO' {{$cliente[0]->estado == 'GO' ? 'selected' : ''}}>GO</option>
                                <option value='MA' {{$cliente[0]->estado == 'MA' ? 'selected' : ''}}>MA</option>
                                <option value='MT' {{$cliente[0]->estado == 'MT' ? 'selected' : ''}}>MT</option>
                                <option value='MS' {{$cliente[0]->estado == 'MS' ? 'selected' : ''}}>MS</option>
                                <option value='MG' {{$cliente[0]->estado == 'MG' ? 'selected' : ''}}>MG</option>
                                <option value='PA' {{$cliente[0]->estado == 'PA' ? 'selected' : ''}}>PA</option>
                                <option value='PB' {{$cliente[0]->estado == 'PB' ? 'selected' : ''}}>PB</option>
                                <option value='PR' {{$cliente[0]->estado == 'PR' ? 'selected' : ''}}>PR</option>
                                <option value='PE' {{$cliente[0]->estado == 'PE' ? 'selected' : ''}}>PE</option>
                                <option value='PI' {{$cliente[0]->estado == 'PI' ? 'selected' : ''}}>PI</option>
                                <option value='RJ' {{$cliente[0]->estado == 'RJ' ? 'selected' : ''}}>RJ</option>
                                <option value='RN' {{$cliente[0]->estado == 'RN' ? 'selected' : ''}}>RN</option>
                                <option value='RS' {{$cliente[0]->estado == 'RS' ? 'selected' : ''}}>RS</option>
                                <option value='RO' {{$cliente[0]->estado == 'RO' ? 'selected' : ''}}>RO</option>
                                <option value='RR' {{$cliente[0]->estado == 'RR' ? 'selected' : ''}}>RR</option>
                                <option value='SC' {{$cliente[0]->estado == 'SC' ? 'selected' : ''}}>SC</option>
                                <option value='SP' {{$cliente[0]->estado == 'SP' ? 'selected' : ''}}>SP</option>
                                <option value='SE' {{$cliente[0]->estado == 'SE' ? 'selected' : ''}}>SE</option>
                                <option value='TO' {{$cliente[0]->estado == 'TO' ? 'selected' : ''}}>TO</option>
                                <option value='DF' {{$cliente[0]->estado == 'DF' ? 'selected' : ''}}>DF</option>

                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endisset
@endsection
@section('scripts')
@parent

@endsection