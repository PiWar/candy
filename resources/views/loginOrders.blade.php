@extends("layout.layout")

@section("content")
    <form action="{{route("_login")}}" method="post"
          class="flex flex-col mx-auto gap-2 mt-20 p-4 h-fit w-fit rounded-3xl drop-shadow bg-[#F0F8F0]">
        @csrf
        <h1 class="text-center font-bold text-2xl py-1 mb-3 bg-white rounded-full shadow-inner">Вход</h1>
        @error('credentials')
        <p class="text-red-600 text-center">Неправильный логин или пароль</p>
        @enderror
        <input class="rounded-3xl py-1 px-4 shadow-inner border-transparent outline-none text-xl" type="text"
               required
               name="phone"
               placeholder="телефон">
        <input class="rounded-3xl py-1 px-4 shadow-inner border-transparent outline-none text-xl" type="password"
               required
               name="password"
               placeholder="пароль">
        <input
            class="mt-3 self-center w-fit py-1 px-10 shadow shadow-inner cursor-pointer hover:bg-orange-400/[.8] transition-colors rounded-3xl bg-orange-300 text-white text-xl"
            type="submit" value="Войти">
        <a href="{{route("register")}}" class="text-center cursor-pointer underline">Зарегистрироваться</a>
    </form>
@endsection
