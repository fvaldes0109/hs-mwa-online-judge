<?php

namespace App\Http\Controllers;

use App\Models\Problem;
use App\Models\User;
use Illuminate\Support\Facades\Cache;

class WelcomeController extends Controller
{
    public function welcome()
    {
        $problems = Cache::remember('welcome.recommended_problems', config('app.cache_ttl'), function () {

            // Get the 4 most solved problems, that have not been solved by the current user
            return Problem::withCount(['submissions as accepted_submissions_count' => function ($query) {
                $query->where('status', 'Accepted');
                if (auth()->check()) {
                    $query->whereNot('user_id', auth()->user()->id);
                }
            }])
                ->orderBy('accepted_submissions_count', 'desc')
                ->take(4)
                ->get();
        });

        $sorted_users = Cache::remember('welcome.top_ten_users', config('app.cache_ttl'), function () {
            return User::query()
                ->leaderboard()
                ->take(10)
                ->get();
        });

        return view('welcome', compact('problems', 'sorted_users'));
    }
}
