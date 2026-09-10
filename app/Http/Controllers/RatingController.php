<?php
namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function store(Request $request, Car $car)
    {
        $request->validate([
            'rating_score' => 'required|integer|min:1|max:5',
            'reviewer_name' => 'nullable|string|max:255',
            'comment' => 'nullable|string',
        ]);

        $car->ratings()->create([
            'rating_score' => $request->rating_score,
            'reviewer_name' => $request->reviewer_name ?? 'Anonim',
            'comment' => $request->comment,
        ]);

        return back()->with('success', 'Rating berhasil ditambahkan!');
    }
}