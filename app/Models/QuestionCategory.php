<?php

namespace App\Models;

use App\Models\Quiz;
use App\Models\Question;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuestionCategory extends Model
{
    use HasFactory,SoftDeletes;

    /**
     * @var array
     */
    protected $fillable = [
        'title',
        'slug'
    ];

    /**
     * @return HasMany
     */
    public function questions(): HasMany
    {
        return $this->hasMany(Question::class,'category_id');
    }

}
