<x-app-layout>
    <title>Cadastro {{ $codigo }} - Gestão S7</title>
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Cadastro Completo
    </h2>

    @livewire('Pessoal.CadastroPessoas', ['codigo' => $codigo])

</x-app-layout>