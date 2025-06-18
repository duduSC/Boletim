<x-layouts.app>

    <body class="bg-gray-100 py-10">

        <div class="max-w-2xl mx-auto px-6">

            {{-- CABEÇALHO COM TÍTULO E BOTÃO VOLTAR --}}
            <div class="flex flex-row justify-between items-center mb-8">
                <h1 class="text-3xl font-bold order-2 text-left mt-0"> 
                    Detalhes do professor
                </h1>
                <a href="{{ url()->previous() }}" 
                   class="order-1 inline-flex items-left"> 
                    <button class="cursor-pointer flex rounded-md ">
                        <x-layouts.icons tipo="back"/>
                    </button>
                </a>
            </div>

            {{-- CARD DE INFORMAÇÕES --}}
            {{-- A estilização com bg-white, shadow-xl e rounded-2xl cria um card elegante e destacado --}}
            <div class="bg-white shadow-xl rounded-2xl p-8">
                <div class="space-y-4">
                    {{-- Detalhes do Professor --}}
                    <div>
                        <h2 class="text-lg font-semibold text-gray-500 mb-1">Professor:</h2>
                        <p class="text-2xl font-bold text-gray-900">{{ $professores_materia->professor->nome }}</p>
                    </div>

                    {{-- Detalhes da Matéria --}}
                    <div>
                        <h2 class="text-lg font-semibold text-gray-500 mb-1">Matéria:</h2>
                        <p class="text-2xl font-bold text-gray-900">{{ $professores_materia->materia->nome }}</p>
                    </div>
                </div>
            </div>

            {{-- BOTÕES DE AÇÃO (EDITAR E EXCLUIR) --}}
            <div class="mt-8 pt-6 border-t border-gray-200">
                <div class="flex justify-end space-x-4">
                    
                        <a href="{{ route('professores_materias.edit', $professores_materia) }}"
                       class="w-auto inline-flex justify-center items-center px-5 py-2.5 border text-sm font-semibold rounded-lg shadow-sm text-white bg-sky-600 hover:bg-sky-700">
                        <x-layouts.icons tipo="pencil" />
                        <span class="ml-2">Editar</span>
                    </a>

                    <form action="{{ route('professores_materias.destroy', $professores_materia->id) }}" method="post" class="w-auto">
                        @csrf
                        @method('DELETE')
                        
                        <button type="button"
                                class="w-auto inline-flex justify-center cursor-pointer items-center px-5 py-2.5 border rounded-lg shadow-sm text-white bg-red-600 hover:bg-red-700 btn-excluir"
                                {{-- O atributo data-nome é útil para exibir uma mensagem de confirmação dinâmica com JavaScript --}}
                                data-nome="a associação entre {{ $professores_materia->professor->nome }} e {{ $professores_materia->materia->nome }}">
                            <x-layouts.icons tipo="trash" />
                            <span class="ml-2">Desassociar</span>
                        </button>
                    </form>

                </div>
            </div>

        </div>

    </body>
</x-layouts.app>