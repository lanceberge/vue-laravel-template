<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BillingController extends Controller
{
    // TODO if not logged in, route to GoogleAuth with the stripe thing as a callback
    public function subscribe(string $priceName, Request $request)
    {
        $priceIds = config('services.stripe.price_ids');

        if (! isset($priceIds[$priceName])) {
            return redirect(route('billing'))->withErrors(['error' => "This billing plan doesn't exist"]);
        }

        $priceId = $priceIds[$priceName];

        return $request->user()
          ->newSubscription('default', $priceId)
          ->trialDays(5)
          ->allowPromotionCodes()
          ->checkout([
            'success_url' => route('flashcards.create'),
            'cancel_url' => route('welcome'),
          ]);
    }
}
