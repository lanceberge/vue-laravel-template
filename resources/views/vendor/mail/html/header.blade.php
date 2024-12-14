@props(['url'])
<tr>
  <td class="header">
    <a href="{{ $url }}" style="display: inline-block;">
      <div style="display: inline-block;">
        <img src="{{ config('app.url') }}/Logo.png" style="vertical-align: middle;" height="50" alt="{{ config('app.name') }}">
        <span style="font-weight: 800; font-size: 30px; vertical-align: middle;">{{ config('app.name') }}</span>
      </div>
    </a>
  </td>
</tr>
