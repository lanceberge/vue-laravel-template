<?php

namespace App\Http\Controllers;

use App\Mail\WaitListAdded;
use Illuminate\Http\Request;
use App\Models\WaitListEmail;
use Illuminate\Support\Facades\Mail;

class WaitListController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email'
        ]);

        try {
            $email = $validated['email'];
            WaitListEmail::create(['email' => $email]);

            Mail::to($email)->send(
                new WaitListAdded()
            );
        } catch (\Exception $e) {
            logger('exception ' . $e . ' adding email to db');
        }
    }
}
