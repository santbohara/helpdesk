<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        // 'id'
        'topic_id',
        'title',
        'title_unicode',
        'slug',
        'active',
        'views',
        'answer',
        'created_by',
    ];

    public function Topic()
    {
        return $this->belongsTo(Topic::class);
    }
}
