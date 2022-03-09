<?php

use App\Helpers\Constants\BaseConstants;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('bio');
            $table->enum('gender', array_values(BaseConstants::GENDER));
            $table->string('city');
            $table->string('resume')->nullable();
            $table->string('stackoverflow_id')->nullable();
            $table->string('github_id')->nullable();
            $table->string('linked_in')->nullable();
            $table->string('phone_number');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_details');
    }
}
