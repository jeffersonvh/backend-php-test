<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Produto extends JsonResource
{
    
    public function toArray($request){
    //return parent::toArray($request);
        return [
            'id' => $this->id,
            'codigo' => $this->codigo,
            'nome' => $this->nome,
            'preco' => $this->preco,
            'qty' => $this->qty,
            'marca' => $this->marca,
        ];
    }
    
}
