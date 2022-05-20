<?php

namespace App\Repositories;

use App\Constants\ProvinceConstants;

/**
 * Class ProvincesRepository
 *
 * @package App\Repositories
 * @author Simon Peter Calamno
 * @since 2022.05.19
 */
class ProvincesRepository extends BaseRepository
{
    /**
     * CovidReportsRepository constructor.
     */
    public function __construct()
    {
        $this->setTable(ProvinceConstants::TABLE_NAME)
            ->setPrimaryKey(ProvinceConstants::PRIMARY_KEY);
    }

    /**
     * Trips the province then updates or insert a record
     * @param array $aSearchData
     * @param array $aDataToUpdate
     * @return int
     */
    public function updateOrInsertDataGetId(array $aSearchData, array $aDataToUpdate = []): int
    {
        $aSearchData[ProvinceConstants::PROVINCE_NAME] = trim($aSearchData[ProvinceConstants::PROVINCE_NAME]);
        return parent::updateOrInsertDataGetId($aSearchData, $aDataToUpdate);
    }
}
