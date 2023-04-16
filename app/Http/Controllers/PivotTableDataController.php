<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PivotTableDataController extends Controller
{
    public function getDataAsJson()
    {
        $data = DB::select('SELECT gl.entry_no,
                                       gl.date,
                                       gl.details,
                                       gl.debit,
                                       t.country,
                                       t.region,
                                       coa.report,
                                       coa.class,
                                       coa.sub_class,
                                       coa.sub_class_2,
                                       coa.account,
                                       coa.sub_account,
                                       c.year,
                                       c.month
                                FROM general_ledgers gl
                                         JOIN territories t ON gl.territory_id = t.id
                                         JOIN chart_of_accounts coa ON coa.id = gl.account_key
                                         JOIN calendars c on gl.date = c.date
                                LIMIT 3000;');

        return response()->json($data);
    }
}
