<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_customers', function (Blueprint $table) {
            $table->id();
            $table->string('family_name');
            $table->string('first_name')->unique();
            $table->string('unformatted_name')->nullable();
            $table->enum('gender', ['male', 'female']);
            $table->string('phone')->nullable();
            $table->string('fullname')->nullable();
            $table->string('customer_title')->nullable();
            $table->bigInteger('marital_status')->nullable();
            $table->boolean('hit_y_n')->default(false);
            $table->string('id_no')->nullable();
            $table->string('id_type')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_customers');
    }
};
