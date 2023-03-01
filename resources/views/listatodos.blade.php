@extends("templates.template")

@section("content")
@if(session("msgCadastro"))
    <p class="msgCadastro text-center text-success fw-bold">{{ session("msgCadastro") }}</p>
@elseif(session("msgDelete"))
    <p class="msgDelete text-center text-danger fw-bold">{{ session("msgDelete") }}</p>
@elseif(session("msgUpdate"))
<p class="msgUpdate text-center text-dark fw-bold">{{ session("msgUpdate") }}</p>
@endif

<h1 class="col-8 mt-4 m-auto text-light text-center">Lista de todos os bovinos</h1>
<div class="div-table col-8 m-auto mt-4">
    @csrf
    <table class="tabela table table-hover text-light" style="background-color: #13795B;">
        <thead>
            <tr class="text-center">
                <th scope="col">Código</th>
                <th scope="col">Peso</th>
                <th scope="col">Qtd. Leite prod.</th>
                <th scope="col">Qtd. Ração consu.</th>
                <th scope="col">Data de nascimento</th>
                <th scope="col">Idade</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @php
            $diaAtual = new DateTime(date("Y-m-d"));
            @endphp

            @foreach($todosbovinos as $bovino)

            @php
            $dataInicial = $bovino->data_nasc;
            $dataInicial = new DateTime($dataInicial);
            $idade = $dataInicial->diff($diaAtual);
            $meses = $idade->m
            @endphp
            @if($bovino->abatido < 1)
            <tr class="text-center table-light">
                <th scope="row">{{$bovino->codigo}}</th>
                <td>{{$bovino->peso}}kg</td>
                <td>{{$bovino->leiteProduzido}} Litros</td>
                <td>{{$bovino->racaoConsumida}}kg</td>
                <td>{{date("d-m-Y", strtotime($bovino->data_nasc))}}</td>
                <td>
                    {{$idade->y}} 
                    @if($idade->y >= 2) anos @else ano @endif
                    e {{$meses}}
                    @if($idade->m >= 2) meses @else mes @endif
                </td>
                <td>
                    <a href="{{url("gerenciando_bovinos/$bovino->id/edit")}}">
                        <button class="btn-editar btn btn-dark">Editar</button>
                    </a>
                    <a href="{{url("gerenciando_bovinos/$bovino->id")}}" class="js-del">
                        <button class="btn-deletar btn btn-danger">Deletar</button>
                    </a>
                </td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
    {{$todosbovinos->links("pagination::bootstrap-4")}}
</div>
<style>
    .msgCadastro {
        background-color: #D4EDDA;
        border: 2px solid #13795B;
    }

    .msgDelete {
        background-color: #FFC0C0;
        border: 2px solid #13795B;
    }

    .msgUpdate {
        background-color: #D9C885;
        border: 2px solid #13795B;
    }

    @media(max-width: 425px) {

        .div-table {
            margin-left: 0 !important;
        }

        .table {
            font-size: 10px !important;
            margin-top: 10px !important;
        }

        .btn {
            font-size: 10px !important;
            width: 50px !important;
            height: 20px !important;
            margin-bottom: 10px !important;
            padding: 0;
        }
    }
</style>
@endsection