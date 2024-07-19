<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\ContaResource;
use App\Models\Conta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ContaResource::collection(Conta::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator =  Validator::make($request->all() , [
            'pessoa_id' => 'required',
            'cobrador_id' => 'required',
            'tipo' => 'required|max:1',
            'data_lancamento' => 'required',
            'data_vencimento' => 'required',
            'valor_documento' => 'required',
            'user' => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Conta $conta)
    {
        return new ContaResource($conta);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
