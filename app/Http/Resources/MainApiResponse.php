<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MainApiResponse extends JsonResource
{
    public function __construct(

    ) {}

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($data=null,$error=False,$Message="")
    {
        return parent::toArray(["error"=> $error,"message"=>$Message,"data"=>$data]);
    }
}
