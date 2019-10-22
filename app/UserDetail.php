<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\UserDetail
 *
 * @property int $id
 * @property int $user_id Table = users, Column = id
 * @property string $first_name
 * @property string|null $last_name
 * @property string|null $state
 * @property string|null $district
 * @property string|null $address
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserDetail whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserDetail whereDistrict($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserDetail whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserDetail whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserDetail whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserDetail whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserDetail whereUserId($value)
 * @mixin \Eloquent
 */
class UserDetail extends Model
{
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'state',
        'district',
        'address',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
