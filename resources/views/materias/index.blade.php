<x-layouts.app>
    <body class="bg-gray-100 py-10">

        <div class="max-w-6xl mx-auto mt-12 px-6"> 
            <h1 class="flex text-4xl justify-center font-bold mb-8">Materias Cadastradas</h1>
            <div class="mt-6 flex justify-end top-0 sticky">
                <a href="{{ route('materias.create') }}"
                   class="bg-sky-300/80 hover:bg-sky-400/80 font-bold py-3 px-6 rounded-lg shadow-md hover:shadow-lg">
                    Cadastrar Nova materia
                </a>
            </div>
            <table class="w-full bg-sky-100/50 table-auto rounded-xl overflow-hidden shadow-sm border-collapse">
                <thead class="bg-sky-200/50">
                    <tr>
                        <th class="px-6 py-4 text-left text-lg font-semibold ">Nome:</th>
                        <th class="px-6 py-4 text-left text-lg font-semibold ">Carga Horária:</th>
                        <th class="px-6 py-4 text-left text-lg font-semibold "></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($materias as $materia)
                    <tr class="border-t border-sky-200/6">

                        <td class="px-6 py-4 text-md ">{{$materia->nome}}</td>
                        <td class="px-10 py-4 text-md ">{{$materia->carga_horaria}}</td>
                        <td class="px-6 py-4 text-center">
                            <a href="{{ route('materias.show',$materia)}}">
                                <button class="p-1 text-sky-600 hover:text-sky-800 cursor-pointer">
                                    <x-layouts.icons tipo="more" />
                                </button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </body>
</x-layouts.app>