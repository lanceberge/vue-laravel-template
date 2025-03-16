<x-mail::message>

  {{ $accountName }} has subscribed to plan: {{ $subscriptionDescription }} of
  {{ config('app.name') }} with email: {{ $customerEmail }}

</x-mail::message>
