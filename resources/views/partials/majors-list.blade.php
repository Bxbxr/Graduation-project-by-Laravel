<nav class="nav  bg-light ml-5" style="max-height: 400px; overflow-y: auto;">
    <ul class="nav flex-column">
    @foreach ($majors as $major)
    <li class="nav-item">
        <a class="nav-link active" href="#"> {{ $major }} </a>
    </li>
        @endforeach
    </ul>
</nav>


