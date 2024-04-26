<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->text('name')->nullable();
            $table->text('surname');
            $table->text('email');
            $table->text('createdate')->nullable();
            $table->text('how')->nullable();
            $table->text('type')->nullable();
            $table->text('mail_id')->nullable();
            $table->text('mail_date')->nullable();
            $table->text('mail_message')->nullable();
            $table->text('mail_subject')->nullable();
            $table->text('mail_json')->nullable();
            $table->unsignedBigInteger('sales_person_id')->nullable();
            $table->foreign('sales_person_id')->references('id')->on('salespersons')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
