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
            <h1 class="text-3xl font-bold text-center mb-5">Associar um Professor a uma Matéria</h1>

            <form
                class="bg-sky-100 p-6 rounded-xl shadow-2xl flex flex-col space-y-5"
                action="{{ route('professores_materias.store') }}"
                method="post">
                @csrf

                <label for="professor_id" class=" text-lg font-semibold mb-1">CPF-Nome do Professor:</label>
                <select type="text" name="professor_id"
                    class="w-full px-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm 
                            placeholder-gray-400"
                    required>
                    <option value="" disabled selected>Selecione:</option>
                    @foreach($professores as $professor )
                    <option value="{{ $professor->id}}">{{ $professor->cpf }}-{{ $professor->nome }}</option>
                    @endforeach
                </select>

                @error('professor_id')
                <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                @enderror

                <label for="materia_id" class=" text-lg font-semibold mb-1">Código da Matéria:</label>
                <select type="text" name="materia_id"
                    class="w-full px-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm 
                        placeholder-gray-400"
                    required>

                    <option value="" disabled selected>Selecione:</option>
                    @foreach($materias as $materia )
                    <option value="{{ $materia->id}}">{{ $materia->id }}-{{ $materia->nome }}</option>
                    @endforeach
                </select>
                @error('materia_id')
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