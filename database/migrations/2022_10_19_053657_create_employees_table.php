<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                  ->constrained()
                  ->cascadeOnDelete();
            $table->foreignId('position_id')
                  ->nullable()
                  ->constrained()
                  ->nullOnDelete();
            $table->foreignId('salary_range_id')
                  ->nullable()
                  ->constrained()
                  ->nullOnDelete();
            $table->string('nik', 16)->unique();
            $table->string('nip', 11)->unique();
            $table->string('bpjs_tk_number');
            $table->string('bpjs_kes_number');
            $table->string('bpjs_npwp_number');
            $table->string('name');
            $table->date('first_join');
            $table->date('last_contract_start');
            $table->date('last_contract_end');
            $table->string('birth_place');
            $table->date('birth_date');
            $table->string('tax_status', 10);
            $table->text('address_on_id');
            $table->string('phone_number', 16);
            $table->string('blood_type', 3);
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
        Schema::dropIfExists('employees');
    }
};
