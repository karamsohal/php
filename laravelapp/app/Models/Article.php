<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    public $timestamps = false;
    use HasFactory, SoftDeletes;
    protected $fillable = [
        "name",
        "body"
    ];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
}
