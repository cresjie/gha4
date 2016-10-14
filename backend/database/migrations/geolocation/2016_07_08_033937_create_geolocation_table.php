<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeolocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        if( !Schema::hasTable('geolocation') ) {

            Schema::create('geolocation', function(Blueprint $table) {

                $table->engine = 'InnoDB';
                $table->increments('id');

                $table->unsignedInteger('trackable_id');
                $table->string('trackable_type');

                $table->decimal('lat', 21, 17);
                $table->decimal('lng', 21, 17);

                $table->string('formatted_address');
                $table->string('locality');
                $table->string('administrative_area_level_2');
                $table->string('administrative_area_level_1');
                $table->string('postal_code');
                $table->string('country');

                $table->timestamps();
            });
            
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
