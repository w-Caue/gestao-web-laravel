<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\ContaResource;
use App\Models\Conta;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use function Laravel\Prompts\error;

class ContaController extends Controller
{
    use HttpResponses;

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
        $validator =  Validator::make($request->all(), [
            'pessoa_id' => 'required',
            'descricao' => 'min:4',
            'cobrador_id' => 'required',
            'tipo' => 'required|max:1',
            'data_lancamento' => 'required',
            'data_vencimento' => 'required',
            'valor_documento' => 'required',
            'user' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->error(message: 'Data Invalid', status: 422, errors: $validator->errors());
        }

        $created = Conta::create($validator->validate());

        if ($created) {
            return $this->response(message: 'Conta created', status: 200, data: new ContaResource($created->load('pessoa')));
        }
        return $this->error(message: 'Something wrong, Conta not created', status: 400);
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
        $validator =  Validator::make($request->all(), [
            'pessoa_id' => 'required',
            'descricao' => 'min:4',
            'cobrador_id' => 'required',
            'pagamento_id' => 'required',
            'data_pagamento' => 'nullable',
            'valor_pago' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return $this->error(message: 'Validation failed', status: 422, errors: $validator->errors());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
