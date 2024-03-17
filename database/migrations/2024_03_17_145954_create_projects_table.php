<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('project_code');
            $table->string('project_title');
            $table->string('start_date');
            $table->string('end_date');
            $table->foreignId('client_id')->constrained('clients');
            $table->foreignId('partner_id')->constrained('partners');
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->string('address');
            $table->foreignId('created_by')->constrained('users');
            $table->timestamps();
            $table->softDeletes();
            $table->enum('status', ['Active',"Archive"]); // Corrected spelling of "Active"
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
};
