@include('includes.header')
<div class="container mt-4">
    <br>
    <div class="row">
        <div class="col-md-12">
            <h1 class="my-4">Главная</h1>
            <p class="lead">Выберите категорию</p>
        </div>
        <a href="{{ url('/lots/up') }}">↑price</a>
        <a href="{{ url('/lots/down') }}">↓price</a>
        @foreach ($images as $image)
            @if (!$image->buy)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img class="card-img-top" src="{{ asset('images/' . $image->image_path) }}" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h2 class="card-title">{{ $image->description }}</h2>
                            <p class="card-text">{{ $image->price }}</p>
                            <a href="{{ url('/lot', $image) }}" class="btn btn-primary">Сделать ставку</a>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>
@include('includes.footer')
