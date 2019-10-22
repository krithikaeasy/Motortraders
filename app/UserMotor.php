<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\UserMotor
 *
 * @property int $id
 * @property int $user_id Table = users, Column = id
 * @property string $model_name
 * @property string $reg_number
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserMotor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserMotor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserMotor query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserMotor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserMotor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserMotor whereModelName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserMotor whereRegNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserMotor whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserMotor whereUserId($value)
 * @mixin \Eloquent
 * @property string|null $type
 * @property string|null $manufacture
 * @property float|null $millage
 * @property string|null $cc
 * @property string|null $year
 * @property string|null $colour
 * @property float|null $price
 * @property string|null $description
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $motorImages
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserMotor whereCc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserMotor whereColour($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserMotor whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserMotor whereManufacture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserMotor whereMillage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserMotor wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserMotor whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserMotor whereYear($value)
 * @property-read int|null $motor_images_count
 */
class UserMotor extends Model
{
    protected $fillable = [
        'user_id',
        'type',
        'manufacture',
        'model_name',
        'reg_number',
        'millage',
        'cc',
        'year',
        'colour',
        'price',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function motorImages()
    {
        return $this->hasMany(MotorImage::class, 'motor_id', 'id');
    }
}
