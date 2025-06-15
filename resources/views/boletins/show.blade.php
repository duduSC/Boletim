<x-layouts.app>
    <body class="bg-gray-50 py-10">
        <div class="max-w-2xl mx-auto px-4">
            
            <div class="flex items-center justify-between mb-8">
                <a href="{{ route('boletins.index') }}" class="text-gray-600 hover:text-sky-800 transition-colors">
                    <button class="cursor-pointer flex items-center">
                        <x-layouts.icons tipo="back" />
                        <span class="ml-2 font-semibold">Voltar para a Lista</span>
                    </button>
                </a>
            </div>

            <h1 class="text-3xl font-bold text-center mb-8 text-gray-800">Detalhes do Boletim</h1>

            <div class="bg-white p-8 rounded-xl shadow-lg space-y-6">
                
                <div>
                    <p class="text-sm font-medium text-gray-500">Aluno</p>
                    <p class="mt-1 text-2xl font-semibold text-gray-900">{{ $boletim->aluno->nome }}</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6 border-t border-gray-200 pt-6">
                    <div>
                        <p class="text-sm font-medium text-gray-500">Matéria</p>
                        <p class="mt-1 text-lg text-gray-900">{{ $boletim->materia->nome }}</p>
                    </div>

                    <div>
                        <p class="text-sm font-medium text-gray-500">Professor</p>
                        <p class="mt-1 text-lg text-gray-900">{{ $boletim->professor->nome }}</p>
                    </div>

                    <div>
                        <p class="text-sm font-medium text-gray-500">Semestre</p>
                        <p class="mt-1 text-lg text-gray-900">{{ $boletim->semestre }}</p>
                    </div>

                    <div>
                        <p class="text-sm font-medium text-gray-500">Nota Final</p>
                        <p class="mt-1 text-lg font-bold text-sky-600">{{ number_format($boletim->nota, 2, ',', '.') }}</p>
                    </div>
                </div>
            </div>

            <div class="mt-8 pt-6 border-t border-gray-200">
                <div class="flex justify-end items-center space-x-4">
                    <a href="{{ route('boletins.edit', $boletim) }}"
                       class="inline-flex items-center justify-center px-5 py-2.5 bg-sky-600 text-white font-semibold rounded-lg shadow-sm hover:bg-sky-700 transition-colors duration-300">
                        <x-layouts.icons tipo="pencil" />
                        <span class="ml-2">Editar</span>
                    </a>

                    <form action="{{ route('boletins.destroy', $boletim) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button"
                                class="inline-flex items-center justify-center px-5 py-2.5 bg-red-600 text-white font-semibold rounded-lg shadow-sm hover:bg-red-700 transition-colors duration-300 btn-excluir"
                                data-nome="o lançamento de nota para {{ $boletim->aluno->nome }} em {{ $boletim->materia->nome }}">
                            <x-layouts.icons tipo="trash" />
                            <span class="ml-2">Excluir</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</x-layouts.app>
