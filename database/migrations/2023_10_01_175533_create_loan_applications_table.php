<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('loan_applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dealer_id');
            $table->unsignedBigInteger('dealer_employee_id');
            $table->unsignedBigInteger('bank_id');
            $table->decimal('amount', 10, 2, true);
            $table->unsignedInteger('term'); //срок кредита в месяцах
            $table->decimal('interest_rate', 5, 2, true); //процентная ставка
            $table->text('reason_description');
            $table->enum('status', ['new', 'on_review', 'accepted', 'declined']);
            $table->foreign('dealer_id')->references('id')->on('dealers')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('dealer_employee_id')->references('id')->on('dealer_employees')->cascadeOnUpdate(
            )->cascadeOnDelete();
            $table->foreign('bank_id')->references('id')->on('banks')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan_applications');
    }
};
