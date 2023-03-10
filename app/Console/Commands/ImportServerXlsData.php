<?php

namespace App\Console\Commands;

use App\Imports\ServersImport;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

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
        try {
            Excel::import(app(ServersImport::class), 'xls/' . self::FILE_NAME);
            $this->info('Servers imported succesfully');
        } catch (\Exception $exception) {
            $this->error($exception->getMessage());
        }
        
    }
}