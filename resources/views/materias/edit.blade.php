<x-layouts.app>

    <body class=" py-16">
        <div class="max-w-xl mx-auto px-6">

            <div class="text-center mb-10">
                <h1 class="text-3xl font-bold">Editar Materia</h1>
            </div>

            <form action="{{ route('materias.update', $materia) }}" method="post"
                class="bg-sky-300/30 p-8 rounded-xl shadow-2xl flex flex-col space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="nome" class=" text-sm font-semibold mb-1.5">Nome:</label>
                    <input type="text" id="nome" name="nome" value="{{ old('nome', $materia->nome) }}"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg shadow-sm bg-slate-50/70"
                        placeholder="{{ $materia->nome }}" required>
                </div>


                <div>
                    <label for="carga_horaria" class="block text-sm font-semibold text-gray-70 mb-1.5">Carga Horária:</label>
                    <input type="carga_horaria" id="carga_horaria" name="carga_horaria" value="{{ old('carga_horaria', $materia->carga_horaria) }}" 
                        class="w-full px-4 py-2.5 border border-gray-300 bg-slate-50/70 rounded-lg shadow-sm"
                        placeholder="{{ $materia->carga_horaria }}" required>
                </div>
                 <div>
                    <label for="descricao" class="block text-sm font-semibold text-gray-70 mb-1.5">Descrição:</label>
                    <input type="descricao" id="descricao" name="descricao" value="{{ old('descricao', $materia->descricao) }}"
                        class="w-full px-4 py-2.5 border border-gray-300 bg-slate-50/70 rounded-lg shadow-sm"
                        placeholder="{{ $materia->descricao }}" required>
                </div>

                <div class="pt-5 flex flex-row-reverse justify-start space-x-4 space-x-reverse space-y-0">
                    <a href="{{ route('materias.show', $materia) }}"
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