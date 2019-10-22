<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\MotorImage
 *
 * @property int $id
 * @property int $motor_id Table = user_motors, Column = id
 * @property string $url
 * @property string|null $caption
 * @property int|null $size
 * @property string|null $mine_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\UserMotor $motor
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MotorImage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MotorImage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MotorImage query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MotorImage whereCaption($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MotorImage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MotorImage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MotorImage whereMineType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MotorImage whereMotorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MotorImage whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MotorImage whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MotorImage whereUrl($value)
 * @mixin \Eloquent
 */
class MotorImage extends Model
{
    protected $fillable = [
        'motor_id',
        'url',
        'caption',
        'size',
        'mine_type',
    ];

    public function motor()
    {
        return $this->belongsTo(UserMotor::class, 'motor_id', 'id');
    }
}
