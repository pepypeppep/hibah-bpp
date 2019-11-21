<?php

namespace App\Http\Controllers\API;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReviewerController extends Controller
{
    public function search(Request $request)
    {
        if ($request->has('q')) {
            $reviewers = User::with('roles')
                                ->where('name', 'like', '%' . $request->q . '%')
                                ->whereHas('roles', function ($query) {
                                    return $query->where('id', 1)->orWhere('id', 2)->orWhere('id', 3);
                                })->get();

            return response()->json($reviewers);
        }
    }
}
