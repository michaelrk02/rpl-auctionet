<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthContract;

class Auctioneer extends Model implements
    AuthContract
{
    use HasFactory, Authenticatable;

    protected $table = 'auctioneer';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
}
