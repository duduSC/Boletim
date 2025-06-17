<x-layouts.app>

    <body class=" py-16">
        <div class="max-w-xl mx-auto px-6">

            <div class="text-center mb-10">
                <h1 class="text-3xl font-bold">Editar Boletim</h1>
            </div>

            <form action="{{ route('boletins.update', $boletim) }}" method="post"
                class="bg-sky-300/30 p-8 rounded-xl shadow-2xl flex flex-col space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="aluno_id" class="block text-lg font-semibold mb-2 text-gray-700">Nome do Aluno:</label>
                    <select name="aluno_id" id="aluno_id" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg shadow-sm " required>
                        <option class="cursor-pointer" value="{{ $boletim->aluno_id }}" selected>{{$boletim->aluno->nome}}</option>
                        @foreach($alunos as $aluno)
                            <option class="cursor-pointer" value="{{ $aluno->id }}">{{ $aluno->nome }}</option>
                        @endforeach
                    </select>
                    @error('aluno_id')
                        <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="professor_id" class="block text-lg font-semibold mb-2 text-gray-700">Nome do Professor:</label>
                    <select name="professor_id" id="professor_id" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg shadow-sm focus:ring-cyan-500 focus:border-cyan-500" required>
                        <option value="{{ $boletim->professor_id }}" selected>{{ $boletim->professor->nome }}</option>
                        @foreach($professores as $professor)
                            <option value="{{ $professor->id }}">{{ $professor->nome }}</option>
                        @endforeach
                    </select>
                    @error('professor_id')
                        <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="materia_id" class="block text-lg font-semibold mb-2 text-gray-700">Nome da Matéria:</label>
                    <select name="materia_id" id="materia_id" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg shadow-sm focus:ring-cyan-500 focus:border-cyan-500" required>
                        <option value="{{ $boletim->materia_id }}"  selected>{{ $boletim->materia->nome }}</option>
                        @foreach($materias as $materia)
                            <option value="{{ $materia->id }}">{{ $materia->nome }}</option>
                        @endforeach
                    </select>
                    @error('materia_id')
                        <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>
                
                <div>
                    <label for="semestre" class="block text-lg font-semibold mb-2 text-gray-700">Semestre:</label>
                    <input type="text" name="semestre" id="semestre"
                           class="w-full px-4 py-2.5 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:ring-cyan-500 focus:border-cyan-500"
                           value="{{ $boletim->semestre }}" required>
                    @error('semestre')
                        <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="nota" class="block text-lg font-semibold mb-2 text-gray-700">Nota:</label>
                    <input type="number" step="0.01" name="nota" id="nota"
                           class="w-full px-4 py-2.5 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:ring-cyan-500 focus:border-cyan-500"
                           value="{{$boletim->nota}}" required>
                    @error('nota')
                        <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="pt-5 flex flex-row-reverse justify-start space-x-4 space-x-reverse space-y-0">
                    <a href="{{ route('alunos.show', $aluno) }}"
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