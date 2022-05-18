<?php

use App\Constants\CountryConstants;
use App\Constants\CovidReportConstants;
use App\Constants\ProvinceConstants;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Create Covid Records Table
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
        Schema::create(CovidReportConstants::TABLE_NAME, function (Blueprint $table) {
            $table->bigIncrements(CovidReportConstants::PRIMARY_KEY);
            $table->foreignId(CovidReportConstants::COUNTRY_NO);
            $table->foreignId(CovidReportConstants::PROVINCE_NO);
            $table->integer(CovidReportConstants::CONFIRMED_CASES);
            $table->integer(CovidReportConstants::DEATHS);
            $table->integer(CovidReportConstants::RECOVERED);
            $table->date(CovidReportConstants::OBSERVATION_DATE);
            $table->integer(CovidReportConstants::INS_LAST_UPDATE);

            $table->foreign(CovidReportConstants::COUNTRY_NO, CountryConstants::INDEX_FK_COUNTRY)
                ->references(CountryConstants::PRIMARY_KEY)
                ->on(CountryConstants::TABLE_NAME)
                ->onDelete(CovidReportConstants::CASCADE)
                ->onUpdate(CovidReportConstants::CASCADE);
            $table->foreign(CovidReportConstants::PROVINCE_NO, ProvinceConstants::INDEX_FK_PROVINCE)
                ->references(ProvinceConstants::PRIMARY_KEY)
                ->on(ProvinceConstants::TABLE_NAME)
                ->onDelete(CovidReportConstants::CASCADE)
                ->onUpdate(CovidReportConstants::CASCADE);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(CovidReportConstants::TABLE_NAME);
    }
};
