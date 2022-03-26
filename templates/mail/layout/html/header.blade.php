@php($logo = asset('images/logo.png'))
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) !== 'Laravel')
<img src="{{ asset('images/colissend/logo.png') }}" width="150px" class="logo" alt="colissend Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
