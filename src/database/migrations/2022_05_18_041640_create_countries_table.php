<?php

use App\Constants\CountryConstants;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Create Countries Table
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
        Schema::create(CountryConstants::TABLE_NAME, function (Blueprint $table) {
            $table->bigIncrements(CountryConstants::PRIMARY_KEY);
            $table->string(CountryConstants::COUNTRY_NAME)->nullable();

            $table->unique(
                CountryConstants::COUNTRY_NAME,
                CountryConstants::INDEX_UNIQUE_COUNTRY_NAME
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
        Schema::dropIfExists(CountryConstants::TABLE_NAME);
    }
};
