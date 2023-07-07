<?php

declare(strict_types=1);

namespace App\Models\Customer;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Token extends Model
{
    protected $guarded = ['id'];

    protected $fillable = [
        'customer_id',
        'email',
        'token',
        'token_expiration_date',
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
