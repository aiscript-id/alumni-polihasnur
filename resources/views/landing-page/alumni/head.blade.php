{{-- button --}}
<div class="mb-3 mt-0">
    <a name="" id="" class="btn btn-sm btn-{{ Request()->routeIs('alumni') ? '' : 'outline-' }}primary" href="{{ route('alumni') }}" role="button">Tabel Data</a>
    <a name="" id="" class="btn btn-sm btn-{{ Request()->routeIs('alumni.statistik') ? '' : 'outline-' }}primary" href="{{ route('alumni.statistik') }}" role="button">Statistik</a>
    <a name="" id="" class="btn btn-sm btn-{{ Request()->routeIs('alumni.pekerjaan') ? '' : 'outline-' }}primary" href="{{ route('alumni.pekerjaan') }}" role="button">Pekerjaan</a>
</div>
