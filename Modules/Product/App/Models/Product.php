<?php
namespace Modules\Product\App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = array(
        'name',
        'description',
        'price',
        'category_id',
     );

    // protected static function newFactory(): ProductFactory
    // {
    //     //return ProductFactory::new();
    // }
}
