@props(['urlgambar'])

<div class="row g-3 text-center">
    @foreach ($urlgambar as $url)
        <div class="col-md-4">
            <img src="{{ asset($url) }}" alt="{{ $url }}" class="img-fluid">
        </div>
    @endforeach
</div>
