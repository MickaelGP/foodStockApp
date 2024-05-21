<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\HybridRelations;

class Categorie extends Model
{
    use HasFactory, HybridRelations;

    protected $connection = 'sqlite';
    protected $guarded = [];

    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }
}
