<x-layouts.app>

<body>
    <h1><a href="{{ route('alunos.create') }}">Cadastrar Aluno</a></h1>
    <table class="table">
        <thead>
            <tr>
                <th>Nome:</th>
                <th>Telefone:</th>
                <th>Email:</th>
                <th>Editar:</th>
                <th>Excluir:</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($alunos as $aluno)
                <td>{{ $aluno-> nome }}</td>
                <td>{{ $aluno->telefone }}</td>
                <td>{{ $aluno->email }}</td>
                <td><button class="btn btn-primary"><i class="bi bi-pencil"></i></button></td>
                <td><button class="btn btn-danger"><i class="bi bi-trash"></i></button></td>
                @endforeach
                <td></td>
            </tr>
        </tbody>
    </table>
</body>
</x-layouts.app>