<tr>
    <th scope="row" class="text-center px-0" title="{{ Request::is('*report/month*') && $product->delivered ? 'Produs livrat' : 'Produs vândut în magazin' }}">
        <div class="text-center {{ Request::is('*report/month*') && $product->delivered ? 'delivered-product' : '' }}">
            {{ $loop->index + 1 }}.
        </div>
    </th>
    <td>
        {{ $product->name }}
    </td>
    <td>
        {{ $product->serial_number }}
    </td>
    <td>
        {{ $product->part_number }}
    </td>
    <td>
        {{ date('d.m.Y', strtotime($product->day)) }}
    </td>
    <td>
        {{ $product->price }} lei
    </td>
    <td class="d-flex justify-content-between">
        <div class="">
            <a href="{{ route('editProduct', $product->id) }}" class="btn btn-edit py-0 px-1" title="Editează produsul">
                <x-icons.edit />
            </a>
        </div>
        <div class="">
            <a href="{{ route('deleteProduct', $product->id) }}" class="btn btn-danger text-dark py-0 px-1" title="Sterge produsul">
                <x-icons.delete />
            </a>
        </div>
    </td>
</tr>
