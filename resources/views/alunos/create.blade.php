<x-layouts.app>

    <body>
                   <div class="flex items-center mb-5">
                <a href="{{ url()->previous() }}" class="text-gray-600 hover:text-sky-800 transition-colors">
                    <button class="cursor-pointer flex items-center">
                        <x-layouts.icons tipo="back" />
                        <span class="ml-2 font-semibold">Voltar</span>
                    </button>
                </a>
            </div>
        <div class=" mx-auto px-4">
            <h1 class="text-3xl font-bold text-center mb-5">Cadastrar Novo Aluno</h1>

            <form
                enctype="multipart/form-data"
                class="bg-sky-100 p-6 rounded-xl shadow-2xl flex flex-col space-y-5"
                action="{{ route('alunos.store') }}"
                method="post">
                @csrf

                <label for="nome" class=" text-lg font-semibold mb-1">Nome:</label>
                <input type="text" name="nome"
                    class="w-full px-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm 
                        placeholder-gray-400"
                    placeholder="Nome completo" required>
                @error('nome')
                <span>{{ $message }}</span>
                @enderror

                <label for="telefone" class=" text-lg font-semibold mb-1">Telefone:</label>
                <input type="text" name="telefone"
                    class="w-full px-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm 
                         placeholder-gray-400"
                    placeholder="(XX) 9XXXX-XXXX">
                @error('telefone')
                <span>{{ $message }}</span>
                @enderror
                <label for="email" class=" text-lg font-semibold mb-1">Email:</label>
                <input type="email" name="email"
                    class="w-full px-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm
                        placeholder-gray-400"
                    placeholder="email@exemplo.com">
                @error('email')
                <span>{{ $message }}</span>
                @enderror

                <div>
                    <label for="image" class="text-lg font-semibold mb-1 block">Imagem (Opcional):</label>

                    <input type="file" name="image" id="image" class="hidden">

                    <label for="image"
                        class="cursor-pointer inline-block px-5 py-2.5 bg-cyan-300/50 hover:bg-cyan-300 rounded-lg shadow-sm ">
                        <span>Escolher arquivo</span>
                    </label>
                    @error('email')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
                <input
                    id="enviar"
                    class="w-full bg-cyan-500/50 hover:bg-cyan-500 text-white font-bold py-3 px-4 rounded-lg shadow-md 
                           hover:shadow-lg cursor-pointer"
                    type="submit"
                    value="Enviar">
            </form>
        </div>
    </body>
</x-layouts.app>