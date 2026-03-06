<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Test;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Test::query();

        $query->where('user_id', '!=', auth()->id())
              ->orderBy('id');

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        $tests = $query->get();

        return view('user.products.index', compact('tests'));
    }

    public function show(Test $test)
    {
        $isFavorited = auth()->user()
            ->favorites()
            ->where('test_id', $test->id)
            ->exists();

        return view('user.products.show', compact('test', 'isFavorited'));
    }

    public function toggleFavorite(Test $test)
    {
        $user = auth()->user();

        $user->favorites()->toggle($test->id);

        $isFavorited = $user->favorites()
            ->where('test_id', $test->id)
            ->exists();

        return response()->json([
            'favorited' => $isFavorited
        ]);
    }
}