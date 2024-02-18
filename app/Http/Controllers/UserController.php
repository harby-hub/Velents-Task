<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Repositories\UsersRepository;
use Illuminate\Http\{Request,JsonResponse};
use App\Http\Resources\User\{UserCollection,UserResource};
use App\Http\Requests\User\{SearchRequest,CreateRequest,UpdateRequest};


class UserController extends Controller {

    public function __construct( protected UsersRepository $repository ) { }

    /**
     * get list of all the Users.
     *
     * @param SearchRequest $request
     */
    public function index( SearchRequest $request ) : UserCollection {
        return UserCollection::make( $this -> repository -> paginate( $request -> validated( ) ) );
    }

    /**
     * store User data to database table.
     *
     * @param CreateRequest $request
     */
    public function store( CreateRequest $request ) : UserResource|JsonResponse {
        try {
            return UserResource::make( $this -> repository -> store( $request -> validated( ) ) );
        } catch ( Exception $e ) {
            return response( ) -> json( [ 'message' => $e -> getMessage( ) ] ) ;
        }
    }

    /**
     * update User data to database table.
     *
     * @param User $user
     * @param UpdateRequest $request
     */
    public function update( User $User , UpdateRequest $request ) : UserResource|JsonResponse {
        try {
            return UserResource::make( $this -> repository -> update( $User , $request -> validated( ) ) );
        } catch ( Exception $e ) {
            return response( ) -> json( [ 'message' => $e -> getMessage( ) ] ) ;
        }
    }

    /**
     * get single User
     *
     * @param User $user
     */
    public function show( User $User ) : UserResource|JsonResponse {
        try {
            return UserResource::make( $User );
        } catch ( Exception $e ) {
            return response( ) -> json( [ 'message' => $e -> getMessage( ) ] ) ;
        }
    }

    /**
     * destroy User by id.
     *
     * @param int|string $id
     */
    public function destroy( User $User ) : JsonResponse {
        try {
            return response( ) -> json( [ $this -> repository -> destroy( $User ) ] , 204 ) ;
        } catch ( Exception $e ) {
            return response( ) -> json( [ 'message' => $e -> getMessage( ) ] ) ;
        }
    }
}
