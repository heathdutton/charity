<?php namespace HeathDutton\Charity\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateHeathduttonCharityUser extends Migration
{
    public function up()
    {
        Schema::create('heathdutton_charity_user', function ($table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('org_id')->unsigned()->index();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('heathdutton_charity_user');
    }
}
