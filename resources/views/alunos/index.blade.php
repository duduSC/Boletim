<x-layouts.app>
<x-layouts.tailwind/>
        <body>
        <h1><a href="{{ route('alunos.create') }}">Cadastrar Aluno</a></h1><br>
        <table class="w-full table-auto border-separate border-4 rounded-sm border-blue-400 bg-blue-600">
            <thead>
                <tr class="">
                    <th class="">Nome:</th>
                    <th>Telefone:</th>
                    <th>Email:</th>
                    <th>Ver mais:</th>
                    <th>Excluir:</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alunos as $aluno)
                <tr class="text-center">
                    <td>{{$aluno->nome}}</td>
                    <td>{{$aluno->telefone}}</td>
                    <td>{{$aluno->email}}</td>
                    <td>
                        <a style="background-color: green;" href="{{ route('alunos.show',$aluno)}}">Ver mais + </a>  
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