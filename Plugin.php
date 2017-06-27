<?php namespace HeathDutton\Charity;

use System\Classes\PluginBase;
use RainLab\User\Models\User as UserModel;
use RainLab\User\Controllers\Users as UsersController;
use Heathdutton\Charity\Models\User as UserExtendedModel;

class Plugin extends PluginBase
{

    public $require = ['RainLab.User'];

    public function registerComponents()
    {
    }

    public function registerSettings()
    {
    }

    /**
     * Extend the User controller with our custom pivot.
     */
    public function boot()
    {
        UserModel::extend(function ($model) {
            $model->hasOne['org'] = ['HeathDutton\Charity\Models\User'];
        });

        UsersController::extendFormFields(function ($form, $model, $context) {

            if (!$model->exists || !$model instanceof Usermodel) {
                return;
            }

            UserExtendedModel::getFromUser($model);

            $form->addTabFields([
                'org[org_id]' => [
                    'label' => 'Organization',
                    'tab' => 'Charity',
                    'type' => 'dropdown'
                ]
            ]);
        });

        UsersController::extendListColumns(function ($list, $model) {
            if (!$model->exists || !$model instanceof Usermodel) {
                return;
            }

            $list->addColumns([
                'org[org_id]' => [
                    'label' => 'Organization'
                ]
            ]);
        });
    }
}
