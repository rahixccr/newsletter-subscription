<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\Susbscriber;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:50',
            'name' => 'nullable|string|max:50',
            'id_site' => 'required|array|min:1',
            'id_site.*' => 'exists:sites,id',
        ]);
        
        $susbscriber = Susbscriber::firstOrCreate(
            ['email' => $request->email],
            ['name' => $request->name]
        );
        
        $subscribedSites = Subscription::where('id_subscriber', $susbscriber->id)
            ->pluck('id_site')
            ->toArray();
        
        $newSites = array_diff($request->id_site, $subscribedSites);
        
        foreach ($newSites as $siteId) {
            Subscription::create([
                'id_site' => $siteId,
                'id_subscriber' => $susbscriber->id,
            ]);
        }
        
        if (empty($newSites)) {
            return response()->json(['message' => 'Already subscribed.'], 200);
        }
        
        return response()->json(['message' => 'Subscription successful.'], 201);
        
    }
}