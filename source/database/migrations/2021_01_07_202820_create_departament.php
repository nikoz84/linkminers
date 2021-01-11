<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateDepartament extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->uuid('departmentId');
            $table->string('name');
            $table->string('ubigeoCode');
            $table->string('status')->default('DRAFT');
            $table->timestampTz('lastModifiedDate')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestampTz('createdDate')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('createdUser');
            $table->string('lastModifiedUser');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departments');
    }
}
