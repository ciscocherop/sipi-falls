<?php

namespace App\Http\Controllers;

use App\Models\ActivityReaction;
use Illuminate\Http\Request;

class ActivityReactionController extends Controller
{
    public function toggle(Request $request, $activityKey, $emoji)
    {
        $validEmojis = ['thumbs_up', 'love', 'fire', 'wow'];
        if (!in_array($emoji, $validEmojis)) {
            return response()->json(['error' => 'Invalid emoji'], 400);
        }

        $sessionId = $request->session()->getId();

        $existing = ActivityReaction::where([
            'activity_key' => $activityKey,
            'emoji'        => $emoji,
            'session_id'   => $sessionId,
        ])->first();

        if ($existing) {
            $existing->delete();
            $reacted = false;
        } else {
            ActivityReaction::create([
                'activity_key' => $activityKey,
                'emoji'        => $emoji,
                'session_id'   => $sessionId,
            ]);
            $reacted = true;
        }

        $count = ActivityReaction::where([
            'activity_key' => $activityKey,
            'emoji'        => $emoji,
        ])->count();

        return response()->json(['reacted' => $reacted, 'count' => $count]);
    }

    public function counts(Request $request, $activityKey)
    {
        $sessionId = $request->session()->getId();
        $emojis    = ['thumbs_up', 'love', 'fire', 'wow'];
        $counts    = [];

        foreach ($emojis as $emoji) {
            $counts[$emoji] = [
                'count'   => ActivityReaction::where(['activity_key' => $activityKey, 'emoji' => $emoji])->count(),
                'reacted' => ActivityReaction::where(['activity_key' => $activityKey, 'emoji' => $emoji, 'session_id' => $sessionId])->exists(),
            ];
        }

        return response()->json($counts);
    }
}
