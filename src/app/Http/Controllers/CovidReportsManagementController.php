<?php

namespace App\Http\Controllers;

use App\Constants\CovidReportConstants;
use App\Http\Requests\FetchTopConfirmedCasesRequest;
use App\Http\Resources\TopConfirmedResource;
use App\Services\CovidReportsManagementService;

/**
 * Class CovidReportsManagementController
 *
 * @package App\Http\Controllers
 * @author Simon Peter Calamno
 * @since 2022.05.21
 */
class CovidReportsManagementController extends Controller
{
    /**
     * @var CovidReportsManagementService
     */
    private $oCovidReportsManagementService;

    /**
     * CovidReportsManagementController constructor.
     * @param CovidReportsManagementService $oCovidReportsManagementService
     */
    public function __construct(CovidReportsManagementService $oCovidReportsManagementService)
    {
        $this->oCovidReportsManagementService = $oCovidReportsManagementService;
    }

    /**
     * Fetches the countries with top confirmed cases
     * @param FetchTopConfirmedCasesRequest $oFetchTopConfirmedCasesRequest
     * @return TopConfirmedResource
     */
    public function fetchTopConfirmedCases(FetchTopConfirmedCasesRequest $oFetchTopConfirmedCasesRequest): TopConfirmedResource
    {
        $aValidatedData = $oFetchTopConfirmedCasesRequest->validated();
        return new TopConfirmedResource(
            $this->oCovidReportsManagementService->getTotalConfirmedCases($aValidatedData),
            $aValidatedData[CovidReportConstants::OBSERVATION_DATE_FIELD]
        );
    }
}
