<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactUsLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_us_leads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('varFname');
            $table->string('varLname');
            $table->string('varEmail');
            $table->string('varPhone');
            $table->string('varMessage');
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
        Schema::dropIfExists('contact_us_leads');
    }
}
