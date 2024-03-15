<?php

namespace App\Models;

use Carbon\Carbon;
use App\Presenters\Personable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Boarder extends Model
{
    use HasFactory, SoftDeletes, Personable;

    public static array $type = ['student', 'working', 'reviewee'];

    public static array $genders = ['male', 'female', 'non-binary'];

    protected $fillable = [
        'first_name',
        'last_name',
        'nickname',
        'email',
        'contact_number',
        'fb_account_name',
        'date_of_birth',
        'provincial_address',
        'name_of_mother',
        'mother_contact',
        'name_of_father',
        'father_contact',
        'name_of_guardian',
        'guardian_contact',
        'profile_type',
        'profileable_type',
        'profileable_id',
        'profile_pic',
        'gender'
    ];

    public function profileable(): MorphTo
    {
        return $this->morphTo(__FUNCTION__, 'profileable_type', 'profileable_id');
    }

    public function contracts(): HasMany
    {
        return $this->hasMany(LeaseAgreement::class);
    }

    public function getFormattedDateOfBirthAttribute()
    {
        return Carbon::createFromFormat('Y-m-d', $this->date_of_birth)->toFormattedDateString();
    }

    public function isCurrentBoarder()
    {
        if(!$this->contracts) return false;

        foreach($this->contracts as $contract) {
            if($contract->isActive()) {
                return true;
            }
        }

        return false;
    }
}

