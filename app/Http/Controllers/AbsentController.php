<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absent;
use App\Models\User;
use App\Models\Lesson;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;
use DateTime;
use DatePeriod;
use DateInterval;

class AbsentController extends Controller
{
    static $mothStrings = [
        '01' => 'Січень',
        '02' => 'Лютий',
        '03' => 'Березень',
        '04' => 'Квітень',
        '05' => 'Травень',
        '06' => 'Червень',
        '07' => 'Липень',
        '08' => 'Серпень',
        '09' => 'Вересень',
        '10' => 'Жовтень',
        '11' => 'Листопад',
        '12' => 'Грудень',
    ];

    private static function getYear()
    {
        $date = new DateTime();
        $m = $date->format('m');
        switch ($m) {
            case '01':
            case '02':
            case '03':
            case '04':
            case '05':
            case '06':
            case '07':
                return $date->format('Y') - 1;

            case '08':
            case '09':
            case '10':
            case '11':
            case '12':
                return $date->format('Y');

            default:
                return $date->format('Y');

        }
    }

    function table($year = false, $month = false)
    {
        if (!$year || !$month) {
            $year = (new DateTime())->format('Y');
            $month = (new DateTime())->format('m');
        }
        $user = Auth::user();
        $dateFrom = new DateTime($year . '-' . $month . '-01');
        $dateTo = (new DateTime($year . '-' . $month . '-01'))->modify('first day of next month');
        $period = new DatePeriod(
            $dateFrom,
            new DateInterval('P1D'),
            $dateTo
        );

        $dates = array();
        foreach ($period as $dItem) {
            $tmp = (object) [];
            $tmp->raw = $dItem;
            $tmp->dw = $dItem->format('w');
            $dates[] = $tmp;
        }

        $journals = $user->userable->group->journals()->with('subject')->get()->sortBy('subject.subject_name');
        return view(
            'timesheets.index',
            [
                'user' => $user,
                'data' => (object) [
                    'title' => 'Пропуски за ' . AbsentController::$mothStrings[$month] . ' ' . $year . 'p.',
                    'last_mon' => (new DateTime($year . '-' . $month . '-01'))->modify('last month')->format('m'),
                    'next_mon' => (new DateTime($year . '-' . $month . '-01'))->modify('next month')->format('m'),
                ],
                'dateFrom' => $dateFrom,
                'dateTo' => $dateTo,
                'arDates' => $dates,
                'journals' => $journals,
                'year' => AbsentController::getYear(),
            ]
        );
    }
}
