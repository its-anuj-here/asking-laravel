<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        'que_cat_id',
        'que_title',
        'que_desc',
        'que_votes',
        'que_views',
        'user_id'
    ];
}
