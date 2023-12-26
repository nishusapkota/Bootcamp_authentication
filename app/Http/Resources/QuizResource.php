<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuizResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'category_id' => $this->category_id,
            'thumbnail' => asset($this->thumbnail),
            'description' => $this->description,
            'time' => $this->time,
            'retry_after' => $this->retry_after,
            'status' => $this->status,
            'question_id' => $this->question_id,
        ];
    }
}
