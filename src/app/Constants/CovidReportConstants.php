<?php


namespace App\Constants;

/**
 * Class CovidReportConstants
 * @package App\Constants
 * @author Simon Peter Calamno
 * @since 2022.05.18
 */
class CovidReportConstants extends BaseConstants
{
    /**
     * Table name constant
     */
    public const TABLE_NAME = 't_covid_reports';

    /**
     * Primary Constant
     */
    public const PRIMARY_KEY = 'covid_report_no';

    /**
     * Attribute Constants
     */
    public const CONFIRMED_CASES = 'confirmed';
    public const DEATHS = 'deaths';
    public const RECOVERED = 'recovered';
    public const OBSERVATION_DATE = 'observationdate';
    public const INS_LAST_UPDATE = 'last_update';

    /**
     * Database Attributes
     */
    public const DB_ATTRIBUTES = [
        self::CONFIRMED_CASES,
        self::DEATHS,
        self::RECOVERED,
        self::OBSERVATION_DATE,
        self::INS_LAST_UPDATE
    ];

    /**
     * Resource fields
     */
    public const OBSERVATION_DATE_FIELD = 'observation_date';
}
