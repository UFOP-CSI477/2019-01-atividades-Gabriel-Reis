<?php

namespace App\Http\Controllers;

use App\users;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Users::all();
        //View -> Apresentar
        return view('users.index') -> with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Users::create($request->all());

        session()->flash('mensagem', 'Usuário inserido com sucesso!');

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tests  $tests
     * @return \Illuminate\Http\Response
     */
    public function show(users $users)
    {
        return view('users.show')->with('users',$users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tests  $teuserssts
     * @return \Illuminate\Http\Response
     */
    public function edit(users $users)
    {
         return view('users.edit')->with('users',$users);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tests  $tests
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, users $users)
    {
        $users -> fill($request->all());

        $users->save();

        session()->flash('mensagem', 'Usuário atualizado com sucesseo!');
        return redirect()->route('users.show',$users->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tests  $tests
     * @return \Illuminate\Http\Response
     */
    public function destroy(tests $users)
    {
        $users->delete();
        session()->flash('mensagem', 'Usuário excluido com sucesseo!');
        return redirect()->route('users.index');
    }
}

