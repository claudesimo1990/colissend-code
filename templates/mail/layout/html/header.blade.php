<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) !== 'Laravel')
<img src="{{ asset('images/colissend/logo.png') }}" width="150px" alt="colissend Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
