<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'users';
    
    static public function getSingle($id){
        return Role::find($id);
    }

    static public function getRecord(){
        return Role::get();
    }
}
