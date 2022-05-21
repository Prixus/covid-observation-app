<?php

namespace App\Http\Resources;

use App\Constants\ErrorConstants;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class ExceptionResource
 *
 * @package App\Http\Resources
 * @author Simon Peter Calamno
 * @since 2022.05.21
 */
class ExceptionResource extends JsonResource
{
    /**
     * Sets the wrapper to error
     * @var string
     */
    public static $wrap = 'error';

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            ErrorConstants::ERROR_MESSAGE => $this[ErrorConstants::ERROR_MESSAGE],
            ErrorConstants::ERROR_CODE    => $this[ErrorConstants::ERROR_CODE]
        ];
    }
}
