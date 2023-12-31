<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Quiz extends Model
{
    use HasFactory;

    protected $table='quizzes';

    protected $fillable=[
        'title',
        'slug',
        'category_id',
        'thumbnail',
        'description',
        'time',
        'retry_after',
        'status',
        'questionCategory_id'
    ];

    /**
     * @return BelongsTo
     */
    public function quizCategory():BelongsTo
    {
        return $this->belongsTo(QuizCategory::class,'category_id');
    }

    /**
     * @return HasMany
     */
    public function questionCategories():HasMany
    {
        return $this->hasMany(QuestionCategory::class,'questionCategory_id');
    }
}
