@include('includes.header')
<div class="container mt-4">
    <br>
    <div class="row">
        <div class="col-md-12">
            <h1 class="my-4">Главная</h1>
            <p class="lead">Выберите категорию</p>
        </div>
        <div class="col-md-12 mb-12">
            <div class="card h-100">
                <img class="card-img-top" src="{{ asset('images/' . $lots->image_path) }}" style="height: 600px; object-fit: cover;">
                <div class="card-body">
                    <h2 class="card-title">{{ $lots->description }}</h2>
                    <p class="card-text">{{ $lots->price }}</p>
                    <form action="{{ url('/lot/update', $lots) }}" method="POST" style="margin-left: 10px;">
                        @csrf
                        <input type="number" name="bet" value="{{ $lots->price }}">
                        <button type="submit" class="btn btn-success">Сделать ставку</button>
                    </form>
                    <form action="{{ url('/lot/buy', $lots) }}" method="POST" style="margin-left: 10px;">
                        @csrf
                        <button type="submit" class="btn btn-success">Оплатить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('includes.footer')
