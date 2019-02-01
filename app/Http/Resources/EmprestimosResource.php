<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use\App\Emprestimo;

class EmprestimosResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'status'=>$this->status,
        ];
    }
}
