<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Inertia\Inertia;

class WelcomeController extends Controller
{
    public function __invoke(Request $request)
    {
        $source = $request->query('source', 'direct');
        Cookie::queue('referral_source', $source, 60 * 24 * 30);

        return Inertia::render('Welcome/Welcome');
    }
}
