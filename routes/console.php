<?php

use App\Mail\FounderWelcomeSubscribed;
use App\Mail\OneMonthFree;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

// TODO flush logs to s3

Schedule::call(function () {
    // all users who aren't subscribed, haven't unsubscribed from marketing
    // emails, and didn't register within the past 2 days
    $users = User::where(function ($query) {
        $query->whereDoesntHave('emailSubscription')
          ->orWhereHas('emailSubscription', function ($subQuery) {
              $subQuery->where('marketing', true);
          });
    })
        ->whereNull('stripe_id')
        ->where('sent_free_month_email', false)
        ->where('created_at', '<', Carbon::now()->subDays(2))
        ->get();

    $users->each(function ($user) {
        Mail::to($user->email)->queue(new OneMonthFree(
            firstName: explode(' ', $user->name)[0],
        ));

        $user->update(['sent_free_month_email' => true]);
    });
})
    ->timezone('America/New_York')
    ->weeklyOn(1, '10:00')
    ->weeklyOn(2, '10:00')
    ->weeklyOn(3, '10:00')
    ->weeklyOn(4, '10:00')
    ->environments(['production']);


// TODO feedback email for subscribed users
