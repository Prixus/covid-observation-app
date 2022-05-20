<?php

use App\Constants\ProvinceConstants;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Create Province Table
 *
 * @author Simon Peter Calamno
 * @since 2022.05.18
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(ProvinceConstants::TABLE_NAME, function (Blueprint $table) {
            $table->bigIncrements(ProvinceConstants::PRIMARY_KEY);
            $table->string(ProvinceConstants::PROVINCE_NAME)->nullable();

            $table->unique(
                ProvinceConstants::PROVINCE_NAME,
                ProvinceConstants::INDEX_UNIQUE_PROVINCE_NAME
            );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(ProvinceConstants::TABLE_NAME);
    }
};
