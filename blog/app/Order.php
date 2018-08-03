<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'title',

        'body',

        'client',

        'email',

        'attached_file',

        'remember_token'
    ];
}
