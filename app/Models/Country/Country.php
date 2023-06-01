<?php

namespace App\Models\Country;

use App\Models\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Country\Country
 *
 * @property int $id
 * @property string $resource_id
 * @property string $name
 * @property string $iso3
 * @property string $iso2
 * @property string $phonecode
 * @property string $capital
 * @property string $currency
 * @property string $currency_symbol
 * @property string $tld
 * @property string|null $native
 * @property string $region
 * @property string $subregion
 * @property string $timezones
 * @property string|null $translations
 * @property string $latitude
 * @property string $longitude
 * @property string $emoji
 * @property string $emojiU
 * @property string $status
 * @property bool $flag
 * @property string|null $wikiDataId
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Country newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Country newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Country onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Country query()
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCapital($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCurrencySymbol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereEmoji($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereEmojiU($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereFlag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereIso2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereIso3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereNative($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country wherePhonecode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereRegion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereResourceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereSubregion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereTimezones($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereTld($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereTranslations($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereWikiDataId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Country withoutTrashed()
 *
 * @mixin \Eloquent
 */
class Country extends Model
{
    use HasFactory, SoftDeletes, HasUuid;

    protected $guarded = ['id'];

    protected $fillable = ['resource_id', 'name', 'iso3', 'iso2', 'phonecode', 'capital', 'currency', 'currency_symbol', 'tld', 'native', 'region', 'subregion', 'timezones', 'translations', 'latitude', 'longitude', 'emoji', 'emojiU', 'status', 'flag', 'wikiDataId'];

    public function getRouteKeyName(): string
    {
        return 'resource_id';
    }
}
