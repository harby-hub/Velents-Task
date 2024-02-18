<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource {
    /**
     * @param Request $request
     * @return array
     */
    public function toArray( Request $request ) {
        return [
            'id'         => $this -> id         ,
            'email'      => $this -> email      ,
            'first_name' => $this -> first_name ,
            'last_name'  => $this -> last_name  ,
            'photo'      => $this -> photo      ,
        ];
    }
}
