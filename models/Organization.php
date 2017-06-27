<?php namespace HeathDutton\Charity\Models;

use Model;

/**
 * Model
 */
class Organization extends Model
{
    use \October\Rain\Database\Traits\Validation;

    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];

    /**
     * Validation
     *
     * @todo - URL validation
     */
    public $rules = [
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'heathdutton_charity_org';

    /**
     * Provide a dropdown list of all active Organizations.
     *
     * @param $value
     * @param $formData
     * @return array
     */
    public static function getOrgIdOptions($value, $formData)
    {
        $orgs = self::whereNull('deleted_at')
            ->orderBy('name', 'desc')
            ->select('id', 'name')
            ->get();

        $result = [
            '' => '-- None Selected --'
        ];
        foreach ($orgs as $id => $org) {
            $result[$id] = $org->name;
        }
        return $result;
    }

}