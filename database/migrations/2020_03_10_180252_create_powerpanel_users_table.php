<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePowerpanelUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('powerpanel_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('fkRoleId')->index()->unsigned()->nullable();
            $table->integer('fkCateId')->index()->unsigned()->nullable();
            $table->integer('is_active')->default(0);
            $table->string('varName');
            $table->string('varEmail');
            $table->string('varPersonalEmail');
            $table->string('varPassword');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('powerpanel_users');
    }
}
