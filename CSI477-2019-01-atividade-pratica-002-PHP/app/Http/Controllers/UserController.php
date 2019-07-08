<?php

namespace App\Http\Controllers;

use App\User;
use App\Test;
use App\Procedure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

	public function __construct(){
        $this->middleware('auth', []);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	if(Auth::user()->type == 1){
    		$user = User::all();
        	return view('users.index')->with('user', $user);
        }
        else
            return redirect()->route('login');    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	if(Auth::user()->type == 1)
    		return view('users.create');
        else
            return redirect()->route('login'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
    	if(Auth::user()->type == 1){
            $user->create($request->merge(['password' => Hash::make($request->get('password'))])->all());
        	session()->flash('mensagem', 'Usuário inserido com sucesso!');
        	
            return redirect()->route('users.index');
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
    public function show(User $user)
    {
    	if(Auth::user()->type == 1){
            $procedure = Procedure::all();
            $test = Test::all();
     		return view('users.show')->with('user',$user)->with('procedures',$procedure)->with('tests',$test);
        }
        else
            return redirect()->route('login');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tests  $teuserssts
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
    	if(Auth::user()->type == 1)
        	return view('users.edit')->with('user',$user);
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
    public function update(Request $request, User $user)
    {
    	if(Auth::user()->type == 1){
            $pass = $request->get('password');
            $user->update(
            $request->merge(['password' => Hash::make($request->get('password'))])->except([$pass ? '' : 'password']));

	        $user->save();

	        session()->flash('mensagem', 'Usuário atualizado com sucesseo!');
	        return redirect()->route('users.show',$user->id);
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
    public function destroy(User $user)
    {
    	if(Auth::user()->type == 1){
            $procedures = Procedure::all();
            $tests = Test::all();
            $bool = True;
            foreach ($procedures as $proc)
                if ($proc->user_id == $user->id)                        
                    $bool = False;

            if($bool == True)
                foreach ($tests as $test)
                    if ($test->user_id == $user->id)
                        $bool = False;
                            
            if($bool == True){
	           $user->delete();
	           session()->flash('mensagem', 'Usuário excluido com sucesso!');
	           return redirect()->route('users.index');
            }
            else
                session()->flash('mensagem', 'Usuário possui exame ou proedimento e não pode ser excluido!');
                return redirect()->route('users.index');   
    	}
        else
            return redirect()->route('login');
    }
}

