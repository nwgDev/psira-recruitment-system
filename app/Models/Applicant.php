<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Applicant extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'post_id',
        'qualification_id',
        'drivers_license',
        'current_position',
        'company_name',
        'number_year_employed',
        'current_annual_salary_ctc',
        'previous_position',
        'previous_company',
        'period_from',
        'period_to',
        'total_experience_in_years',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function qualification(): BelongsTo
    {
        return $this->belongsTo(Qualification::class);
    }

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
