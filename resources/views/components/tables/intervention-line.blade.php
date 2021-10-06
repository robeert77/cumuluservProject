<tr class="align-middle">
    <th scope="row" style="font-size: 1.1em;">{{ $loop->index + 1 }}.</th>
    <td style="font-size: 1.1em;">{{ date('d.m.Y', strtotime($intervention->day)) }}</td>
    <td style="font-size: 1.1em;">{{ date('H:i', strtotime($intervention->time)) }}</td>
</tr>
