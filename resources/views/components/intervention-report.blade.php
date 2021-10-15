<div>
    <h3 class="mb-2">Raportul de intervenție pentru {{ $client }} din
        <kbd class="rounded-3">{{ date('d.m.Y', strtotime($intervention->day)) }} </kbd>
    </h3>
    <h5 class="mb-3">Ora de început a intervenției: <kbd class="rounded-3"> {{ date('H:i', strtotime($intervention->start_at)) }}</kbd> </h5>
    <h5 class="mb-3">Ora de sfârșit a intervenției: <kbd class="rounded-3"> {{ date('H:i', strtotime($intervention->end_at)) }}</kbd> </h5>
    <h5 class="mb-3">Intervenție realizată de: <kbd class="rounded-3"> {{ $intervention->mabe_by }} </kbd> </h5>
    <h5 class="mb-3">Observații intervenție:</h5>
    <div class="px-2 pt-2 rounded bg-light details-box mb-3">
        {{ Markdown::parse($intervention->observations) }}
    </div>
    <a href="{{ route('editIntervention', $intervention->id) }}" class="btn btn-outline-primary rounded-pill w-100" style="max-width: 225px;">Editează intervenția</a>
</div>
