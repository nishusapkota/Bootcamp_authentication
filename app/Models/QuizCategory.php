<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuizCategory extends Model
{
    use HasFactory;

    protected $fillable=[
        'title',
        'slug'
    ];

    /**
     * @return HasMany
     */
    public function quizzes():HasMany
    {
        return $this->hasMany(Quiz::class,'category_id');
    }
}
