<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Customer
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $city
 * @property string $address
 * @property string $phone
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $middle_name
 * @method static \Illuminate\Database\Query\Builder|\App\Customer whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Customer whereFirstName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Customer whereLastName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Customer whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Customer whereCity($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Customer whereAddress($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Customer wherePhone($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Customer whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Customer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Customer whereMiddleName($value)
 * @mixin \Eloquent
 */
class Customer extends Model
{
    protected $fillable = ['*'];
}
