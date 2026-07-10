<?php

namespace App\Services;

use App\Models\TemperatureLog;


class RiskAnalysisService
{

    public function refrigeratorRisk($id)
    {
        $logs = TemperatureLog::where(
            'refrigerator_id',
            $id
        )
            ->whereDate(
                'logged_at',
                today()
            )
            ->get();

        $totalMinutes = $logs->count();

        $unsafeMinutes = $logs
            ->where('temperature', '>', 6)
            ->count();

        return response()->json([

            'average_temperature' => $logs->avg('temperature'),

            'highest_temperature' => $logs->max('temperature'),

            'lowest_temperature' => $logs->min('temperature'),

            'unsafe_minutes' => $unsafeMinutes,

            'total_minutes' => $totalMinutes,

            'risk_percentage' => $totalMinutes
                ? round(($unsafeMinutes / $totalMinutes) * 100, 2)
                : 0

        ]);
    }
}
