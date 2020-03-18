<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
                       $table->bigIncrements('id');
                       $table->string('first_name');
                       $table->string('last_name');
                        $table->string('phone')->nullable();
                        $table->string('email');
                        $table->string('address');
                        $table->unsignedBigInteger('company_id');
                        $table->timestamps();

                        
                        $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
