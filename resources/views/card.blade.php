@extends("layout/layout")

@section("content")
    <main class="main">
        <h1 class="main__title mb-5">
            <span>Корзина</span>
        </h1>
        <div id="card"
             @if(session()->get("_user"))
             data-name="{{session()->get("_user")["name"]}}"
             data-phone="{{session()->get("_user")["phone"]}}"
            @endif></div>

    </main>
@endsection


