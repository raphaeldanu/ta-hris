<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SalaryRange extends Model
{
    use HasFactory;

    protected $fillable = [
        'level_id',
        'name',
        'base_salary',
    ];

    /**
     * Get the level that owns the SalaryRange
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function level(): BelongsTo
    {
        return $this->belongsTo(Level::class);
    }
}
