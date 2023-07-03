<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public static function getPostsCountByCategory($id)
    {
        return self::where('category_id', $id)->count();
    }

    public static function getSoftDeletedPosts()
    {
        return self::onlyTrashed()->get();
    }
}
