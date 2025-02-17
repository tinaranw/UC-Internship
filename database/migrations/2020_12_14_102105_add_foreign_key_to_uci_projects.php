<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToUciProjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('uci_projects', function (Blueprint $table) {
            $table->unsignedBigInteger('period_id')->index()->after('category');
            $table->foreign('period_id')->references('id')->on('uci_periods');
            $table->unsignedBigInteger('supervisor_id')->index()->after('period_id');
            $table->foreign('supervisor_id')->references('id')->on('uci_users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('uci_projects', function (Blueprint $table) {
            //
        });
    }
}
