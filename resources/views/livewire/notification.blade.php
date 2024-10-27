<div class="notification {{$state == '' ? "!hidden" : $state}}">
    <p class="notification-msg">{{$msg}}</p>
    <button wire:click="resetNotify" class="notification-btn">
        <svg class="size-5" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
             fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z"/>
            <circle cx="12" cy="12" r="9"/>
            <path d="M9 12l2 2l4 -4"/>
        </svg>
    </button>
    @script
    <script>
        Livewire.on('autoHide', function () {
            setTimeout(function () {
                Livewire.dispatch("notify")
            }, 3000)
        })
        Livewire.on('reload', function () {
            setTimeout(function () {
                location.reload()
            }, 3000)
        })
        Livewire.on('redirect', function ({url}) {
            setTimeout(function () {
                location.href = url
            }, 2500)
        })
    </script>
    @endscript

</div>
