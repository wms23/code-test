<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Billing
 * @package App\Models
 * @version October 25, 2021, 4:50 pm UTC
 *
 * @property integer $amount
 * @property string $due_date
 * @property integer $client_id
 * @property string $description
 */
class Billing extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'billings';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'amount',
        'due_date',
        'client_id',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'amount' => 'integer',
        'due_date' => 'date',
        'client_id' => 'integer',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'amount' => 'required',
        'due_date' => 'required'
    ];

    
}
