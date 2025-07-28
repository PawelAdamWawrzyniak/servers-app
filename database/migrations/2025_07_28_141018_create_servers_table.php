<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(table:'servers',callback: function (Blueprint $table) {
            $table->ulid(column: 'id')->primary();
            $table->string(column:'name', length: 100);
            // Only IPv4 addresses are allowed, IPv6 is not supported yet
            $table->string(column:'ip_address', length: 15);
            $table->string(column:'port', length: 5);
            $table->string(column:'status', length: 20)->nullable();
            $table->timestamps();
            $table->unique(columns: ['ip_address', 'port'], name: 'server_address_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(table: 'servers');
    }
};
