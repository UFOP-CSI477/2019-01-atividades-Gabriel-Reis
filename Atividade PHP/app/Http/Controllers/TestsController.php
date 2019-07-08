<?php

namespace App\Http\Controllers;

use App\tests;
use Illuminate\Http\Request;

class TestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tests = Tests::all();
        //View -> Apresentar
        return view('tests.index') -> with('tests', $tests);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tests.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        testes::create($request->all());

        session()->flash('mensagem', 'Teste inserido com sucesso!');

        return redirect()->route('tests.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tests  $tests
     * @return \Illuminate\Http\Response
     */
    public function show(tests $tests)
    {
        return view('tests.show')->with('tests',$tests);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tests  $tests
     * @return \Illuminate\Http\Response
     */
    public function edit(tests $tests)
    {
         return view('tests.edit')->with('tests',$tests);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tests  $tests
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tests $tests)
    {
        $tests -> fill($request->all());

        $tests->save();

        session()->flash('mensagem', 'Teste atualizado com sucesseo!');
        return redirect()->route('tests.show',$tests->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tests  $tests
     * @return \Illuminate\Http\Response
     */
    public function destroy(tests $tests)
    {
        $tests->delete();
        session()->flash('mensagem', 'Teste excluido com sucesseo!');
        return redirect()->route('tests.index');
    }
}
