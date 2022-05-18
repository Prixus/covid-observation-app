<?php

namespace App\Models;

use App\Constants\CovidReportConstants;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CovidReportModel
 *
 * @package App\Models
 * @author Simon Peter Calamno
 * @since 2022.05.18
 */
class CovidReportModel extends Model
{
    protected $table = CovidReportConstants::TABLE_NAME;
    protected $primaryKey = CovidReportConstants::PRIMARY_KEY;
    protected $timestamps = false;
}
