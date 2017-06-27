<?php namespace HeathDutton\Charity\Models;

use Model;

/**
 * Model
 */
class User extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * Validation
     */
    public $rules = [
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'heathdutton_charity_user';

    /**
     * @var array Relations
     */
    public $belongsTo = [
        'user' => ['RainLab\User\Models\User']
    ];

    /**
     * Get the Organization for a particular user.
     *
     * @param $user
     * @return static
     */
    public static function getFromUser($user)
    {
        if ($user->org) {
            return $user->org;
        }

        $org = new static;
        $org->user = $user;
        $org->save();

        $user->org = $org;
        return $org;
    }

    /**
     * Provide a dropdown of all active Organizations for User administration.
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