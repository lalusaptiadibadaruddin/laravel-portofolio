<?php

namespace App\Models;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Experience extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function joinProfilExperience(): BelongsTo
    {
        return $this->belongsTo(Profile::class, 'profile_id', 'id');
    }
}
