<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['name','email','logo','address','city','country'];

    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class);
    }

    public function logo(): Attribute
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
