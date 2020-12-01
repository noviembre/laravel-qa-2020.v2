<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;

class FavoritesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    #---- make a question favorite
    public function store(Question $question)
    {
        $question->favorites()->attach(auth()->id());
        return back();
    }
    public function destroy(Question $question)
    {
        $question->favorites()->detach(auth()->id());
        return back();
    }
}