<?php

namespace App\Console\Commands;

use App\Imports\ServersImport;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Excel;

class ImportServerXlsData extends Command
{
    
    private const FILE_NAME = 'LeaseWeb_servers_filters_assignment.xlsx';
    
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:xls-server-list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Imports data from XLS File';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $file = Storage::disk('local')->get('xls/'.self::FILE_NAME);
        \Maatwebsite\Excel\Facades\Excel::import(app(ServersImport::class), 'xls/'.self::FILE_NAME);

//        $this->info("Token succesfully generated: " . $token);

    }
}