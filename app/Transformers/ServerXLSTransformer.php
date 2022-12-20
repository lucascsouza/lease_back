<?php

namespace App\Transformers;

class ServerXLSTransformer
{
    public function transform(array $data): array
    {
        // RAM
        $ram = $data['ram'];
        $ramCapacity = substr($ram, 0, strpos($ram, 'GB'));
        $ramSpecification = substr($ram, strpos($ram, 'DDR'));

        // Storage
        $storage = $data['hdd'];
        $storageDisksCount =  substr($storage, 0, strpos($storage, 'x'));
        $metric = strpos($storage, 'GB') ?: strpos($storage, 'TB');
        $diskType = substr($storage, $metric + 2);
        $storageEachDiskCapacity = substr($storage, strpos($storage, 'x') + 1, $metric - 2);
        $storageCapacity = (int)$storageEachDiskCapacity * (int)$storageDisksCount;
        $storageCapacity .= strpos($storage, 'GB') ? 'GB' : 'TB';
        
        // Price
        $price = $data['price'];
        $priceAmount = (float) filter_var($price, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $currency = substr($price, 0, strpos($price, $priceAmount));
        
        return [
            'name' => $data['model'],
            'ram' => $ramCapacity,
            'ram_specification' => $ramSpecification,
            'storage' => $storageCapacity,
            'storage_description' => $storage,
            'disk_type' => $diskType,
            'location' => $data['location'],
            'price' => $priceAmount,
            'currency' => $currency
        ];
    }
    
}