<?php

namespace App\Http\Resources\Post;

use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // memodifikasi field-field apa saja yang dikembalikan ketika ada request
        // kita juga bisa menambahkan field baru yang tidak ada di dalam table Post awal (misalnya stored_at) dengan memformat suatu field yang sudah ada
        return [
            'title' => $this->title,
            'body' => $this->body,
            'stored_at' => $this->created_at->diffForHumans(),
            // 'user' => $this->user
            'user' => new UserResource($this->user),
            'comments' => $this->comments
        ];
    }
}
