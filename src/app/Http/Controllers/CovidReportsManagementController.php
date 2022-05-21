<?php

namespace App\Http\Controllers;

use App\Http\Requests\FetchTopConfirmedCasesRequest;
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

    public function fetchTopConfirmedCases(FetchTopConfirmedCasesRequest $oFetchTopConfirmedCasesRequest)
    {
        $aValidatedData = $oFetchTopConfirmedCasesRequest->validated();
        return $aValidatedData;
    }
}
