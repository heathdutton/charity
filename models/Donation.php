<?php namespace HeathDutton\Charity\Models;

use Model;

/**
 * Model
 */
class Donation extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    /*
     * Validation
     */
    public $rules = [
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'heathdutton_charity_donation';

    /**
     * Provide a dropdown of all active Organizations for donation editing.
     *
     * @param $value
     * @param $formData
     * @return array
     */
    public function getOrgIdOptions($value, $formData)
    {
        return \HeathDutton\Charity\Models\Organization::getOrgIdOptions($value, $formData);
    }
}