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

<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Telefone</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($clientes as $c)
        <tr>
            <td>{{ $c->id }}</td>
            <td>{{ $c->nome }}</td>
            <td>{{ $c->telefone }}</td>
            <td>
                <a class="btn btn-primary" href="/clientes/edit/{{$c->id}}">Editar</a>
                <a class="btn btn-danger" href="javascript:excluirCliente({{ $c->id }})">Excluir</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
