<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UsersDemoResource extends JsonResource
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
            'id' => $this->_id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'gender' => $this->gender,
            'hob' => $this->hob,
            'state' => $this->state['state'],
            'city' => $this->city['city'],
            'npa_date' => $this->npa_date,
            'file' => $this->file,
            'statesdata' => [
                'value' => $this->state['id'],
                'label' => $this->state['state']
            ]
        ];
    }
}
