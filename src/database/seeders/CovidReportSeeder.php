<?php

namespace Database\Seeders;

use App\Services\CovidReportsManagementService;
use Illuminate\Database\Seeder;

/**
 * Class CovidReportSeeder
 *
 * @package Database\Seeders
 * @author Simon Peter Calamno
 * @since 2022.05.19
 */
class CovidReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(CovidReportsManagementService $oCovidReportsManagementService)
    {
        $oCovidReportsManagementService->seedCovidReports();
    }
}
