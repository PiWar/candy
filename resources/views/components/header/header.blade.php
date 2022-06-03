<header class="header">
    <div class="header__container">
        <div class="header__brand">
            <img src="{{asset("icons/krendel.png")}}" alt="brand__icon" class="header__icon">
            <a href="{{route("welcome")}}" class="header__title">CandyRock</a>
        </div>
        <a href="{{route("card")}}" class="header__cart">
            <span class="badge" id="badge"></span>
            Корзина
        </a>
    </div>
</header>
