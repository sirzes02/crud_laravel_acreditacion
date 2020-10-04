<?php

namespace App\Http\Controllers;

use App\Question;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view("students.index", ["students" => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = new Student();

        $student->puntaje = 0;
        $student->resultas = "";
        $student->semana = "";
        $student->cedula = $request->get("cedula");
        $student->email = $request->get("email");
        $student->avatar = $request->get("avatar");
        $student->nombre = $request->get("nombre");
        $student->contrasenia = bcrypt($request->get("contrasenia"));
        $student->tipo = $request->get("tipo");
        $student->programa = $request->get("programa");
        $student->facultad = $request->get("facultad");
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
    }

    public function login(Request $request)
    {
        $student = Student::where('email', '=', $request->get("email"))->first();

        if (!$student) {
            return response()->json(["ingreso" => false]);
        }

        if (Hash::check($request->get("contrasenia"), $student->contrasenia)) {
            return response()->json(["ingreso" => true, "cedula" => $student->cedula, "correo" => $request->get("email"), "nombre" => $student->nombre, "avatar" => $student->avatar]);
        }

        return response()->json(["ingreso" => false]);
    }

    public function register(Request $request)
    {
        $student = Student::where('email', '=', $request->get("email"))->first();

        if (!$student) {
            $newStudent = new Student();

            $newStudent->nombre = $request->input("nombre");
            $newStudent->cedula = $request->input("cedula");
            $newStudent->email = $request->input("email");
            $newStudent->contrasenia = bcrypt($request->input("contrasenia"));
            $newStudent->tipo = "estudiante";
            $newStudent->programa = $request->input("programa");
            $newStudent->facultad = $request->input("facultad");
            $newStudent->avatar = str_replace('a', '', $request->input("avatar"));
            $newStudent->semana = "";
            $newStudent->resueltas = "";
            $newStudent->puntaje = 0;

            $newStudent->save();

            return response()->json(["status" =>  $request->input("email") . ' registrado con exito!']);
        } else {
            return response()->json(["error" => "El usuario ya existe..."]);
        }
    }

    public function resueltas(Request $request)
    {
        $student = Student::where('email', '=', $request->get("email"))->first();

        if (!$student) {
            return response()->json(["error" => "Estudiante no encontrado"]);
        }

        return response()->json(["resueltas" => $student->resueltas]);
    }

    public function resueltasUpdate(Request $request)
    {
        $student = Student::where('email', '=', $request->get("email"))->first();

        if (!$student) {
            return response()->json(["error" => "Estudiante no encontrado"]);
        }

        $student->resueltas = $student->resueltas . "-" . $request->get("id");

        $student->update();

        return response()->json(["Success" => $student->email . " fue actualizado"]);
    }

    public function semanas(Request $request)
    {
        $student = Student::where('email', '=', $request->get("email"))->first();

        if (!$student) {
            return response()->json(["error" => "Estudiante no encontrado"]);
        }

        return response()->json(["semana" => $student->semana]);
    }

    public function semanasUpdate(Request $request)
    {
        $student = Student::where('email', '=', $request->get("email"))->first();

        if (!$student) {
            return response()->json(["error" => "Estudiante no encontrado"]);
        }

        $student->semana = $request->get("semana");

        $student->update();

        return response()->json(["Success" => $student->email . " fue actualizado"]);
    }
}
