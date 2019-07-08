<?php

namespace App\Http\Controllers;

use App\Procedure;
use App\Test;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function __construct(){
        $this->middleware('auth', ['except'=>['index']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        $procedure = Procedure::all();
        $test = Test::orderBy('date','desc')->get();
        $price = 0;
        $count = 0;
        return view('tests.index')->with('tests',$test)->with('procedures',$procedure)->with('users',$user)->with('price',$price)->with('count',$count);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->type == 1||auth::user()->type == 3){
            $user = User::all();
            $procedure = Procedure::all();
            $test = Test::all();
            return view('tests.create')->with('procedures',$procedure)->with('users',$user)->with('tests',$test);
        }
        else
            return redirect()->route('login'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->type == 1){
            Test::create($request->all());
            session()->flash('mensagem', 'Exame inserido com sucesso!');
            return redirect()->route('tests.index');
        }
        else if(auth::user()->type == 3){
            Test::create($request->all());
            session()->flash('mensagem', 'Exame inserido com sucesso!');
            return redirect()->route('tests.index');
        }
        else
            return redirect()->route('login'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tests  $tests
     * @return \Illuminate\Http\Response
     */
    public function show(Test $test)
    {
        $user = User::all();
        $procedure = Procedure::all();
        return view('tests.show')->with('test',$test)->with('procedures',$procedure)->with('users',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tests  $tests
     * @return \Illuminate\Http\Response
     */
    public function edit(Test $test)
    {
        if(Auth::user()->type == 1||Auth::user()->type == 3){
            $user = User::all();
            $procedure = Procedure::all();
            return view('tests.edit')->with('test',$test)->with('procedures',$procedure)->with('users',$user);
        }
        else
            return redirect()->route('login'); 
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tests  $tests
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Test $test)
    {
        if(Auth::user()->type == 1||Auth::user()->type == 3){
            $test -> fill($request->all());
            $test->save();
            session()->flash('mensagem', 'Exame atualizado com sucesseo!');
            return redirect()->route('tests.show',$test->id);
        }
        else
            return redirect()->route('login'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tests  $tests
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test $test)
    {
        if(Auth::user()->type == 1||Auth::user()->type == 3){
            $test->delete();
            session()->flash('mensagem', 'Exame excluido com sucesseo!');
            return redirect()->route('tests.index');
        }
        else
            return redirect()->route('login'); 
        
    }

}

