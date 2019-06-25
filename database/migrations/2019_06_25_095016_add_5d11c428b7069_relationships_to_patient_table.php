<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5d11c428b7069RelationshipsToPatientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patients', function(Blueprint $table) {
            if (!Schema::hasColumn('patients', 'zone_id')) {
                $table->integer('zone_id')->unsigned()->nullable();
                $table->foreign('zone_id', '318297_5d11c4246e6c2')->references('id')->on('contact_companies')->onDelete('cascade');
                }
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('patients', function(Blueprint $table) {
            
        });
    }
}
