<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    protected $table = 'games';

    public function categories(){
        return $this->belongsToMany(Category::class, 'category_lists');
    }


}
