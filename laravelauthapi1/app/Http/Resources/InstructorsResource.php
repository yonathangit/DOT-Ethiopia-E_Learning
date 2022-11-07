<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InstructorsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return[
            'id' => (string)$this->id,
            'type' => 'Instructor',
            'attributes' => [
                'firstname' => $this->firstname,
                'lastname' => $this->lastname,
                'email'=>$this->email,       
                'grandfathername' => $this->grandfathername,
                'gender' => $this->gender,
                'level_of_study' => $this->level_of_study,
                'field_of_study' => $this->field_of_study,
                'address' => $this->address,
                'country' => $this->country,
                'city' => $this->city,   
                'area_of_expertise' => $this->area_of_expertise,   
                'description' => $this->description,   
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at
            ]
        ];
    }
}
