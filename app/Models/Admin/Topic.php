<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'title',
        'title_unicode',
        'desc',
        'desc_unicode',
        'icon',
        'slug',
        'active',
        'created_by'
    ];

    public function Questions()
    {
        return $this->hasMany(Question::class);
    }
}
