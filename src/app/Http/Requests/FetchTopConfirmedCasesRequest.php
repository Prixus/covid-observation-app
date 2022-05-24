<?php

namespace App\Http\Requests;

use App\Constants\CovidReportConstants;

/**
 * Class FetchTopConfirmedCasesRequest
 *
 * @package App\Http\Requests
 * @author Simon Peter Calamno <simon@simplexi.com>
 * @since 2022.05.21
 */
class FetchTopConfirmedCasesRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            CovidReportConstants::OBSERVATION_DATE_FIELD => [
                self::REQUIRED,
                self::DATE
            ],
            CovidReportConstants::MAX_RESULTS => [
                self::REQUIRED,
                self::INTEGER
            ]
        ];
    }
}
