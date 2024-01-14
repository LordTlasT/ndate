<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FAQPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'answer',
        'category_id',
    ];

    protected $table = 'faq_posts';

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
