<tr class="align-middle">
    <th class="ps-2" scope="row" style="font-size: 1.1em;">{{ $loop->index + 1 }}.</th>
    <td class="ps-2" style="font-size: 1.1em;">{{ date('d.m.Y', strtotime($intervention->day)) }}</td>
    <td class="ps-2" style="font-size: 1.1em;">{{ date('H:i', strtotime($intervention->time)) }}</td>
</tr>
