<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['gallery_id','category_id', 'title', 'description', 'is_publish'];
    public function gallery():BelongsTo
    {
        return $this->belongsTo(Gallery::class);
    }

    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
