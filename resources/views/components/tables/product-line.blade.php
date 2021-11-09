<tr>
    <th scope="row" class="text-center"> {{ $loop->index + 1 }}</th>
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
</tr>
