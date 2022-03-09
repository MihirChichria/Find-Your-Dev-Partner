<?php

use App\Helpers\Constants\BaseConstants;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            //details
            $table->string('bio');
            $table->enum('gender', BaseConstants::GENDER);
            $table->string('city');
            $table->string('resume')->nullable();
            $table->string('stackoverflow_id')->nullable();
            $table->string('github_id')->nullable();
            $table->string('linked_in')->nullable();
            $table->string('phone_number');
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
        Schema::dropIfExists('families');
    }
}
