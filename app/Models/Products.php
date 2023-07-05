<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Products extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = [
        'name',
        'stock',
        'slug',
        'category'
    ];

    public function category(): HasOne
    {
        return $this->hasOne(Categories::class);
    }
}
