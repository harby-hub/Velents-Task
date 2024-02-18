<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest{

    public function authorize( ) : bool {
        return true ;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules( ) : array {
        return [
            'first' => [ 'sometimes' , 'numeric' ] ,
            'page'  => [ 'sometimes' , 'numeric' ] ,
        ]; ;
    }

}
