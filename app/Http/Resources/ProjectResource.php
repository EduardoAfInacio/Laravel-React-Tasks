<?php

namespace App\Http\Resources;


use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"=> $this->id,
            "name"=> $this->name,
            "description"=> $this->description,
            "created_at"=> (new Carbon($this->created_at))->format("Y-m-d"),
            "due_date"=> (new Carbon($this->due_date))->format("Y-m-d"),
            "status"=> $this->status,
            "image_path"=> $this->image_path,
            "created_by"=> new UserResource($this->createdBy),
            "updated_by"=> new UserResource($this->updatedBy),
            //Ao passar dados para o front utilizando uma intancia dessa resource, apareceria
            //todas as informacoes de quem criou e quem atualizou o projeto, logo, eh necessario criar
            //uma resource para o usuario e instancia-lo aqui nos campos created e updated.
            //para controlarmos tudo que aparece.
        ];
    }
}
