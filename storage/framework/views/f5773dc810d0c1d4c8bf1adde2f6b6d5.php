<div class="flex items-center gap-2 font-medium">
    <a href="<?php echo e(url('order/dashboard')); ?>"
       class="bg-sky-100 text-sky-800 p-2 px-5 rounded-full text-sm transition-all hover:bg-sky-500 hover:text-white <?php echo e(request()->is("order/*") ? "bg-white border-2 border-sky-700" : ""); ?>">Sifarişlər</a>
    <a href="<?php echo e(url('payment/dashboard')); ?>"
       class="bg-sky-100 text-sky-800 p-2 px-5 rounded-full text-sm transition-all hover:bg-sky-500 hover:text-white <?php echo e(request()->is("payment/*") ? "bg-white border-2 border-sky-700" : ""); ?>">Ödənişlər</a>
    <a href="<?php echo e(url('user/dashboard')); ?>"
       class="bg-sky-100 text-sky-800 p-2 px-5 rounded-full text-sm transition-all hover:bg-sky-500 hover:text-white <?php echo e(request()->is("user/*") ? "bg-white border-2 border-sky-700" : ""); ?>">İstifadəçilər</a>
    <a href="<?php echo e(url("product/dashboard")); ?>"
       class="bg-sky-100 text-sky-800 p-2 px-5 rounded-full text-sm transition-all hover:bg-sky-500 hover:text-white <?php echo e(request()->is("product/*") ? "bg-white border-2 border-sky-700" : ""); ?>">Məhsullar</a>
    <a href="<?php echo e(url("raport")); ?>"
       class="bg-sky-100 text-sky-800 p-2 px-5 rounded-full text-sm transition-all hover:bg-sky-500 hover:text-white <?php echo e(request()->is("raport") ? "bg-white border-2 border-sky-700" : ""); ?>">Hesabat</a>
    <a href="<?php echo e(url("logout")); ?>"
       class="bg-red-500 text-white p-2 px-5 rounded-full text-sm transition-all hover:bg-red-700">Çıxış</a>
</div>
<?php /**PATH C:\laragon\www\boya-app\resources\views/components/navbar.blade.php ENDPATH**/ ?>