<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectMessage extends Model
{
    Public function project()
    {
        /* 
        * you must know that  through function called _get,  usr function  will be invoked
        * and create object with the same method function 
        * Eloquent determines the defualt forien key name by by examining the name
        * of the relationship method and suffixing the method name with _id.
        * However, if the forien key in the database table is user_id, you may pass a custom
        * key name as the second argument to the belongsto method;
        */
        return $this->belongsTo('App\Project', 'project_id');
    }

    Public function user()
    {
        /* 
        * you must know that  through function called _get,  usr function  will be invoked
        * and create object with the same method function 
        * Eloquent determines the defualt forien key name by by examining the name
        * of the relationship method and suffixing the method name with _id.
        * However, if the forien key in the database table is user_id, you may pass a custom
        * key name as the second argument to the belongsto method;
        */
        return $this->belongsTo('App\User', 'user_id');
    }

    public function images()
    {
        return $this->hasMany('App\MessageImage', 'message_id');
    }

    public function files()
    {
        return $this->hasMany('App\MessageFile', 'message_id');
    }
}
