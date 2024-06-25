<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Category extends Model
{
    use HasFactory, Sortable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $sortable = ['id', 'name'];
    protected $fillable = [
        'name',
        'description',
        'image',

    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
