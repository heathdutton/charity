<?php namespace Heathdutton\Charity\Components;

use Cms\Classes\ComponentBase;
use HeathDutton\Charity\Models\Organization as OrganizationModel;

class Organization extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Organization Component',
            'description' => 'Adds an organization overview to the page.'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function organization()
    {
        $slug = $this->param('organization_slug');
        $organization = OrganizationModel::where('slug', $slug)->first();
        if ($organization) {
            return ['org found'];
        }
        return ['hi there'];
    }

}
