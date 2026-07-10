<?php

namespace App\Services;

use App\Http\Requests\BloodBagRequest;
use App\Http\Resources\BloodBagResource;
use App\Models\BloodBag;
use App\Models\BloodBank;

class BloodBagService
{

    public function store(BloodBagRequest $request)
    {
        $validatedData = $request->validated();

        $data = BloodBag::create($validatedData);

        if (empty($data)) {

            return response()->json([
                'success' => false,
                'message' => 'Failed to create blood bag',
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Blood bag created successfully',
            'data' => $data
        ]);
    }


    public function update(BloodBagRequest $request, $id)
    {

        $validatedData = $request->validated();

        $bloodBag = BloodBag::find($id);

        if (empty($bloodBag)) {

            return response()->json([
                'success' => false,
                'message' => 'Blood bag not found',
            ]);
        }

        $bloodBag->update($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Blood bag updated successfully',
        ]);
    }


    public function destroy($id)
    {

        $bloodBag = BloodBag::find($id);

        if (empty($bloodBag)) {

            return response()->json([
                'success' => false,
                'message' => 'Blood bag not found',
            ]);
        }

        $bloodBag->delete();

        return response()->json([
            'success' => true,
            'message' => 'Blood bag deleted successfully',
        ]);
    }


    public function show($id)
    {

        $bloodBag = BloodBag::find($id);

        if (empty($bloodBag)) {

            return response()->json([
                'success' => false,
                'message' => 'Blood bag not found',
            ]);
        }

        return response()->json([
            'success' => true,
            'data' => $bloodBag
        ]);
    }

    public function index()
    {

        $bloodBags = BloodBag::with(['refrigerator'])->get();

        return response()->json([
            'success' => true,
            'data' => BloodBagResource::collection($bloodBags)
        ]);
    }


    public function highTemperature()
    {
        return BloodBank::whereHas(
            'refrigerators.temperatureLogs',
            function ($query) {

                $query->where(
                    'temperature',
                    '>',
                    8
                );
            }
        )
            ->with([
                'refrigerators.temperatureLogs'
            ])
            ->get();
    }
}
