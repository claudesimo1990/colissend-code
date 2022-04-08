<img src="{{ !empty(Auth::user()->getFirstMediaUrl('avatar', 'avatar')) ? Auth::user()->getFirstMediaUrl('avatar', 'avatar') : asset('images/colissend/default.svg') }}" class="rounded-circle">
