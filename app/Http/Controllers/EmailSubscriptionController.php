<?php

namespace App\Http\Controllers;

use App\Models\EmailSubscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EmailSubscriptionController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'subscriptions.*.field' => 'required|string|in:' . implode(',', EmailSubscription::$emailListFieldNames),
            'subscriptions.*.enabled' => 'required|boolean',
        ]);

        $user = $request->user();
        $subscription = $user->emailSubscription();

        $subscription->update(
            array_merge(...array_map(fn ($item) => [$item['field'] => $item['enabled']], $request['subscriptions']))
        );

        return response()->api('Updated subscriptions');
    }
}
