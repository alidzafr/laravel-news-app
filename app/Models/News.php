<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $guarded = []; // to tell laravel is ok don't guard anything

    
    /**
    * Get the user that owns the News
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany

    */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
