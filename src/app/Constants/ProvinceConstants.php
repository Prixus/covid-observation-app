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
    public const TABLE_NAME = 'provinces';

    /**
     * Primary Key
     */
    public const PRIMARY_KEY = 'province_no';

    /**
     * Attributes
     */
    public const PROVINCE_NAME = 'provincestate';

    /**
     * Indexes
     */
    public const INDEX_FK_PROVINCE = 'ixnn_province__province_no';
    public const INDEX_UNIQUE_PROVINCE_NAME = 'ixnu_province__province_no';

    /**
     * Database Attributes
     */
    public const DB_ATTRIBUTES = [
        self::PROVINCE_NAME
    ];
}
