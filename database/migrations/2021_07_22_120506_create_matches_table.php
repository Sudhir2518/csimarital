<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('surname');
            $table->string('bust_image');
            $table->string('full_image');
            $table->boolean('featured');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->date('date_of_birth');
            $table->string('place_of_birth');
            $table->integer('height');
            $table->string('church');
            $table->text('about')->nullable();
            $table->foreignId('eduqual_id')->constrained('eduquals');
            $table->foreignId('edufield_id')->constrained('edufields');
            $table->string('fname');
            $table->string('mname');
            $table->string('foccu');
            $table->string('moccu');
            $table->string('sisters');
            $table->string('brothers');
            $table->string('city_id')->nullable();
            $table->string('state_id')->nullable();
            $table->text('about_family')->nullable();
            $table->foreignId('occupation_id')->constrained('occupations');
            $table->foreignId('designation_id')->constrained('designations');
            $table->foreignId('organization_id')->constrained('organizations');
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('country_id')->constrained('countries');          
            $table->foreignId('diocese_id')->constrained('dioceses');
            $table->string('membership');
            $table->tinyInteger('isApproved')->default(0);
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
        Schema::dropIfExists('matches');
    }
}
