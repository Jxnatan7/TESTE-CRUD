@extends("templates.template")

@section("content")

<div class="col-8 mt-4 m-auto mb-5 text-center">
    <h2 class="text-center mt-4 mb-4 text-light fs-5 fw-bold">Lista da quantidade de leite produzido e de ração necessária por semana:</h2>
    <table class="table table-hover text-light" style="background-color: #13795B;">
        <thead>
            <tr class="text-center">
                <th scope="col">Código do gado</th>
                <th scope="col">Leite produzido por semana</th>
                <th scope="col">Ração consumida por semana</th>
            </tr>
        </thead>
        <tbody>

            @foreach($todosbovinos as $bovino)
            @if($bovino->abatido == 0)
            <tr class="text-center table-light">
                <th scope="row">{{$bovino->codigo}}</th>
                <th scope="row">{{$bovino->leiteProduzido * 7}} litros</th>
                <th scope="row">{{$bovino->racaoConsumida * 7}}kg</th>
            </tr>
            @endif
            @endforeach

        </tbody>
    </table>
</div>

<div class="mt-5 mb-5">
    <h2 class="text-center mt-4 mb-4 text-light fs-5 fw-bold">Animais com até um ano e que consomem mais de 500kg de ração por semana:</h2>
    <div class="div-table col-8 m-auto mt-4">
        <table class="tabela table table-hover text-light" style="background-color: #13795B;">
            <thead>
                <tr class="text-center">
                    <th scope="col">Código</th>
                    <th scope="col">Peso</th>
                    <th scope="col">Qtd. Leite prod.</th>
                    <th scope="col">Qtd. Ração consu.</th>
                    <th scope="col">Data de nascimento</th>
                    <th scope="col">Idade</th>
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

                @if($idade->y <= 1 && ($bovino->racaoConsumida * 7) >=500)
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
                    </tr>
            </tbody>
            @endif
            @endforeach
        </table>
    </div>
</div>

<div class="mt-5">
    <h3 class="text-center mt-4 mb-4 text-light fs-5 fw-bold">Relatório de animais abatidos:</h3>
    <div class="div-table col-8 m-auto mt-4">
        @csrf
        <table class="tabela-abate table table-hover text-light" style="background-color: #13795B;">
            <thead>
                <tr class="text-center">
                    <th scope="col">Código</th>
                    <th scope="col">Peso</th>
                    <th scope="col">Qtd. Leite prod.</th>
                    <th scope="col">Qtd. Ração consu.</th>
                    <th scope="col">Data de nascimento</th>
                    <th scope="col">Idade</th>
                    <th scope="col">Data do abate</th>
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

                @if($bovino->abatido == 1)
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
                        {{date("d-m-Y", strtotime($bovino->updated_at))}}
                    </td>
                    <td>
                        <a href="{{url("gerenciando_bovinos/$bovino->id")}}" class="js-del">
                            <button class="btn btn-deletar btn-danger">Apagar</button>
                        </a>
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>

    </div>
</div>
<style>
    @media(max-width: 425px) {

        .div-table {
            margin-left: 0 !important;
        }

        .table {
            font-size: 10px !important;
            margin-top: 10px !important;
        }

        .tabela {
            margin-left: 30px !important;
        }

        .tabela-abate {
            margin-left: -15px !important;
        }

        .btn {
            width: 30px !important;
            height: 20px;
            font-size: 10px !important;
            padding: 0;
        }
    }
</style>
@endsection