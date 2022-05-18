<?php

namespace App\Models;

use App\Constants\ProvinceConstants;

/**
 * Class ProvinceModel
 *
 * @package App\Models
 * @author Simon Peter Calamno
 * @since 2022.05.18
 */
class ProvinceModel
{
    protected $table = ProvinceConstants::TABLE_NAME;
    protected $primaryKey = ProvinceConstants::PRIMARY_KEY;
    protected $timestamps = false;
}
