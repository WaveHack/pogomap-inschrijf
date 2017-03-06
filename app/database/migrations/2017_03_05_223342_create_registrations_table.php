<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->increments('id');

            $table->boolean('is_spam')->default(false);

            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('buddy_name');
            $table->string('buddy_file_path');

            $table->string('status')->default('new');
            $table->unsignedInteger('status_update_by_user_id')->nullable();
            $table->dateTime('status_update_at')->nullable();

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
        Schema::dropIfExists('registrations');
    }
}
