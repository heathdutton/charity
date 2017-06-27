<?php namespace HeathDutton\Charity\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateHeathduttonCharityOrg extends Migration
{
    public function up()
    {
        Schema::create('heathdutton_charity_org', function ($table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name', 255)->nullable()->index();
            $table->string('home_url', 1024)->nullable();
            $table->string('logo_url', 1024)->nullable();
            $table->boolean('donation_support')->default(0)->index();
            $table->string('donation_url', 1024)->nullable();
            $table->boolean('donation_iframe')->default(0);
            $table->string('bbb_url', 1024)->nullable();
            $table->boolean('bbb_accredited')->default(0)->index();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('heathdutton_charity_org');
    }
}
