<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MealResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->translation->title,
            'description' => $this->translation->description,
            'status' => !empty($request->diff_time) ? $this->status($request->diff_time) : null,
            'category' => new CategoryResource($this->category), // when having one element then use new resource, beacsuse it's not collection
            'tags' => TagResource::collection($this->tags),
        ];
    }

    public function status($diff_time)
    {
        $status = $this->translation->status;

        if ($this->updated_at > $this->created_at) {
            $status = 'modified';
        }
        
        if (!empty(strtotime($this->deleted_at))) {
            $status = 'deleted';
        }

        return $status;
    }
}
