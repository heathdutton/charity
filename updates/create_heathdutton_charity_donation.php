<?php namespace HeathDutton\Charity\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateHeathduttonCharityDonation extends Migration
{
    public function up()
    {
        Schema::create('heathdutton_charity_donation', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('org_id')->unsigned()->index();
            $table->integer('amount')->nullable()->unsigned()->index();
            $table->integer('user_id')->nullable()->unsigned()->index();
            $table->timestamp('created_at')->nullable()->index();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('heathdutton_charity_donation');
    }
}
