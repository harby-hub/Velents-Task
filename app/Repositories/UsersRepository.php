<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\AppRepository;
use Illuminate\Support\Facades\Hash;

class UsersRepository extends AppRepository {

    protected function query( ){
        return User::query( ) ;
    }

    /**
     * set payload data for Users table.
     *
     * @param array  $data
     * @return array of data for saving.
     */
    protected function setDataPayload( array $data ) {
        return [
            'email'      => $data[ 'email'      ] ,
            'first_name' => $data[ 'first_name' ] ,
            'last_name'  => $data[ 'last_name'  ] ,
            'photo'      => $data[ 'photo'      ] -> store( 'public/user/photos' ) ,
            'password'   => Hash::make( $data[ 'password' ] ) ,
        ];
    }
}
