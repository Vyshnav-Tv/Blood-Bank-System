<?php

namespace App\Http\Controllers;

use App\Http\Requests\BloodBagRequest;
use App\Services\BloodBagService;
use Illuminate\Http\Request;

class BloodBagController extends Controller
{


    public function __construct(private BloodBagService $bloodBagService)
    {
        $this->bloodBagService = $bloodBagService;
    }


    public function store(BloodBagRequest $request)
    {
        return $this->bloodBagService->store($request);
    }

    public function update(BloodBagRequest $request, $id)
    {
        return $this->bloodBagService->update($request, $id);
    }


    public function destroy($id)
    {
        return $this->bloodBagService->destroy($id);
    }

    public function index()
    {
        return $this->bloodBagService->index();
    }


    public function show($id)
    {
        return $this->bloodBagService->show($id);
    }

    public function highTemperature(){
        
        return $this->bloodBagService->highTemperature();
    }
}
