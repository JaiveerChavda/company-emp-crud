<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Storage;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['first_name','last_name','profile','company_id','department_id','designation_id'];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function designation(): BelongsTo
    {
        return $this->belongsTo(Designation::class);
    }

    public function profile(): Attribute
    {
        return Attribute::make(
            get:function ($value) {
                if(isset($value) && is_string($value)){

                    if(filter_var($value, FILTER_VALIDATE_URL)){
                        return $value;
                    }

                    return Storage::disk('public')->url($value);
                }

                // return default in case of image is not set/uploaded
                return 'https://via.placeholder.com/640x480.png/0055ff?text=consequatur';
            }
        );
    }


}
