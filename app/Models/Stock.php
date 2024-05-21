<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';

    protected $collection = 'stocks';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
}
