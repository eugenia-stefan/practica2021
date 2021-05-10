<?php

class UserData extends Model
{
    protected $table = 'users_info';
    protected $fillable = [
        'type','name', 'email'
    ];
}