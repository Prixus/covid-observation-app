<?php

namespace App\Constants;

/**
 * Class CountryConstants
 * @package App\Constants
 * @author Simon Peter Calamno
 * @since 2022.05.18
 */
class CountryConstants extends BaseConstants
{
    /**
     * Table name
     */
    public const TABLE_NAME = 't_country';

    /**
     * Primary Key
     */
    public const PRIMARY_KEY = 'country_no';

    /**
     * Attributes
     */
    public const COUNTRY_NAME = 'country_name';

    /**
     * Indexes
     */
    public const INDEX_FK_COUNTRY = 'ixnn_country__country_no';
}
