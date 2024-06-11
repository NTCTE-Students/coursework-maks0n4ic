@include('includes.header')

<div class="container mt-4">
    <br>
    <div class="row">
        <div class="col-md-12">
            <h1 class="my-4">Главная</h1>
        </div>
        @foreach ($posts as $post)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img class="card-img-top" src="{{ asset('images/' . $post->image_path) }}" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        {{-- <h2 class="card-title">{{ $->name }}</h2> --}}
                        <a href="{{ url('/lot', $post) }}" class="btn btn-primary">Подробнее</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
    {{-- <section class="py-5">
        <div class="container py-4 py-xl-5">
            <div class="row mb-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <p>Добро пожаловать в <b>Brand</b> Здесь вы сможете смотреть товары пользователей на аукционах , а так же размещать свои товары<b>!</b> </p>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container py-4 py-xl-5">
            <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-lg-3">
                <div class="col">
                    <div class="card border-light border-1 d-flex justify-content-center p-4">
                        <div class="card-body">
                            @foreach ($posts as $post)
                                <div class="col-md-6 col-lg-4 item zoom-on-hover"><a href=""><img class="img-fluid image" src="{{ asset('images/' . $post->image_path) }}" alt="{{ $post->image_path }}"></a></div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-4 py-xl-5">
        <div class="container py-4 py-xl-5">
            <div class="row mb-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h3>Перейти к лотам</h3><button class="btn btn-outline-primary btn-lg" type="button"><a href={{ url('/lot') }}>Лоты</a></button>
                </div>
                @auth
                    <div class="row g-0">
                        <h3>Выставить свой лот</h3><button class="btn btn-outline-primary btn-lg" type="button"><a href={{ url('/createposts') }}>создать!</a></button>
                    </div>
                @endauth
            </div>
        </div>
    </section> --}}
@include('includes.footer')
