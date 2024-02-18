<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UpdateRequest extends FormRequest{

    public function authorize( ) : bool {
        return true ;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules( ) : array {
        return [
            'email'      => [ 'required' , 'email'  , 'unique:users,email' ] ,
            'first_name' => [ 'required' , 'string' , 'min:3' , 'max:255'  ] ,
            'last_name'  => [ 'required' , 'string' , 'min:3' , 'max:255'  ] ,
            'photo'      => [ 'required' , 'file'   , 'mimes:jpeg,jpg,png' ] ,
            'password'   => [ 'required' , Password::min( 8 ) -> letters( ) -> mixedCase( ) -> numbers( ) ] ,
        ]; ;
    }

}
