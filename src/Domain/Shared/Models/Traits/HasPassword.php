<?php

namespace Domain\Shared\Models\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

trait HasPassword
{
    public static function bootHasPassword(): void
    {
        //        $request->input('data.attributes.password');
        static::creating(fn (Model $model) => $model->password = Hash::make(value: 'password'));
    }
}
