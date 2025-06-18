<x-layouts.app>

    <body class=" py-16">
        <div class="max-w-xl mx-auto px-6">

            <div class="text-center mb-10">
                <h1 class="text-3xl font-bold">Editar Professor</h1>
            </div>

            <form action="{{ route('professores_materias.update', $professores_materia) }}" method="post"
                class="bg-sky-300/30 p-8 rounded-xl shadow-2xl flex flex-col space-y-6">
                @csrf
                @method('PUT')

                <label for="professor_id" class=" text-lg font-semibold mb-1">CPF-Nome do Professor:</label>
                <select type="text" name="professor_id"
                    class="w-full px-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm 
                            placeholder-gray-400"
                    required>
                    <option value="{{ $professores_materia->professor_id }}" selected>{{ $professores_materia->professor->cpf }}-{{$professores_materia->professor->nome}}</option>

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

                    <option value="{{ $professores_materia->materia_id }}" selected>{{ $professores_materia->materia->id }}-{{ $professores_materia->materia->nome }}</option>
                    @foreach($materias as $materia )
                    <option value="{{ $materia->id}}">{{ $materia->id }}-- {{ $materia->nome }}</option>
                    @endforeach
                </select>

                    @error('nome')
                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                    @enderror

                <div class="pt-5 flex flex-row-reverse justify-start space-x-4 space-x-reverse space-y-0">
                    <a href="{{ route('professores_materias.show', $professor) }}"
                        class="w-full sm:w-auto inline-flex justify-center items-center px-6 py-3 border rounded-lg shadow-md border-gray-300 bg-red-600 hover:bg-red-700">
                        Cancelar </a>

                    <button type="submit"
                        class="w-auto cursor-pointer inline-flex justify-center items-center px-6 py-3 border border-transparent rounded-lg shadow-md bg-sky-600 hover:bg-sky-700">
                        Salvar
                    </button>

                </div>
            </form>
        </div>
    </body>
</x-layouts.app>