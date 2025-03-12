<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BillingController extends Controller
{
    // TODO if not logged in, route to GoogleAuth with the stripe thing as a callback
    public function subscribe(string $priceName, Request $request, string $code = null)
    {
        $priceIds = config('services.stripe.price_ids');

        if (! isset($priceIds[$priceName])) {
            return redirect(route('billing'))->withErrors(['error' => "This billing plan doesn't exist"]);
        }

        $priceId = $priceIds[$priceName];

        $trialDaysForCodes = ['1MONTHFREE' => 30];

        if ($code !== null && isset($trialDaysForCodes[$code])) {
            return $request->user()
                ->newSubscription('default', $priceId)
                ->trialDays($trialDaysForCodes[$code])
                ->checkout([
                    'success_url' => route('dashboard'),
                    'cancel_url' => route('welcome'),
                ]);
        }
        return $request->user()
            ->newSubscription('default', $priceId)
            ->allowPromotionCodes()
            ->checkout([
                'success_url' => route('dashboard'),
                'cancel_url' => route('welcome'),
            ]);
    }

    public function manage(Request $request)
    {
        return $request->user()->redirectToBillingPortal(route('flashcards'));
    }
}
