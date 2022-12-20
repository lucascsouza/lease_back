<?php

namespace App\Console\Commands;

use App\Models\Api;
use App\Services\ApiService;
use Illuminate\Console\Command;

class CreateListApi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api:create-list-frontend-credentials';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Sanctum API Token for frontend application';
    
    public function __construct(protected ApiService $service)
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $api = $this->service->store(['name' => 'frontend-list']);
        
        $token = $api->createToken($api->name)->plainTextToken;
        
        $this->info("Token succesfully generated: " . $token);
        
    }
}
