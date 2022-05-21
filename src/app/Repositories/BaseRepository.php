<?php

namespace App\Repositories;

use App\Models\CountryModel;
use App\Models\CovidReportModel;
use App\Models\ProvinceModel;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

/**
 * Class BaseRepository
 *
 * @package App\Repositories
 * @author Simon Peter Calamno
 * @since 2022.05.19
 */
abstract class BaseRepository
{
    /**
     * @var Builder
     */
    protected $oQueryBuilder;

    /**
     * Base Table of the Repository
     * @var string
     */
    protected $sTableName;

    /**
     * Primary key of Base Table
     * @var string
     */
    protected $sPrimaryKey;

    /**
     * Initializes the Query Builder
     * @return $this
     */
    public function initQueryBuilder()
    {
        $this->oQueryBuilder = DB::table($this->sTableName);
        return $this;
    }

    /**
     * Save or store data, returns ID
     * @param array $aParams
     * @return int
     */
    public function saveData(array $aParams): int
    {
        return (int) $this->initQueryBuilder()->oQueryBuilder->insertGetId($aParams, $this->sPrimaryKey);
    }

    /**
     * Insert or Update data and returns the id of the data after the transaction
     * This function will use the $aSearchAttributes to find the record that will be updated.
     * If the record is found, the $aValuesToBeUpdated will be updated.
     * If not, the $SearchAttributes and $aValuesToBeUpdated will be merged to create a new record.
     * After either the insert or update transaction has been finished, the primary key of the record
     * will be returned
     * @param array $aSearchData
     * @param array $aDataToUpdate
     * @return int
     */
    public function updateOrInsertDataGetId(array $aSearchData, array $aDataToUpdate = []): int
    {
        $this->initQueryBuilder()
            ->oQueryBuilder
            ->updateOrInsert($aSearchData, $aDataToUpdate);
        $oUpdatedCreatedRecord = $this->initQueryBuilder()->oQueryBuilder
            ->select($this->appendColumnNameToTableName($this->sPrimaryKey))
            ->where($aSearchData)
            ->first();

        return (int) $oUpdatedCreatedRecord->{$this->sPrimaryKey};
    }

    /**
     * Truncates all the database tables
     */
    public function truncateDatabaseTables()
    {
        CountryModel::truncate();
        CovidReportModel::truncate();
        ProvinceModel::truncate();
    }

    /**
     * Setter for the BASE TABLE of the Repository
     * @param string $sTableName
     * @return $this
     */
    protected function setTable(string $sTableName)
    {
        $this->sTableName = $sTableName;
        return $this;
    }

    /**
     * Setter for the BASE TABLE's Primary Key
     * @param string $sPrimaryKey
     * @return $this
     */
    protected function setPrimaryKey(string $sPrimaryKey)
    {
        $this->sPrimaryKey = $sPrimaryKey;
        return $this;
    }

    /**
     * Appends the Column Name to the Table Name provided
     * Will use the BASE TABLE if the table parameter is null
     * @param string $sColumnName
     * @param string $sTableName
     * @return string
     */
    protected function appendColumnNameToTableName(string $sColumnName, string $sTableName = null): string
    {
        $sTableName = $sTableName ?? $this->sTableName;
        return $sTableName . '.' . $sColumnName;
    }

    /**
     * Embeds second table to first table using INNER JOIN
     * @param Builder $oQueryBuilder
     * @param string $sEmbedTable
     * @param string $sFirst
     * @param string $sSecond
     * @param string|null $sFirstTable
     * @return Builder
     */
    protected function embedTable(
        Builder $oQueryBuilder,
        string $sEmbedTable,
        string $sFirst,
        string $sSecond,
        ?string $sFirstTable = null
    ) : Builder
    {
        return $oQueryBuilder->join(
            $sEmbedTable,
            $this->appendColumnNameToTableName($sFirst, $sFirstTable),
            '=',
            $this->appendColumnNameToTableName($sSecond, $sEmbedTable)
        );
    }
}
