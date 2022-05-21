<?php

namespace App\Repositories;

use App\Constants\CountryConstants;
use App\Constants\CovidReportConstants;
use Illuminate\Database\Query\Builder;

/**
 * Class CovidReportsRepository
 *
 * @package App\Repositories
 * @author Simon Peter Calamno
 * @since 2022.05.19
 */
class CovidReportsRepository extends BaseRepository
{
    /**
     * CovidReportsRepository constructor.
     */
    public function __construct()
    {
        $this->setTable(CovidReportConstants::TABLE_NAME)
            ->setPrimaryKey(CovidReportConstants::PRIMARY_KEY);
    }

    /**
     * Gets the Confirmed Cases By Country
     * @param string $sDate
     * @param int $iLimit
     * @return array
     */
    public function getTopConfirmedCasesByCountry(string $sDate, int $iLimit): array
    {
        return $this->initQueryBuilder()
            ->oQueryBuilder
            ->selectRaw('SUM(confirmed) as confirmed_by_country')
            ->selectRaw('SUM(deaths) as deaths_by_country')
            ->selectRaw('SUM(recovered) as recovered_by_country')
            ->selectRaw($this->appendColumnNameToTableName(CountryConstants::COUNTRY_NAME, CountryConstants::TABLE_NAME))
            ->when(true, \Closure::fromCallable([$this, 'joinCountriesTable']))
            ->groupBy([
                $this->appendColumnNameToTableName(CovidReportConstants::COUNTRY_NO),
                $this->appendColumnNameToTableName(CountryConstants::COUNTRY_NAME, CountryConstants::TABLE_NAME),
            ])
            ->where([CovidReportConstants::OBSERVATION_DATE => $sDate])
            ->orderBy('confirmed_by_country', 'desc')
            ->limit($iLimit)
            ->get()
            ->toArray();
    }

    /**
     * Joins with the Countries Table
     * @param Builder $oQueryBuilder
     * @return Builder
     */
    public function joinCountriesTable(Builder $oQueryBuilder): Builder
    {
        return $this->embedTable(
            $oQueryBuilder,
            CountryConstants::TABLE_NAME,
            CovidReportConstants::COUNTRY_NO,
            CountryConstants::COUNTRY_NO
        );
    }
}
