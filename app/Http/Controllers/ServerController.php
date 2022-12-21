<?php

namespace App\Http\Controllers;

use App\Services\ServerService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ServerController extends Controller
{
    
    public function __construct(protected ServerService $service)
    {
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $servers = $this->service->getAll($request->all());
        return response()->json($servers->toArray());
    }

    /**
     * @return JsonResponse
     */
    public function filterData(): JsonResponse
    {
        
        $rawData = $this->service->getAll();
        
        return response()->json([
            'storage' => $rawData->sortBy('storage')->pluck('storage', 'storage_alias')->unique(),
            'disk_types' => $rawData->sortBy('disk_type')->pluck('disk_type')->unique(),
            'ram' => $rawData->sortBy('ram')->pluck('ram')->unique(),
            'locations' => $rawData->sortBy('location')->pluck('location')->unique(),
        ]);
    }

}