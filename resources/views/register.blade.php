@include('includes.header')

@guest
    <header class="pt-5">
        <div class="container pt-4 pt-xl-5">
            <div class="row pt-5">
                <div class="col-md-8 text-center text-md-start mx-auto">
                    <div class="text-center">
                        <h1 class="display-4 fw-bold mb-5">Регистрация</h1>
                        <form class="d-flex justify-content-center flex-wrap" action="{{ route('register') }}" method="POST">
                            @csrf
                                <div class="shadow-lg mb-3">
                                    <p>
                                        <input class="form-control" type="text" name="user[name]" placeholder="Name..." required>
                                    </p>
                                    <p>
                                        <input class="form-control" type="email" name="user[email]" placeholder="Email..." required>
                                    </p>
                                    <p>
                                        <input class="form-control" type="password" name="user[password]" placeholder="Password..." required>
                                    </p>
                                    <p>
                                        <input class="form-control" type="password" name="user[password_confirmation]" placeholder="Password confirmation" required>
                                    </p>
                                    <p>
                                        <input  class="btn btn-primary" type="submit" value="Зарегистрироваться">
                                    </p>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endguest
@if ($errors -> any())
<ul>
@foreach($errors -> all() as $error)
    <li> {{ $error }}
    </li>
    @endforeach
</ul>
@endif
@include('includes.footer')
