<x-layouts.app>

    <body>
        <a href="{{ url()->previous() }}">
            <button class="cursor-pointer hover:text-sky-800">
                <x-layouts.icons tipo="back" />
            </button>
            </a>
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
                        placeholder="Português" required>

                    <label for="carga_horaria" class=" text-lg font-semibold mb-1">Carga Horária:</label>
                    <input type="carga_horaria" name="carga_horaria"
                        class="w-full px-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm
                        placeholder-gray-400"
                        placeholder="30" required>

                    <input
                        class="w-full bg-cyan-500/50 hover:bg-cyan-500 text-white font-bold py-3 px-4 rounded-lg shadow-md 
                           hover:shadow-lg cursor-pointer"
                        type="submit"
                        value="Enviar">
                </form>
            </div>
    </body>
</x-layouts.app>