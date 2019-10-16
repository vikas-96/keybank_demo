<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
                'text' => $this->firstname." ".$this->lastname,
            ];
        }

        return [
            'id' => $this->id,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'contact_number' => $this->contact_number,
            'email' => $this->email,
            'is_active' => $this->is_active,
            'role' => $this->getRoleNames()->first(),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
