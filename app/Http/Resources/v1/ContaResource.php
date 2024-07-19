<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    private array $types = ['R' => 'Receber', 'P' => 'Pagar'];

    public function toArray(Request $request): array
    {
        return [
            'pessoa' => [
                'nome' => $this->pessoa->nome,
                'telefone' => $this->pessoa->telefone,
                'status' => $this->pessoa->tipo . ' ' . $this->pessoa->status,
            ],
            'descricao' => $this->descricao,
            'tipo' => 'Conta a' . ' ' . $this->types[$this->tipo],
            'valor' => 'R$' . '' . number_format($this->valor_documento, 2, ',', '.'),
        ];
    }
}
