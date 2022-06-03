@extends("layout/layout")

@section("content")
    <main class="main">
        <h1 class="main__title">
            <span>Каталог снеков и сладостей</span>
        </h1>

        <div class="main__categories" id="scrollbar-custom">
            <a
                id="customScrollAll"
                data-text="Все категории"
                class="main__categories-item {{$uri === "" ? "active" : null}}"
                href="{{route("welcome")}}">
                Все категории
            </a>
            @foreach($categories as $category)
                <a
                    id="customScroll{{$category->name}}"
                    data-text="{{\App\Helpers\StrMB::ucfirst($category->name)}}"
                    class="main__categories-item  {{$uri == $category->name ? "active" : null}}"
                    href="{{route("welcome", ["category" => $category->name])}}">
                    {{ \App\Helpers\StrMB::ucfirst($category->name) }}
                </a>
            @endforeach
        </div>
        <div class="main__products {{!$products->count() ? "empty" : null}}">
            @forelse($products as $product)
                <div
                    class="main__products-item"
                >
                    <img src="{{$product->image}}" alt="{{$product->title}}">
                    <p class="item-title">{{\App\Helpers\StrMB::ucfirst($product->title)}}</p>
                    <p class="item-weight">
                        {{$product->weight}}
                    </p>
                    <div class="item-info">
                        <p class="item-price">{{$product->price}} p.</p>
                        <p
                            class="item-btn"
                            data-text="Выбрать"
                            data-product="{{$product->id}}"
                        >
                            В корзину
                        </p>
                    </div>
                </div>

            @empty
                <img
                    class="main__products-empty"
                    src="{{asset("icons/emptyCategory.jpg")}}"
                    alt="empty">
            @endforelse
        </div>
    </main>
@endsection


@section("scripts")
    <script src="{{asset("js/scrollCategory.js")}}" defer></script>
@endsection
