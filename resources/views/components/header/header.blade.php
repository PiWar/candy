<header class="header">
    <div class="header__container">
        <div class="header__brand">
            <img src="{{asset("icons/krendel.png")}}" alt="brand__icon" class="header__icon">
            <a href="{{route("welcome")}}" class="header__title">CandyRock</a>
        </div>
        <div class="flex gap-2 sm:gap-4">
            <a href="{{route("card")}}" class="header__cart">
                <span class="badge" id="badge"></span>
                Корзина
            </a>
            @if(session()->get("_user"))
                <a href="{{route("orders")}}" class="header__cart">
                    Заказы
                </a>
            @else
                <a href="{{route("orders")}}" class="header__cart">
                    Вход
                </a>
            @endif
        </div>
    </div>
</header>
