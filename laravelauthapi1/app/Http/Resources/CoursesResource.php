<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CoursesResource extends JsonResource
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
            'type' => 'Courses',
            'title' => $this->title,
            'description' =>$this->description,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'instructor firstname' => $this->instructor->firstname,
            'instructor lastname' => $this->instructor->lastname
        ];
    }
}
