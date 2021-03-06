<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Authenticate extends Model
{
    use HasFactory;

    /**
     * @var
     */
    public $id;
    public $token;
}
