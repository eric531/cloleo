<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLastNameToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('last_name')->nullable();
            $table->string('adresse')->nullable();
            $table->string('pays')->nullable();
            $table->string('ville')->nullable();
            $table->string('code_postal')->nullable();
            $table->string('telephone')->nullable();
            $table->string('statut')->nullable();
            $table->string('entreprise')->nullable();
            $table->string('info')->nullable();
            $table->string('famille')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn('last_name');
            $table->dropColumn('adresse');
            $table->dropColumn('pays');
            $table->dropColumn('ville');
            $table->dropColumn('code_postal');
            $table->dropColumn('telephone');
            $table->dropColumn('statut');
            $table->dropColumn('entreprise');
            $table->dropColumn('info');
            $table->dropColumn('famille');
        });
    }
}
