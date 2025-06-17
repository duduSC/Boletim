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
            <h1 class="text-3xl font-bold text-center mb-5">Cadastrar Nova Materia</h1>

            <form
                class="bg-sky-100 p-6 rounded-xl shadow-2xl flex flex-col space-y-5"
                action="{{ route('materias.store') }}"
                method="post">
                @csrf

                <label for="nome" class=" text-lg font-semibold mb-1">Nome:</label>
                <input type="text" name="nome"
                    class="w-full px-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm 
                        placeholder-gray-400"
                    placeholder="Nome da Matéria" required>
                @error('nome')
                <span class="text-red-600 text-sm mt-1">{{ $message }}</span>

                @enderror
                <label for="carga_horaria" class=" text-lg font-semibold mb-1">Carga Horária:</label>
                <input type="number" name="carga_horaria"
                    class="w-full px-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm
                        placeholder-gray-400"
                    placeholder="30" required>
                @error('carga_horaria')
                <span class="text-red-600 text-sm mt-1">{{ $message }}</span>

                @enderror
                <label for="descricao" class=" text-lg font-semibold mb-1">Descricao:</label>
                <input type="text" name="descricao"
                    class="w-full px-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm
                        placeholder-gray-400"
                    placeholder="">
                @error('descricao')
                <span class="text-red-600 text-sm mt-1">{{ $message }}</span>

                @enderror
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