<?php

namespace App\Services;

use App\Constants\CountryConstants;
use App\Constants\CovidReportConstants;
use App\Constants\ProvinceConstants;
use App\Imports\CovidReportImport;
use App\Repositories\CountriesRepository;
use App\Repositories\CovidReportsRepository;
use App\Repositories\ProvincesRepository;
use Illuminate\Support\Arr;
use Maatwebsite\Excel\Facades\Excel;

/**
 * Class CovidReportsManagementService
 *
 * @package App\Services
 * @author Simon Peter Calamno <simon@simplexi.com.ph>
 * @since 2022.05.19
 */
class CovidReportsManagementService
{
    /**
     * @var CovidReportsRepository
     */
    private $oCovidReportsRepository;

    /**
     * @var CountriesRepository
     */
    private $oCountriesRepository;

    /**
     * @var ProvincesRepository
     */
    private $oProvincesRepository;

    /**
     * @var CovidReportImport
     */
    private $oCovidReportExcelImport;

    /**
     * CovidReportsManagementService constructor.
     * @param CovidReportsRepository $oCovidReportsRepository
     * @param CountriesRepository $oCountriesRepository
     * @param ProvincesRepository $oProvincesRepository
     * @param CovidReportImport $oCovidReportExcelImport
     */
    public function __construct(
        CovidReportsRepository $oCovidReportsRepository,
        CountriesRepository $oCountriesRepository,
        ProvincesRepository $oProvincesRepository,
        CovidReportImport $oCovidReportExcelImport)
    {
        $this->oCovidReportsRepository = $oCovidReportsRepository;
        $this->oCountriesRepository = $oCountriesRepository;
        $this->oProvincesRepository = $oProvincesRepository;
        $this->oCovidReportExcelImport = $oCovidReportExcelImport;
    }

    /**
     * Seeds the covid reports in the database
     */
    public function seedCovidReports(): void
    {
        $this->oCovidReportsRepository->truncateDatabaseTables();
        $aCovidReports = Excel::toArray(
            $this->oCovidReportExcelImport,
            base_path('database/data/covid_19_data.csv')
        );

        foreach ($aCovidReports[0] as $aCovidReport) {
            $aProvinceDetails = Arr::only($aCovidReport, ProvinceConstants::DB_ATTRIBUTES);
            $aCountryDetails = Arr::only($aCovidReport, CountryConstants::DB_ATTRIBUTES);
            $aCovidReportDetail = Arr::only($aCovidReport, CovidReportConstants::DB_ATTRIBUTES);

            $aCovidReportDetail[CovidReportConstants::COUNTRY_NO] = $this->oCountriesRepository
                ->updateOrInsertDataGetId($aCountryDetails);
            $aCovidReportDetail[CovidReportConstants::PROVINCE_NO] = $this->oProvincesRepository
                ->updateOrInsertDataGetId($aProvinceDetails);
            $this->oCovidReportsRepository->saveData($aCovidReportDetail);
        }
    }
}
