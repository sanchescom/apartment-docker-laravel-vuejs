<?php

namespace App\Models;

use App\Models\Collections\ApartmentsCollection;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Apartment
 *
 * @property int $id
 * @property Carbon $move_in_date
 * @property Carbon $created_at
 * @property string $street
 * @property string $post_code
 * @property string $city
 * @property string $country
 * @property string $email
 * @property string $token
 *
 * @method static Apartment findOrFail($id, $columns = [])
 *
 * @package App\Models
 */
class Apartment extends Model
{
    protected $fillable = [
        'move_in_date',
        'street',
        'post_code',
        'city',
        'country',
        'email',
    ];

    protected $hidden = [
        'token',
    ];

    protected $dates = [
        'move_to_date',
        'created_at',
    ];


    public function newCollection(array $models = []) : ApartmentsCollection
    {
        return new ApartmentsCollection($models);
    }


    public function getResponseData() : array
    {
        return $this->toArray();
    }


    /**
     * Get apartment by token
     *
     * @param $token
     * @return Apartment|\Illuminate\Database\Eloquent\Builder|Model
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public static function getByToken($token)
    {
        return self::query()->where('token', $token)->firstOrFail();
    }


    public static function createFromArray(array $array) : Apartment
    {
        $instance = self::create($array);
        $instance->token = str_random(40);

        return $instance;
    }
}