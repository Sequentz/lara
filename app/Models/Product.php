<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Product extends Model
{
    use HasFactory, Sortable;

    public $sortable = ['id', 'product', 'brand', 'category_id', 'price'];

    protected $fillable = [
        'product', 'description', 'brand', 'category_id', 'img', 'price',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
