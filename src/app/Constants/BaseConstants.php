<?php


namespace App\Constants;

/**
 * Class BaseConstants
 *
 * @package App\Constants
 * @author Simon Peter Calamno
 * @since 2022.05.18
 */
abstract class BaseConstants
{
    /**
     * FK and PK Constants
     */
    public const COUNTRY_NO = 'country_no';
    public const COVID_REPORT_NO = 'covid_report_no';
    public const PROVINCE_NO = 'province_no';

    /**
     * Database Constants
     */
    public const CASCADE = 'cascade';

    /**
     * Common Attributes
     */
    public const MAX_RESULTS = 'max_results';

    /**
     * API Status Codes
     */
    public const UNPROCESSABLE_ENTITY = 422;
}
