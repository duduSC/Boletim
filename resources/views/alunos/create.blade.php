<x-layouts.app>
    <body>
        <div class='container'>
            <h1>Cadastrar novo aluno</h1>
            <br>
            <form action="{{ route( 'alunos.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome">
                </div>
                <div class="form-group">
                    <label for="telefone">Telefone:</label>
                    <input type="text" name="telefone">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" name="email">
                </div>
                <input class="button" type="submit" value="Enviar"></input>
            </form>
        </div>
    </body>
    <style>
        input.button{
            background-color: blue;
        }
    </style>
</x-layouts.app>
    
