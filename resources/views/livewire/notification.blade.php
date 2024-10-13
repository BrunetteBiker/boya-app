<div class="notification {{$state == '' ? "!hidden" : $state}}">
    <p class="notification-msg">{{$msg}}</p>
    <button wire:click="resetNotify" class="notification-btn">Oldu</button>

    @script
    <script>
        Livewire.on('autoHide', function () {
            setTimeout(function () {
                Livewire.dispatch("notify")
            }, 3000)
        })
        Livewire.on('redirect', function ({url}) {
            setTimeout(function () {
                location.href = url
            },2500)
        })
    </script>
    @endscript

</div>
