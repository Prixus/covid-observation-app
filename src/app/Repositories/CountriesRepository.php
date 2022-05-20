<?php

namespace App\Repositories;

use App\Constants\CountryConstants;

/**
 * Class CountriesRepository
 *
 * @package App\Repositories
 * @author Simon Peter Calamno
 * @since 2022.05.19
 */
class CountriesRepository extends BaseRepository
{
    /**
     * CovidReportsRepository constructor.
     */
    public function __construct()
    {
        $this->setTable(CountryConstants::TABLE_NAME)
            ->setPrimaryKey(CountryConstants::PRIMARY_KEY);}

    /**
     * Trims the country name before saving
     * @param array $aSearchData
     * @param array $aDataToUpdate
     * @return int
     */
    public function updateOrInsertDataGetId(array $aSearchData, array $aDataToUpdate = []): int
    {
        $aSearchData[CountryConstants::COUNTRY_NAME] = trim($aSearchData[CountryConstants::COUNTRY_NAME]);
        return parent::updateOrInsertDataGetId($aSearchData, $aDataToUpdate);
    }
}
