<?php

namespace App\Http\Controllers;

use App\Http\Requests\AskQuestionRequest;
use App\Question;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $questions = Question::with('user')->latest()->paginate(5);
        return view('questions.index', compact('questions'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $question = new Question();
        return view('questions.create', compact('question'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(AskQuestionRequest $request)
    {
        $request->user()->questions()
            ->create($request->only('title', 'body'));
        return redirect()->route('questions.index')->with('success', "Your question has been submitted");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        $question->increment('views');
        return view('questions.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */

    public function edit(Question $question)
    {
        #--- if this questions was no made by current user then abort
        if (\Gate::denies('update-question', $question)) {
            abort(403, "Access denied");
        }

        #-- If Eloquent don't find the id with this (Question $question)
        #-- eloquent will show a 404 page

        return view("questions.edit", compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        #--- if this questions was no made by current user then abort
        if (\Gate::denies('update-question', $question)) {
            abort(403, "Access denied");
        }
        
        $question->update($request->only('title', 'body'));
        return redirect('/questions')
            ->with('success', "Your question has been updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */

    public function destroy(Question $question)
    {
        $question->delete();
        return redirect('/questions')->with('success', "Your question has been deleted.");
    }
}
