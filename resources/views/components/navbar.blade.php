<div class="flex items-center gap-2 font-medium">
    <a href="{{url('order/dashboard')}}"
       class="bg-sky-100 text-sky-800 p-2 px-5 rounded-full text-sm transition-all hover:bg-sky-500 hover:text-white {{request()->is("order/*") ? "bg-white border-2 border-sky-700" : ""}}">Sifarişlər</a>
    <a href="{{url('payment/dashboard')}}"
       class="bg-sky-100 text-sky-800 p-2 px-5 rounded-full text-sm transition-all hover:bg-sky-500 hover:text-white {{request()->is("payment/*") ? "bg-white border-2 border-sky-700" : ""}}">Ödənişlər</a>
    <a href="{{url('user/dashboard')}}"
       class="bg-sky-100 text-sky-800 p-2 px-5 rounded-full text-sm transition-all hover:bg-sky-500 hover:text-white {{request()->is("user/*") ? "bg-white border-2 border-sky-700" : ""}}">İstifadəçilər</a>
    <a href="{{url("product/dashboard")}}"
       class="bg-sky-100 text-sky-800 p-2 px-5 rounded-full text-sm transition-all hover:bg-sky-500 hover:text-white {{request()->is("product/*") ? "bg-white border-2 border-sky-700" : ""}}">Məhsullar</a>
    <a href="{{url("raport")}}"
       class="bg-sky-100 text-sky-800 p-2 px-5 rounded-full text-sm transition-all hover:bg-sky-500 hover:text-white {{request()->is("raport/*") ? "bg-white border-2 border-sky-700" : ""}}">Hesabat</a>
    <a href="{{url("logout")}}"
       class="bg-red-500 text-white p-2 px-5 rounded-full text-sm transition-all hover:bg-red-700">Çıxış</a>
</div>
