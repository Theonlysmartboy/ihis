<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1561444945PatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patients', function (Blueprint $table) {
            
if (!Schema::hasColumn('patients', 'name')) {
                $table->string('name')->nullable();
                }
if (!Schema::hasColumn('patients', 'conatct')) {
                $table->string('conatct')->nullable();
                }
if (!Schema::hasColumn('patients', 'hospital_id')) {
                $table->string('hospital_id')->nullable();
                }
if (!Schema::hasColumn('patients', 'zone_id')) {
                $table->string('zone_id')->nullable();
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
            $table->dropColumn('name');
            $table->dropColumn('conatct');
            $table->dropColumn('hospital_id');
            $table->dropColumn('zone_id');
            
        });

    }
}
