<div class="table-responsive">
    <table class="table table-bordered m-0">
        <thead class="table-secondary">
            <tr>
                <th scope="col" class="text-center">#</th>
                <th scope="col" style="min-width: 110px;">Nume</th>
                <th scope="col" style="min-width: 125px;">Serial Number</th>
                <th scope="col" style="min-width: 125px;">Part Number</th>
                <th scope="col" >Data</th>
                <th scope="col" style="min-width: 100px;">Preț</th>
            </tr>
        </thead>
        <tbody id="table-body">
            {{ $slot }}
        </tbody>
    </table>
</div>
