<?php

namespace App\Constants;

/**
 * Class ProvinceConstants
 *
 * @package App\Constants
 * @author Simon Peter Calamno
 * @since 2022.05.18
 */
class ProvinceConstants
{
    /**
     * Table name
     */
    public const TABLE_NAME = 't_province';

    /**
     * Primary Key
     */
    public const PRIMARY_KEY = 'province_no';

    /**
     * Attributes
     */
    public const PROVINCE_NAME = 'province_name';

    /**
     * Indexes
     */
    public const INDEX_FK_PROVINCE = 'ixnn_province__province_no';
}
