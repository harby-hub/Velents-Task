<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

abstract class AppRepository {

    abstract protected function query( ) ;

    /**
     * get all the items collection from database table using model.
     *
     * @return Collection of items.
     */
    public function get( )  {
        return get_class( $this -> query( ) -> get( ) ) ;
    }

    /**
     * get collection of items in paginate format.
     *
     * @param array $data
     * @return Collection of items.
     */
    public function paginate( array $data ) : LengthAwarePaginator {
        return  $this -> query( ) -> paginate( $data [ 'first' ] ?? 15 ) ;
    }

    /**
     * create new record in database.
     *
     * @param array $data
     * @return saved model object with data.
     */
    public function store( array $data ) : Model {
        return $this -> transaction( fn( ) => $this -> query( ) -> create( $this -> setDataPayload( $data ) ) ) ;
    }

    /**
     * update existing item.
     *
     * @param Model $Model
     * @param array $data
     * @return send updated item object.
     */
    public function update( Model $Model , array $data ) :? Model {
        $this -> transaction( fn( ) => $Model -> update( $this -> setDataPayload( $data ) ) ) ;
        return $Model ;
    }

    /**
     * destroy item by primary key id.
     *
     * @param  Model $Model
     * @return int
     */
    public function destroy( Model $Model ) : int {
        return $this -> transaction( fn( ) => $Model -> delete( ) ) ;
    }

    /**
     * set data for saving
     *
     * @param  array $data
     * @return array of data.
     */
    protected function setDataPayload( array $data ) {
        return $data ;
    }

    /**
     * try and catch transaction
     *
     * @param \Closure $callback
     */
    public function transaction( \Closure $callback ) {
        DB::beginTransaction( ) ;
        try {
            $result = $callback( );
            DB::commit( );
        }
        catch ( \Exception $e ) {
            DB::rollBack( );
            throw $e;
        } catch ( \Throwable $e ) {
            DB::rollBack( );
            throw $e;
        }
        return $result;
    }

}
