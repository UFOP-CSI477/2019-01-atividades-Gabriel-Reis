<?php

namespace App\Http\Controllers;

use App\User;
use App\Test;
use App\Procedure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProcedureController extends Controller
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
        $procedure = Procedure::orderBy('name')->get();
        $user = User::all();
        return view('procedures.index') -> with('procedures', $procedure)-> with('users', $user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->type == 1)
            return view('procedures.create');
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
        if(Auth::user()->type == 1 || Auth::user()->type == 2){
        
            $request['user_id'] = Auth::user()->id;

            Procedure::create($request->all());
            session()->flash('mensagem', 'procedimento inserido com sucesso!');
            return redirect()->route('procedures.index');
        }
        else
            return redirect()->route('login'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\procedures  $procedures
     * @return \Illuminate\Http\Response
     */
    public function show(Procedure $procedure)
    {

        if(Auth::user()->type == 1 || Auth::user()->type == 2){
            $tests = Test::all();
            $user = User::all();
            return view('procedures.show')->with('procedures',$procedure)->with('users', $user)->with('tests', $tests);
        }
        else
            return redirect()->route('login');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\procedures  $procedures
     * @return \Illuminate\Http\Response
     */
    public function edit(Procedure $procedure)
    {
        if(Auth::user()->type == 1 || Auth::user()->type == 2){
            $procedure->user_id = Auth::user()->id;
            return view('procedures.edit')->with('procedure',$procedure);
        }
        else
            return redirect()->route('login');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\procedures  $procedures
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Procedure $procedure)
    {
        if(Auth::user()->type == 1){
            $procedure -> fill($request->all());
            $procedure->save();
            session()->flash('mensagem', 'procedimento atualizado com sucesseo!');
            return redirect()->route('procedures.show',$procedure->id);
        }
        else
            return redirect()->route('login');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\procedures  $procedures
     * @return \Illuminate\Http\Response
     */
    public function destroy(Procedure $procedure)
    {
        if(Auth::user()->type == 1){
            $tests = Test::all();
            $bool = True;
            foreach ($tests as $test)
                if ($test->procedure_id == $procedure->id)
                    $bool = False;
                            
            if($bool == True){
               $procedure->delete();
               session()->flash('mensagem', 'Procedimento excluido com sucesso!');
               return redirect()->route('procedures.index');
            }
            else
                session()->flash('mensagem', 'Procedimento possui exame associado e não pode ser excluido!');
                return redirect()->route('procedures.index');   
        }
        else
            return redirect()->route('login');
        
    }
}
