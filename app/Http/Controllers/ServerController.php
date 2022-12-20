<?php

namespace App\Http\Controllers;

use App\Services\ServerService;
use Illuminate\Http\Request;

class ServerController extends Controller
{
    
    public function __construct(protected ServerService $service)
    {
    }

    public function index(Request $request)
    {
        $servers = $this->service->getAll($request->all());
        return response()->json($servers->toArray());
    }

}