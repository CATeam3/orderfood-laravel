<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MenuResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
//        $categories = CategoryResource::collection($this->categories);
//
//        return [
//            'id' => $this->id,
//            'title' => $this->title,
//            'categories' => $categories
//        ];
    }
}