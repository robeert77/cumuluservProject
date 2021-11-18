<x-app-layout>
    <div class="w-100 card-shadow bg-white rounded my-5">
        <div class="py-4 px-3">
            <form method="POST" action="{{ route('editProduct', $product->id) }}">
                @csrf

                <div class="">
                    <x-tables.products-table>
                        <tr>
                            <th scope="row" class="text-center">1</th>
                            <td class="py-0 px-1">
                                <input type="text" class="form-control px-2 table-input" name="name-1" value="{{ $product->name }}">
                            </td>
                            <td class="py-0 px-1">
                                <input type="text" class="form-control px-2 table-input" name="serial-number-1" value="{{ $product->serial_number }}">
                            </td>
                            <td class="py-0 px-1">
                                <input type="text" class="form-control px-2 table-input" name="part-number-1" value="{{ $product->part_number }}">
                            </td>
                            <td class="py-0 px-1">
                                <input type="text" class="form-control px-2 table-input" name="date-1" value="{{ date('d.m.Y', strtotime($product->day)) }}">
                            </td>
                            <td class="py-0 px-1">
                                <input type="text" class="form-control px-2 table-input" name="price-1" value="{{ $product->price }}">
                            </td>
                        </tr>
                    </x-tables.products-table>
                </div>
                <div class="mb-1 mt-3">
                    <x-button class="btn-outline-primary rounded-pill w-100" style="max-width: 225px;">
                        {{ __('Salvează modificările') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
