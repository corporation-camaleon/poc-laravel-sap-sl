    <div>
        <div class="col-md-8 mb-2">
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session()->get('success') }}
                </div>
            @endif
            @if (session()->has('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session()->get('error') }}
                </div>
            @endif
            @if ($addOrder)
                @include('livewire.create')
            @endif
            @if ($updateOrder)
                @include('livewire.update')
            @endif
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if (!$addOrder)
                        <button wire:click="addOrder()" class="btn btn-primary btn-sm float-right">Add New Order</button>
                    @endif
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>DocEntry</th>
                                    <th>DocNum</th>
                                    <th>CardCode</th>
                                    <th>CardName</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($orders as $order)
                                    <tr>
                                        <td>
                                            {{ $order->DocEntry }}
                                        </td>
                                        <td>
                                            {{ $order->DocNum }}
                                        </td>
                                        <td>
                                            {{ $order->CardCode }}
                                        </td>
                                        <td>
                                            {{ $order->CardName }}
                                        </td>
                                        <td>
                                            <button wire:click="editOrder({{ $order->DocEntry }})"
                                                class="btn btn-primary btn-sm">Editar</button>
                                            <button onclick="deleteOrder({{ $order->DocEntry }})"
                                                class="btn btn-danger btn-sm">Eliminar</button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" align="center">
                                            No se encontraron ordenes en nuestros registros.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
