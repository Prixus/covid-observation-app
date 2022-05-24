<?php

namespace App\Http\Resources;

use App\Constants\CountryConstants;
use App\Constants\CovidReportConstants;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

/**
 * Class CovidReportsResource
 *
 * @package App\Http\Resources
 * @author Simon Peter Calamno
 * @since 2022.05.21
 */
class CovidReportsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     * @param  Request  $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request)
    {
        return [
            CountryConstants::COUNTRY_NAME_FIELD  => $this->{CountryConstants::COUNTRY_NAME},
            CovidReportConstants::CONFIRMED_CASES => $this->{CovidReportConstants::CONFIRMED_CASES_BY_COUNTRY},
            CovidReportConstants::DEATHS          => $this->{CovidReportConstants::DEATHS_BY_COUNTRY},
            CovidReportConstants::RECOVERED       => $this->{CovidReportConstants::RECOVERED_BY_COUNTRY}
        ];
    }
}
