@extends("layout/layout")

@section("content")
    <main class="main">
        <h1 class="main__title">
            <span>{{\App\Helpers\StrMB::ucfirst($product->title)}}</span>
        </h1>
        <div class="main__product-info">
            <img src="{{$product->image}}" alt="{{$product->title}}">
            <div class="main__product-text">
                <div class="main__product-text-item desc">
                    <div class="title">
                        Подробнее:
                    </div>
                    <div class="text">
                        {{$product->description}}
                    </div>
                </div>
                <div class="main__product-text-more">
                    <div class="main__product-text-item">
                        <div class="title">
                            Вес:
                        </div>
                        <div class="text">
                            {{\App\Helpers\StrMB::ucfirst($product->weight)}}
                        </div>
                    </div>
                    <div class="main__product-text-item">
                        <div class="title">
                            Цена:
                        </div>
                        <div class="text">
                            {{\App\Helpers\StrMB::ucfirst($product->price)}} p.
                        </div>
                    </div>
                    <div class="main__product-text-item span-2">
                        action
                    </div>
                </div>
            </div>
            <div class="main__product-text-item span-2 desc-mob">
                <div class="title">
                    Подробнее:
                </div>
                <div class="text">
                    {{$product->description}}
                </div>
            </div>
        </div>
    </main>
@endsection
