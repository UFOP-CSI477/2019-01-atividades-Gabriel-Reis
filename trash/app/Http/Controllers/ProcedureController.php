<?php

namespace App\Http\Controllers;

use App\Procedure;
use Illuminate\Http\Request;

class ProcedureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Model -> Recuperação de dados
        $procedures = procedures::all();
        //View -> Apresentar
        return view('procedures.index') -> with('procedures', $procedure);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('procedures.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Procedure::create($request->all());

        session()->flash('mensagem', 'procedimento inserido com sucesso!');

        return redirect()->route('procedures.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\procedures  $procedures
     * @return \Illuminate\Http\Response
     */
    public function show(procedures $procedure)
    {

        // $procedures = Procedures::findOrFail(1);
        return view('procedures.show')->with('procedures',$procedure);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\procedures  $procedures
     * @return \Illuminate\Http\Response
     */
    public function edit(procedures $procedure)
    {
         return view('procedures.edit')->with('procedures',$procedure);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\procedures  $procedures
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Procedures $procedure)
    {
        $procedure -> fill($request->all());

        $procedure->save();

        session()->flash('mensagem', 'procedimento atualizado com sucesseo!');
        return redirect()->route('procedures.show',$procedure->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\procedures  $procedures
     * @return \Illuminate\Http\Response
     */
    public function destroy(procedures $procedure)
    {
        $procedure->delete();
        session()->flash('mensagem', 'Procedimento excluido com sucesseo!');
        return redirect()->route('procedures.index');
    }
}
