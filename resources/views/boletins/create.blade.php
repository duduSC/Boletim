<x-layouts.app>
    <body class="bg-gray-50 py-10">
        <div class="max-w-2xl mx-auto px-4">
            <div class="flex items-center mb-5">
                <a href="{{ url()->previous() }}" class="text-gray-600 hover:text-sky-800 transition-colors">
                    <button class="cursor-pointer flex items-center">
                        <x-layouts.icons tipo="back" />
                        <span class="ml-2 font-semibold">Voltar</span>
                    </button>
                </a>
            </div>

            <h1 class="text-3xl font-bold text-center mb-8 text-gray-800">Cadastrar Novo Boletim</h1>

            <form
                class="bg-sky-100 p-8 rounded-xl shadow-2xl flex flex-col space-y-6"
                action="{{ route('boletins.store') }}"
                method="post">
                @csrf

                <div>
                    <label for="aluno_id" class="block text-lg font-semibold mb-2 text-gray-700">Nome do Aluno:</label>
                    <select name="aluno_id" id="aluno_id" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg shadow-sm " required>
                        <option class="cursor-pointer" value="" disabled selected>Selecione um aluno</option>
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
                        <option value="" disabled selected>Selecione um professor</option>
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
                        <option value="" disabled selected>Selecione uma matéria</option>
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
                           placeholder="Ex: 2025.1" required>
                    @error('semestre')
                        <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="nota" class="block text-lg font-semibold mb-2 text-gray-700">Nota:</label>
                    <input type="number" step="0.01" name="nota" id="nota"
                           class="w-full px-4 py-2.5 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:ring-cyan-500 focus:border-cyan-500"
                           placeholder="Ex: 8.5" required>
                    @error('nota')
                        <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <input
                    id="enviar"
                    class="w-full bg-cyan-500/80 hover:bg-cyan-500 text-white font-bold py-3 px-4 rounded-lg shadow-md cursor-pointer mt-4"
                    type="submit"
                    value="Cadastrar Boletim">
            </form>
        </div>
    </body>
</x-layouts.app>
