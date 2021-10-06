<div style="max-width: 450px;">
    <table class="table">
        <thead>
            <tr >
                <th scope="col" class="fs-5 pb-0">#</th>
                <th scope="col" class="fs-5 pb-0">Data Inervenției</th>
                <th scope="col" class="fs-5 pb-0">Durată</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($interventions as $intervention)
                <x-tables.intervention-line :intervention="$intervention" :loop="$loop" />
            @endforeach
        </tbody>
    </table>
</div>
