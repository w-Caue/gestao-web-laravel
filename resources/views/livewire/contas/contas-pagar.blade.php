<div>

    <div class="m-7">
        <div>
            <button wire:click.prevent="novoDocumento()"
                class="p-2 border rounded-lg shadow-lg font-semibold bg-white hover:text-white hover:bg-blue-500">
                Novo Documento
            </button>
        </div>
    </div>

    <div class="mx-7 relative overflow-x-auto shadow-md rounded-lg">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs font-semibold text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 ">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Empresa
                    </th>

                    <th scope="col" class="px-6 py-3 text-center">
                        Forma de Pagamento
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">

                    </th>

                </tr>
            </thead>
            <tbody>
                <tr class="bg-white border-b hover:bg-gray-50">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    </th>
                    <td class="px-6 py-4 text-center font-semibold">
                    </td>
                    <td class="px-6 py-4 text-center font-semibold">
                    </td>
                    <td class="px-6 py-4 text-center">

                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    @if ($showDocumento)
        <div class="flex justify-center">
            <div class="fixed top-11 bg-gray-50 border shadow-2xl rounded-lg sm:top-28 sm:w-1/2">

                <div class="flex justify-between items-center m-2">
                    <h1 class="text-xl font-semibold text-gray-800">Contas a Pagar</h1>

                    <button wire:click="fecharDocumento()"
                        class="p-1 m-1 border rounded float-right hover:text-white hover:bg-red-500">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>

                <form wire:submit.prevent="criarDocumento()" class="m-3">
                    <div class="flex gap-3 mb-2">
                        <div class="">
                            <label for="" class="flex flex-col">
                                <span class="font-semibold text-gray-700">Empresa</span>
                                <button wire:click.prevent="visualizarClientes()" wire:model="form.clienteEmpresa"
                                    class="p-2 border rounded text-md font-semibold shadow-xl bg-white hover:text-white hover:bg-blue-500">{{ $clienteDocumento->nome ?? 'Pesquisa' }}</button>
                            </label>
                        </div>

                        <div class="">
                            <label for="decricao" class="flex flex-col">
                                <span class="font-semibold text-gray-700">Descrição</span>
                                <input wire:model="form.descricao"
                                    class="p-2 w-80 border-gray-200 rounded text-md font-semibold text-gray-600 shadow-xl bg-white">
                            </label>
                        </div>

                        <div class="">
                            <label for="data" class="flex flex-col">
                                <span class="font-semibold text-gray-700">Dt. Lançamento</span>
                                <input type="date" wire:model.lazy="form.dtLancamento"
                                    class="p-2 border-gray-200 rounded text-md font-semibold shadow-xl text-gray-600 bg-white">
                            </label>
                        </div>
                    </div>
                    <div class="flex gap-3">
                        <div class="">
                            <label for="data" class="flex flex-col">
                                <span class="font-semibold text-gray-700">Ag. Cobrador</span>
                                <select type="date" wire:model="form.agCobrador"
                                    class="p-2 w-44 border-gray-200 rounded text-md font-semibold shadow-xl text-gray-600 bg-white">

                                    <option value=""></option>

                                    @foreach ($agenteCobradores as $agenteCobrador)
                                        <option class="font-semibold text-gray-700" value="{{ $agenteCobrador->id }}">
                                            {{ $agenteCobrador->nome }}</option>
                                    @endforeach
                                </select>
                            </label>
                        </div>

                        <div class="">
                            <label for="data" class="flex flex-col">
                                <span class="font-semibold text-gray-700">Dt. Vencimento</span>
                                <input type="date" wire:model.lazy="form.dtVencimento"
                                    class="p-2 w-40 border-gray-200 rounded text-md font-semibold shadow-xl text-gray-600 bg-white">
                            </label>
                        </div>

                        <div class="">
                            <label for="decricao" class="flex flex-col">
                                <span class="font-semibold text-gray-700">Vl. Documento</span>
                                <input wire:model.lazy="form.vlDocumento"
                                    class="p-2 w-28 border-gray-200 rounded text-md font-semibold text-gray-600 shadow-xl bg-white">
                            </label>
                        </div>
                    </div>

                    <div class="flex justify-center m-5">
                        <button type="submit"
                            class="p-2 border rounded font-semibold text-md text-white bg-blue-500">Salvar</button>
                    </div>
                </form>

            </div>
        </div>
    @endif

    @if ($showClientes)
        <div class="flex justify-center">
            <div class="fixed top-11 bg-white border border-gray-300 shadow-2xl rounded-lg sm:top-28 sm:w-1/3">

                <div>
                    <button wire:click="visualizarClientes()"
                        class="p-1 m-1 border rounded float-right hover:text-white hover:bg-red-500">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>

                <h1 class="text-xl font-semibold text-center m-3">Clientes</h1>

                <div class="flex justify-center items-center m-4 gap-1">
                    <input wire:model.live="search" type="text" id="table-search"
                        class="p-2 text-sm text-gray-900 border border-gray-200 rounded w-80 focus:ring-gray-100 focus:border-gray-100"
                        placeholder="Pesquisar Cliente">

                    <button wire:click="pesquisaClientes()" class="p-2 bg-blue-500 rounded">
                        <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </button>
                </div>

                @if ($clientes)
                    <div class="flex justify-center flex-wrap m-3 overflow-auto h-60">
                        @foreach ($clientes as $cliente)
                            <div wire:click="selecioneCliente({{ $cliente->id }})"
                                class="m-2 p-2 text-gray-400 shadow border rounded w-44 hover:bg-gray-100 hover:shadow-xl hover:border-2 cursor-pointer">
                                <h1 class="text-sm  font-semibold">#{{ $cliente->id }}</h1>
                                <h1 class="text-lg font-semibold text-gray-500">{{ $cliente->nome }}</h1>
                                <h1 class="text-sm  font-semibold">{{ $cliente->whatsapp }}</h1>
                            </div>
                        @endforeach
                    </div>
                @endif

            </div>
        </div>
    @endif
</div>
