<?php

namespace App\Models;

use App\Constants\CountryConstants;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CountryModel
 *
 * @package App\Models
 * @author Simon Peter Calamno
 * @since 2022.05.18
 */
class CountryModel extends Model
{
    protected $table = CountryConstants::TABLE_NAME;
    protected $primaryKey = CountryConstants::PRIMARY_KEY;
    public $timestamps = false;
}
