<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CaseofficerResource extends JsonResource
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
                'id' => $this->id,
                'text' => $this->name." (".$this->email.")",
                'contact'  => $this->contact,
                'email'  => $this->email,
            ];
        }
        return parent::toArray($request);
    }
}
