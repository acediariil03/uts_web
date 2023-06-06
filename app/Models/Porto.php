<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Category;

class Porto extends Model
{
    use HasFactory;
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    protected $table = 'portos';
    protected $fillable = [
        'project_name',
        'description',
        'image',
    ];
}
