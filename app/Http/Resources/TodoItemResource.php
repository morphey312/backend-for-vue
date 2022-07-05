<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class TodoItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $daysOfWeek = Carbon::getDays();
        return [
          'id' => $this->id,
          'description' => $this->description,
          'day_of_week' => $this->day_of_week,
          'day_name' => $daysOfWeek[$this->day_of_week],
          'created_at' => $this->created_at,
          'updated_at' => $this->updated_at,
        ];
    }
}
