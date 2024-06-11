@include('includes.header')

<header class="pt-5">
    <div class="container pt-4 pt-xl-5">
        <div class="row pt-5">
            <div class="col-md-8 text-center text-md-start mx-auto">
                <div class="text-center">
                    <form class="d-flex justify-content-center flex-wrap" action="{{ route('myposts') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="image" required>
                        <input type="text" name="description" placeholder="Описание..." required>
                        <input type="number" name="price" placeholder="Цена..." required>
                        <br>
                        <div class="mb-3"><label class="form-label" for="email"></label><input class="form-control" type="submit" value="Загрузить"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
@include('includes.footer')
