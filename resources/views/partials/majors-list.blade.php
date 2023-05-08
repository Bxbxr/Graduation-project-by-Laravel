<div class="list-group ml-5" style="max-height: 400px; overflow-y: auto;">
    @foreach ($majors as $id => $major)
        <a href="/majors/{{ $id }}" target="_blank"
            class="list-group-item list-group-item-action {{ $id % 2 == 0 ? 'bg-light' : 'bg-white' }}">{{ $major }}</a>
    @endforeach
</div>
