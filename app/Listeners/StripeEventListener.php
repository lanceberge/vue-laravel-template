<?php

namespace App\Listeners;

use Laravel\Cashier\Events\WebhookReceived;
use App\Mail\CheckoutSuccessfulPersonal;
use Illuminate\Support\Facades\Mail;

class StripeEventListener
{
    /**
     * Handle received Stripe webhooks.
     */
    public function handle(WebhookReceived $event): void
    {
        // TODO queue up the email
        $payload = $event->payload;
        if ($payload['type'] === 'invoice.payment_succeeded') {
            $email = data_get($payload, 'data.object.customer_email');
            $accountName = data_get($payload, 'data.object.account_name');
            Mail::to(config('mail.personal'))->send(new CheckoutSuccessfulPersonal(
                accountName: $accountName,
                customerEmail: $email
            ));
        }
    }
}
