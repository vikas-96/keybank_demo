<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BorrowerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if($request->has('q')){
            return [
                'value' => $this->id,
                'label' => $this->cif." (".$this->name.")",
                'name' => $this->name
            ];
        }
        return parent::toArray($request);
    }
}
