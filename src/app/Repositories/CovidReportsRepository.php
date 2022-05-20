<?php

namespace App\Repositories;

use App\Constants\CovidReportConstants;

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
}
