<x-layouts.app>
    <body class="   py-10">
        <div class="max-w-2xl mx-auto px-6">

            <div class="flex flex-row justify-between items-center mb-8">
                <h1 class="text-3xl font-bold order-2 text-left mt-0"> 
                    Detalhes do Aluno
                </h1>
                <a href="{{ url()->previous() }}" 
                   class="order-1 inline-flex items-left"> 
                    <button class="cursor-pointer flex rounded-md ">
                        <x-layouts.icons tipo="back"/>
                    </button>
                </a>
            </div>

            <div class="bg-white shadow-xl rounded-2xl p-8">
                <div class="flex flex-row items-center text-left">
                    {{-- Vamos por fotinho 
                    div class="flex-shrink-0 mb-6 sm:mb-0 sm:mr-8">
                        <div class="h-28 w-28 sm:h-32 sm:w-32 bg-sky-100 dark:bg-sky-700 rounded-full flex items-center justify-center text-sky-600 dark:text-sky-300 text-5xl sm:text-6xl font-bold">
                        </div> --}}
                    </div>
                    <div class="flex-grow">
                        <h2 class=" text-3xl font-bold text-gray-900 mb-2">{{ $aluno->nome }}</h2>
                        <div class="space-y-1 text-md text-gray-600 00">
                            <p>
                                <span class="font-semibold">Telefone:</span> {{ $aluno->telefone   }}
                            </p>
                            <p>
                                <span class="font-semibold">Email:</span> {{ $aluno->email }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="mt-8 pt-6 border-t border-gray-200 -700">
                    <div class="flex justify-end space-x-4 space-y-0">
                        <a href="{{ route('alunos.edit', $aluno) }}" 
                           class=" w-auto inline-flex justify-center items-center px-5 py-2.5 border text-sm font-semibold rounded-lg shadow-sm bg-sky-600 hover:bg-sky-700 y-600">
                            <x-layouts.icons tipo="pencil"/>
                        </a>
                        
                        <form action="{{ route('alunos.destroy', $aluno->id) }}" method="post" class="w-auto">
                            @csrf
                            @method('DELETE')
                            <button type="button"
                                    class="w-auto inline-flex justify-center cursor-pointer  items-center px-5 py-2.5 border rounded-lg shadow-sm bg-red-600 hover:bg-red-700 d-600 btn-excluir"
                                    data-nome="{{ $aluno->nome }}"
                                    >
                                <flux:icon.trash/>{{-- agora sei q é assim que usa os icon do HeroIcons --}}
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </body>
</x-layouts.app>