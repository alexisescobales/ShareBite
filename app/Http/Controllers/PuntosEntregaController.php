<?php

namespace App\Http\Controllers;

use App\Models\puntos_entrega;
use App\Http\Controllers\Controller;
use App\Http\Requests\Storepuntos_entregaRequest;
use App\Http\Requests\Updatepuntos_entregaRequest;

class PuntosEntregaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\Storepuntos_entregaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storepuntos_entregaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\puntos_entrega  $puntos_entrega
     * @return \Illuminate\Http\Response
     */
    public function show(puntos_entrega $puntos_entrega)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\puntos_entrega  $puntos_entrega
     * @return \Illuminate\Http\Response
     */
    public function edit(puntos_entrega $puntos_entrega)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatepuntos_entregaRequest  $request
     * @param  \App\Models\puntos_entrega  $puntos_entrega
     * @return \Illuminate\Http\Response
     */
    public function update(Updatepuntos_entregaRequest $request, puntos_entrega $puntos_entrega)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\puntos_entrega  $puntos_entrega
     * @return \Illuminate\Http\Response
     */
    public function destroy(puntos_entrega $puntos_entrega)
    {
        //
    }
}
