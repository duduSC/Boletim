<x-layouts.app>

    <body class="  py-10">
        <div class="max-w-2xl mx-auto px-6">

            <div class="flex flex-row justify-between items-center mb-8">
                <h1 class="text-3xl font-bold order-1 text-left mt-0">
                    Detalhes do Matéria
                </h1>
                <a href="{{ url()->previous() }}"
                    class=" cursor-pointer inline-flex items-left">
                    <button class="cursor-pointer flex ">
                        <x-layouts.icons tipo="back" />
                    </button>
                </a>
            </div>

            <div class="bg-white shadow-xl rounded-2xl p-8">
                <div class="flex-grow">
                    <h2 class=" text-3xl font-bold text-gray-900 mb-2">{{ $materia->nome }}</h2>
                    <div class="space-y-1 text-md text-gray-600">
                        <div>
                            <span class="font-semibold">Carga Horária:</span> {{ $materia->carga_horaria }}
                        </div>

                        <div class="mt-4">
                            <span class="font-semibold">Descrição:</span>
                            <p class="text-justify">
                                {{ $materia->descricao }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-8 pt-6 border-t border-gray-200 -700">
                <div class="flex justify-end space-x-4 space-y-0">
                    <a href="{{ route('materias.edit', $materia) }}"
                        class=" w-auto inline-flex justify-center items-center px-5 py-2.5 border text-sm font-semibold rounded-lg shadow-sm bg-sky-600 hover:bg-sky-700 y-600">
                        <x-layouts.icons tipo="pencil" />
                    </a>

                    <form action="{{ route('materias.destroy', $materia->id) }}" method="post" class="w-auto">
                        @csrf
                        @method('DELETE')
                        <button type="button"
                            class="w-auto inline-flex justify-center cursor-pointer  items-center px-5 py-2.5 border rounded-lg shadow-sm bg-red-600 hover:bg-red-700 d-600 btn-excluir"
                            data-nome="{{ $materia->nome }}">
                            <flux:icon.trash />{{-- agora sei q é assim que usa os icon do HeroIcons --}}
                        </button>
                    </form>
                </div>
            </div>
        </div>

        </div>
    </body>
</x-layouts.app>