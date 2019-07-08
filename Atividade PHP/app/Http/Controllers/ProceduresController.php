<?php

namespace App\Http\Controllers;

use App\procedures;
use Illuminate\Http\Request;

class ProceduresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Model -> Recuperação de dados
        $procedures = Procedures::all();
        //View -> Apresentar
        return view('procedures.index') -> with('procedures', $procedures);
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
        Procedures::create($request->all());

        session()->flash('mensagem', 'procedimento inserido com sucesso!');

        return redirect()->route('procedures.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\procedures  $procedures
     * @return \Illuminate\Http\Response
     */
    public function show(procedures $procedures)
    {
        return view('procedures.show')->with('procedures',$procedures);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\procedures  $procedures
     * @return \Illuminate\Http\Response
     */
    public function edit(procedures $procedures)
    {
         return view('procedures.edit')->with('procedures',$procedures);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\procedures  $procedures
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, procedures $procedures)
    {
        $procedures -> fill($request->all());

        $procedures->save();

        session()->flash('mensagem', 'procedimento atualizado com sucesseo!');
        return redirect()->route('procedures.show',$procedures->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\procedures  $procedures
     * @return \Illuminate\Http\Response
     */
    public function destroy(procedures $procedures)
    {
        $procedures->delete();
        session()->flash('mensagem', 'Procedimento excluido com sucesseo!');
        return redirect()->route('procedures.index');
    }
}
