@extends('layout.master')

@section('titulo','Cliente')

@section('conteudo')

@push('js')
    <script>
        function excluirCliente(id) {
            bootbox.confirm("Deseja mesmo excluir esse cliente?", function(sim) {
                if (sim) {
                    //bootbox.alert("Deve excluir o cliente com ID: " + id);
                    axios.delete('/clientes/' + id)
                        .then(function (resposta) {
                            window.location.href = "/clientes";
                        })
                        .catch(function (erro) {
                            bootbox.alert("Ocorreu um erro: " + erro);
                        })
                }
            });
        }
    </script>
@endpush



<a class="btn btn-primary " href="/clientes/create">Cadastra Novo</a>

<br> <br>
@foreach($clientes as $c)

    Nome:{{$c->nome}} - Telefone:{{$c->telefone}}
    <a href="/clientes/edit/{{$c->id}}">  Editar</a>
    <a href="javascript:excluirCliente({{ $c->id }})">Excluir</a>
    <hr>

@endforeach

@endsection
