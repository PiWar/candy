@extends("layout.layout")

@section("content")
    <div>
        <div class="flex items-center gap-2 sm:mt-4 sm:mx-10 justify-between mt-2 mx-4">
            <div class="flex items-end sm:text-2xl text-xl rounded-3xl drop-shadow bg-[#F0F8F0] px-4">
                Привет, {{$user["name"]}}!
            </div>
            <div class="flex gap-2">
                <a class="sm:px-4 px-2 sm:py-1 py-0.5 rounded-3xl text-white sm:text-xl bg-orange-300 transition-colors hover:bg-orange-400/[.8]"
                   href="{{route("orders")}}">
                    Обновить
                </a>
                <form action="{{route("_logout")}}" method="post">@csrf
                    <input
                        class="sm:px-4 px-2 sm:py-1 py-0.5 rounded-3xl text-white sm:text-xl bg-emerald-400 transition-colors hover:bg-emerald-500/[.8]"
                        type="submit" value="выход">
                </form>

            </div>
        </div>
        <div class="flex flex-col items-center gap-4 p-2 sm:p-4  mt-4">

            @forelse($orders as $order)
                <div
                    class="flex flex-col items-center rounded-3xl bg-[#F0F8F0] drop-shadow p-2 sm:p-4 max-w-4xl w-full">
                    @if($order->status == 2)
                        <h3
                            class=" bg-emerald-300 text-white shadow-inner sm:text-xl px-2 py-1 sm:px-4 sm:py-2 rounded-3xl font-bold self-end text-center mb-3">
                            Заказ можно забирать!
                        </h3>
                    @elseif($order->status == 1)
                        <h3
                            class=" bg-orange-300 text-white shadow-inner sm:text-xl px-2 py-1 sm:px-4 sm:py-2 rounded-3xl font-bold self-end text-center mb-3">
                            Собирается
                        </h3>
                    @else
                        <h3
                            class="bg-orange-300 text-white shadow-inner sm:text-xl px-2 py-1 sm:px-4 sm:py-2 rounded-3xl font-bold self-end text-center mb-3">
                            В обработке
                        </h3>
                    @endif
                    <h3 class="bg-white shadow-inner sm:text-xl px-2 py-1 sm:px-4 sm:py-2 rounded-3xl font-bold w-full text-center mb-3">
                        №: {{$order->slug}} <span class="font-normal">|</span> общая стоимость: {{$order->total_price}}
                        p.
                    </h3>
                    <div class="flex flex-col items-stretch gap-5 w-full">
                        @foreach($order->orderProducts as $orderProduct)
                            <div class="flex sm:gap-4 gap-2 w-full items-stretch">
                                <img
                                    src="{{$orderProduct->product->image}}"
                                    alt="{{$orderProduct->product->title}}"
                                    class="aspect-square w-20 sm:w-28 p-1 rounded-3xl bg-white object-contain object-center">
                                <div class="w-full flex flex-col gap-2 justify-between">
                                    <div
                                        class="bg-white shadow-inner sm:text-xl px-2 py-1 sm:px-4 sm:py-2 rounded-3xl h-fit w-full text-center">
                                        {{$orderProduct->product->title}}
                                    </div>
                                    <div class="self-end sm:text-xl">
                                        Кол-во: {{$orderProduct->count}}&nbsp;
                                        Стоимость: {{$orderProduct->count * $orderProduct->product->price}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @empty
                <div class="text-center text-xl sm:text-2xl font-bold">Активных заказов нет</div>
            @endforelse
        </div>

    </div>
@endsection
