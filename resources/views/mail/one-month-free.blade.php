<x-mail::marketing>
  Hi {{ $firstName }}!

  We at {{ config('app.name' )}} would love for you to try out our product. We would like to extend an offer for you to use Flipalara for one month free with code <code>1MONTHFREE</code>!

If you run into any issues, feel free to reach out at this email. Here is an image of where the code can be applied on <a href="https://{{ config('app.name') }}.com/billing">{{ config('app.name') }}.com/billing</a>:

  <div style="display: flex; width: 100%; justify-content: center;">
<img src="{{ config('app.url') }}/img/1monthfree.png" style="vertical-align: middle; max-height: 400px; object-fit: contain;" alt="{{ config('app.name') }}">
  </div>

  Best,<br>
  <!-- <TODO>, founder of {{ config('app.name') }} -->
</x-mail::marketing>
