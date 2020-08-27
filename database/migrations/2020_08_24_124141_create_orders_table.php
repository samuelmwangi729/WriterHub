<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); 
            $table->string('OrderNumber');
            $table->string('Client');
            $table->string('Writer')->nullable();
            $table->string('DocType');
            $table->string('Spacing');
            $table->string('Language');
            $table->string('Topic');
            $table->string('Level');
            $table->string('Deadline');
            $table->string('Pages');
            $table->string('Subject');
            $table->string('Format');
            $table->longText('Description');
            $table->string('Details');
            $table->string('Status')->default('0');
            $table->string('Paid')->default('0');
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
        Schema::dropIfExists('orders');
    }
}
