<?php

namespace App\Models;

use App\Models\QuestionCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable=[
        "title",
        "category_id",
        "slug",
        "description",
        "options",
        "answer",
        "status",
        "weightage"
    ];

    /**
     * @var array
     */
    protected $casts = [
        'options' => "json"
    ];

    /**
     * @return BelongsTo
     */
    public function category():BelongsTo
    {
        return $this->belongsTo(QuestionCategory::class,'category_id');
    }
}
