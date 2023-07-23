<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Http\Requests\StorePersonaRequest;
use App\Http\Requests\UpdatePersonaRequest;
use Faker\Provider\ar_EG\Person;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePersonaRequest $request)
    {
        view('users.store');
    }

    /**
     * Display the specified resource.
     */
    public function show(Persona $persona)
    {
        $personas=new Persona();
        $personas = Persona::findorFail($persona) ;
        view('users.show', compact('personas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Persona $persona)
    {
        view('users.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePersonaRequest $request, Persona $persona)
    {
        view('users.update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Persona $persona)
    {
        //
    }
}
