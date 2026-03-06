<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $tests = Test::orderBy('id')->get();
        return view('tests.index', compact('tests'));
    }

    public function show(Test $test)
    {
        $isFavorited = auth()->user()
            ->favorites()
            ->where('test_id', $test->id)
            ->exists();

        return view('tests.show', compact('test', 'isFavorited'));
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