<x-layouts.app>
    <h1>Editar Aluno</h1>

    <form action="{{ route("alunos.update",$aluno) }}" method="post">
        @csrf    
        @method("PUT")
        <input type="text" for="nome" name="nome" value="{{ $aluno->nome }}"><br>
        <input type="text" for="telefone" name="telefone" value="{{ $aluno->telefone }}"><br>
        <input type="text" for="email" name="email" value="{{ $aluno->email }}"><br>
        <button type="submit">Enviar</button>
        <a  style="color: red;" href="{{ route("alunos.show",$aluno) }}">Voltar</a>
    </form>
</x-layouts.app>