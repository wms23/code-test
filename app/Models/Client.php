<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Client
 * @package App\Models
 * @version October 25, 2021, 4:43 pm UTC
 *
 * @property string $name
 * @property string $email
 * @property integer $phone
 * @property string $address
 * @property string $photo
 */
class Client extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'clients';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'photo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'phone' => 'integer',
        'address' => 'string',
        'photo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'photo' => 'file|mimes:jpeg,png,jpg,gif,svg|max:2048'
    ];

    
}
