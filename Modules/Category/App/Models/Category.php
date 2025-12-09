<?php
namespace Modules\Category\App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model {
    use HasFactory;

    protected $connection = 'pgsql';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = array(
        'name',
        'slug',
    );

    // protected static function newFactory(): CategoryFactory
    // {
    //     //return CategoryFactory::new();
    // }
}
