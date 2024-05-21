<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class ProductApi extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';

    protected $collection = 'product_apis';

    protected $guarded = [];
}
