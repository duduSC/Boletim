<x-layouts.app>

    <body class="bg-gray-100 py-10">

        <div class="max-w-6xl mx-auto mt-12 px-6">
            <h1 class="flex text-4xl justify-center font-bold mb-8">Professores e Materias Associados</h1>
            <div class="mt-6 p-2 justify-end top-0 flex sticky">
                <a href="{{ route('professores_materias.create') }}"
                    class="bg-sky-300/80 hover:bg-sky-400/80 font-bold py-3 px-6 rounded-lg shadow-md hover:shadow-lg">
                    Associar Novo Professor a Nova Matéria
                </a>
            </div>
            <table class="w-full bg-sky-100/50 table-auto rounded-xl overflow-hidden shadow-sm border-collapse">
                <thead class="bg-sky-200/50">
                    <tr>
                        <th class="px-6 py-4 text-left text-lg font-semibold ">Professor:</th>
                        <th class="px-6 py-4 text-left text-lg font-semibold ">Materia:</th>
                        <th class="px-6 py-4 text-left text-lg font-semibold "></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($professores_materias as $professor_mat)
                    <tr class="border-t border-sky-200/6">
                        <td class="px-6 py-4 text-md ">{{$professor_mat->professor->nome}}</td>
                        <td class="px-6 py-4 text-md ">{{$professor_mat->materia->nome}}</td>
                        <td class="px-6 py-4 text-center">
                            <a href="{{ route('professores_materias.show',$professor_mat)}}">
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