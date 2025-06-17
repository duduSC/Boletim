<x-layouts.app>

    <body class=" py-16">
        <div class="max-w-xl mx-auto px-6">

            <div class="text-center mb-10">
                <h1 class="text-3xl font-bold">Editar Aluno</h1>
            </div>

            <form action="{{ route('alunos.update', $aluno) }}" method="post"
                class="bg-sky-300/30 p-8 rounded-xl shadow-2xl flex flex-col space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="nome" class=" text-sm font-semibold mb-1.5">Nome Completo:</label>
                    <input type="text" id="nome" name="nome" value="{{ old('nome', $aluno->nome) }}"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg shadow-sm bg-slate-50/70"
                        placeholder="Nome completo do aluno" required>
                </div>
                @error("nome")
                <span>{{ $message }}</span>
                @enderror
                <div>
                    <label for="telefone" class="block text-sm font-semibold mb-1.5">Telefone:</label>
                    <input type="text" id="telefone" name="telefone" value="{{ old('telefone', $aluno->telefone) }}"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg shadow-sm bg-slate-50/70"
                        placeholder="{{$aluno->telefone}}">
                </div>
                @error("telefone")
                <span>{{ $message }}</span>
                @enderror
                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-70 mb-1.5">Email:</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $aluno->email) }}" {{-- Tipo mudado para 'email' --}}
                        class="w-full px-4 py-2.5 border border-gray-300 bg-slate-50/70 rounded-lg shadow-sm"
                        placeholder="{{ $aluno->email }}" required>
                </div>
                @error("email")
                <span>{{ $message }}</span>
                @enderror
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