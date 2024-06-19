<div>
    <!-- Cards -->
    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4" wfd-id="87">

        <!-- Card -->
        <a href="" class="hover:shadow-lg"
            title="Total de clientes que você tem acesso">
            <x-card.icon-card title="Clientes" subtitle="{{$clientes}}" color="yellow">
                <x-icons.pessoas />
            </x-card.icon-card>
        </a>

        <a href="" class="hover:shadow-lg"
            title="Total de produtos cadastrados">
            <x-card.icon-card title="Contas (mês atual)" subtitle="{{$contas}}" color="gray">
                <x-icons.contas />
            </x-card.icon-card>
        </a>

        <a href="" class="hover:shadow-lg"
            title="Total de pedidos autenticados realizados">
            <x-card.icon-card title="Pedidos do Ecommerce" subtitle="" color="blue">
                <x-icons.pedidos class="w-12" />
            </x-card.icon-card>
        </a>
    </div>
    <!--./Cards-->
</div>
