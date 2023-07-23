<?php

namespace App\Http\Controllers;

use App\Models\Persona_producto;
use App\Http\Requests\StorePersona_productoRequest;
use App\Http\Requests\UpdatePersona_productoRequest;
use App\Models\Persona;

class PersonaProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.users');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePersona_productoRequest $request)
    {
        /* $persona = new Persona;

        $persona->personas_id=$request->personas_id;

        $persona->save(); */
    }

    /**
     * Display the specified resource.
     */
    public function show(Persona_producto $persona_producto)
    {
        /* $persona = new Persona;

        $persona = find::all(); */
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Persona_producto $persona_producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePersona_productoRequest $request, Persona_producto $persona_producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Persona_producto $persona_producto)
    {
        //
    }
}
