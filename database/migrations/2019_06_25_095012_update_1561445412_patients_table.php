<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1561445412PatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patients', function (Blueprint $table) {
            if(Schema::hasColumn('patients', 'hospital_id')) {
                $table->dropColumn('hospital_id');
            }
            if(Schema::hasColumn('patients', 'zone_id')) {
                $table->dropColumn('zone_id');
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
        Schema::table('patients', function (Blueprint $table) {
                        $table->string('hospital_id')->nullable();
                $table->string('zone_id')->nullable();
                
        });

    }
}
