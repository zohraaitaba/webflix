<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class FiorellaFriendController extends Controller
{
    public function show(Request $request, string $friend = null)
    {
        // Pour les paramètres get...
        dump($_GET['color'] ?? null); // Ancienne méthode...
        dump($request->input('color', 'rose')); // Nouvelle méthode...
        dump(request('color')); // Méthode rapide...

        return view('fiorella', [
            'age' => Carbon::parse('2019-12-31')->age,
            'color' => $request->input('color', 'rose'),
            'friend' => ucfirst($friend),
        ]);
    }
}