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

    public function thumbnail(): Attribute
    {
        return Attribute::make(
            get:function ($value) {
                if(is_string($value)){

                    if(filter_var($value, FILTER_VALIDATE_URL)){
                        return $value;
                    }

                    return Storage::disk('public')->url($value);
                }
            }
        );
    }
    
}
