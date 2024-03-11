<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'job_description',
        'business_unit',
        'manager_name',
        'manager_email',
        'required_experience_in_years',
        'qualification_id',
        'drivers_license',
        'opening_date',
        'closing_date',
    ];

    public static array $businessUnitOptions = [
        'ICT', 'Human Capital', 'Law Enforcement', 'Finance'
    ];

    public static array $driversLicenseOptions = [
        'No' => 0,
        'Yes' => 1
    ];

    public function qualification(): BelongsTo
    {
        return $this->belongsTo(Qualification::class);
    }

    public function applicants(): HasMany
    {
        return $this->hasMany(Applicant::class);
    }
}
