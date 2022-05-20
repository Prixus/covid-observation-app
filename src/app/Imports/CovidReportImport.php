<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

/**
 * Class LeaveFormsImport
 *
 * @package App\Imports
 * @author Simon Peter Calamno <simon@simplexi.com.ph>
 * @since 2020.08.25
 */
class CovidReportImport implements ToCollection, WithHeadingRow
{
    /***
     * This is a required function
     * This will allow the user to perform a process for every row in the
     * excel file
     * @param Collection $collection
     * @return Collection
     */
    public function collection(Collection $collection) : Collection
    {
        return $collection;
    }

}
