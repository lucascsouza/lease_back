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
        Schema::create('servers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment("Server's name");
            $table->string('ram')->comment("RAM GB Capacity");
            $table->string('ram_specification')->comment("RAM Specification (E.g: DDR4)");
            $table->string('storage')->comment("Total storage capacity in GB");
            $table->string('storage_alias')->comment("Alias for storage");
            $table->string('storage_description')->comment("Storage Description");
            $table->string('disk_type')->comment("Storage disk type");
            $table->string('location')->comment("Server's location");
            $table->char('currency', 2)->comment("Currency");
            $table->decimal('price', 10, 2)->comment("Server's price");
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
        Schema::dropIfExists('servers');
    }
};
