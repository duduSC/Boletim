<x-layouts.app>
    <h1>{{ $aluno->nome }}</h1>
        <p>{{ $aluno->telefone }}</p>
        <p>{{ $aluno->email }}</p>
    <br>
    <h1>
        <a href="{{ route('alunos.create') }}">Cadastrar Aluno</a>
    </h1>
    <h1>
        <a style="background-color: yellow;" href="{{ route('alunos.edit',$aluno)}}">Editar </a>  
    </h1>
    <br>
    <h1>
        <a href="{{ url()->previous() }}">Voltar</a>
    </h1>
</x-layouts.app>