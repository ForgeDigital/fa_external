<?php

namespace Domain\Shared\Models;

use Domain\Shared\Models\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use HasFactory, SoftDeletes, HasUuid;

    protected $guarded = ['id'];

    protected $fillable = [
        'resource_id',
        'name',
        'iso3',
        'iso2',
        'phonecode',
        'capital',
        'currency',
        'currency_symbol',
        'tld',
        'native',
        'region',
        'subregion',
        'timezones',
        'translations',
        'latitude',
        'longitude',
        'emoji',
        'emojiU',
        'status',
        'flag',
        'wikiDataId'
    ];

    public function getRouteKeyName(): string
    {
        return 'resource_id';
    }
}
