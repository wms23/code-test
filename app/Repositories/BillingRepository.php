<?php

namespace App\Repositories;

use App\Models\Billing;
use App\Repositories\BaseRepository;

/**
 * Class BillingRepository
 * @package App\Repositories
 * @version October 25, 2021, 4:50 pm UTC
*/

class BillingRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'amount',
        'due_date',
        'description'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Billing::class;
    }
}
