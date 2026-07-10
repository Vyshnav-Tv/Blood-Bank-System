<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RiskAnalysisService;

class RiskController extends Controller
{
    /**
     * Service instance for risk analysis.
     *
     * @var mixed
     */
    protected $riskService;


    public function __construct(RiskAnalysisService $riskService)
    {
        $this->riskService = $riskService;
    }

   
public function refrigeratorRisk($id)
{
    return $this->riskService
        ->refrigeratorRisk($id);
}
}
