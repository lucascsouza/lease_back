<?php

namespace App\Imports;

use App\Models\Server;
use App\Services\ServerService;
use App\Transformers\ServerXLSTransformer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ServersImport implements ToModel, WithHeadingRow
{
    public function __construct(protected ServerService $service, protected ServerXLSTransformer $transformer)
    {
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return $this->service->store($this->transformer->transform($row));
    }
}
