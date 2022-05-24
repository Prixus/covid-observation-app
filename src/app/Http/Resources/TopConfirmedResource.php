<?php


namespace App\Http\Resources;


use App\Constants\CountryConstants;
use App\Constants\CovidReportConstants;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

/**
 * Class TopConfirmedResource
 *
 * @package App\Http\Resources
 * @author Simon Peter Calamno
 * @since 2022.05.21
 */
class TopConfirmedResource extends JsonResource
{
    /**
     * Removes the default wrapper
     * @var null
     */
    public static $wrap = null;

    /**
     * Observation Date used in the request
     * @var string
     */
    private $sObservationDate;

    /**
     * TopConfirmedResource constructor.
     * @param $mResource
     * @param string $sObservationDate
     */
    public function __construct($mResource, string $sObservationDate)
    {
        $this->sObservationDate = $sObservationDate;
        parent::__construct($mResource);
    }

    /**
     * Transform the resource into an array.
     * @param Request $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request)
    {
        return [
            CovidReportConstants::OBSERVATION_DATE_FIELD => $this->sObservationDate,
            CountryConstants::COUNTRIES_FIELD            => CovidReportsResource::collection($this->resource)
        ];
    }
}
