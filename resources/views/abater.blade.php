@extends("templates.template")

@section("content")
<p class="text-center text-light mt-4 mb-4 fs-5">Condições para abate: </p>

<div class="condicao">
    <ul class="text-light mt-4 mb-4">
        <li>5 anos de idade ou mais</li>
        <li>Produz menos de 70 litros de leite por semana e come mais de 50kg de ração por dia</li>
        <li>Produz menos de 40 litros de leite por semana</li>
        <li>Pesa mais que 18 arrobas</li>
    </ul>
</div>


<h1 class="col-8 mt-4 m-auto text-light text-center">Lista de todos os bovinos disponíveis para abate:</h1>
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
                <th scope="col">Abater</th>
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

            @if($bovino->abatido < 1 && $idade->y >= 5 || $bovino->abatido < 1 && $bovino->racaoConsumida >= 50 && $bovino->leiteProduzido * 7 <= 70 || $bovino->abatido < 1 && $bovino->leiteProduzido * 7 <= 40 || $bovino->abatido < 1 && ($bovino->peso / 15) >= 18)
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
                                <button class="btn btn-danger">Abater</button>
                            </a>
                        </td>
                    </tr>
                    @endif
                    @endforeach
        </tbody>
    </table>
</div>
<style>

    .condicao {
        display: flex;
            justify-content: center;
        }
    
    @media(max-width: 425px) {
        .div-table {
            margin-left: 0 !important;
        }

        .table {
            font-size: 10px !important;
            margin-top: 10px !important;
        }

        .tabela {
            margin-left: -10px !important;
        }

        .btn-select {
            width: 50px;
            height: 30px;

        }

        .div-select {
            font-size: 10px !important;
        }

        h1 {
            font-size: 20px;

        }
    }
</style>
@endsection