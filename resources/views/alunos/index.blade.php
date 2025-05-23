<x-layouts.app>

<body>
    <h1><a href="{{ route('alunos.create') }}">Cadastrar Aluno</a></h1><br>
    <table>
        <thead>
            <tr>
                <th>Nome:</th>
                <th>Telefone:</th>
                <th>Email:</th>
                <th>Ver mais:</th>
                <th>Editar:</th>
                <th>Excluir:</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alunos as $aluno)
            <tr>
                <td>{{$aluno->nome}}</td>
                <td>{{$aluno->telefone}}</td>
                <td>{{$aluno->email}}</td>
                <td>
                    <a style="background-color: green;" href="{{ route('alunos.show',$aluno)}}">Ver mais + </a>  
                </td>   
                <td>
                    <button style="background-color: yellow;">Editar </button>
                </td>
                
                    <td>
                        <form action="{{ route("alunos.destroy",$aluno->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                        <button style="background-color: red;">Excluir</button>
                        </form>
                    </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</x-layouts.app>