<?php

namespace App\Http\Controllers;

use App\Http\Requests\AskQuestionRequest;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected array $_data=[];
    public function index()
    {
        $questions = Question::with('user')->latest()->paginate(10);
        return view('questions.index',['questions'=>$questions]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $question = new Question();
        return view('questions.create',['question'=>$question]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AskQuestionRequest $request)
    {
        //
        $this->_data['title'] = $request->title;
        $this->_data['body'] = $request->body;
        $request->user()->questions()->create($this->_data);
        return redirect()->route('questions.index')->with('success',"Your Question has been submitted");
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        //
    }
}
