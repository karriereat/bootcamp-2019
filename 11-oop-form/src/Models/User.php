<?php

namespace Bootcamp\Models;

class User extends BaseModel {

    protected $table = 'users';

    public $id;
    public $username;
    public $email;
}
