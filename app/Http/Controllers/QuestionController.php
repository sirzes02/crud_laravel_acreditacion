<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionCreateFormRequest;
use App\Http\Requests\QuestionUpdateFormRequest;
use App\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::all();
        return view("questions.index", ["questions" => $questions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("questions.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionCreateFormRequest $request)
    {
        $question = new Question();
        $question->factor = $request->get("factor");
        $question->titulo = $request->get("titulo");
        $question->opcCorrecta = $request->get("opcCorrecta");
        $question->opc1 = $request->get("opc1");
        $question->opc2 = $request->get("opc2");
        $question->opc3 = $request->get("opc3");

        $question->save();

        return redirect("questions");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::find($id);

        return view("questions.edit", ["question" => $question]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionUpdateFormRequest $request, $id)
    {
        $usuario = Question::find($id);

        $usuario->titulo = $request->get("titulo");
        $usuario->opcCorrecta = $request->get("opcCorrecta");
        $usuario->opc1 = $request->get("opc1");
        $usuario->opc2 = $request->get("opc2");
        $usuario->opc3 = $request->get("opc3");
        $usuario->factor = $request->get("factor");

        $usuario->update();

        return redirect("/questions");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Question::find($id)->delete();

        return response()->json();
    }
}
