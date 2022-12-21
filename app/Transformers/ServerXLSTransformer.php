<?php

namespace App\Transformers;

class ServerXLSTransformer
{
    /**
     * @param array $data
     *
     * @return array
     */
    public function transform(array $data): array
    {
        // RAM data
        $ram = $data['ram'];
        $ramCapacity = substr($ram, 0, strpos($ram, 'GB'));
        $ramSpecification = substr($ram, strpos($ram, 'DDR'));

        // Storage data
        $storage = $data['hdd'];
        $storageDisksCount =  substr($storage, 0, strpos($storage, 'x'));
        $metric = strpos($storage, 'GB') ?: strpos($storage, 'TB');
        $diskType = substr($storage, $metric + 2);
        $storageEachDiskCapacity = substr($storage, strpos($storage, 'x') + 1, $metric - 2);
        $storageCapacity = (int)$storageEachDiskCapacity * (int)$storageDisksCount;
        $storageAlias = $storageCapacity . (strpos($storage, 'TB') ?  'TB' : 'GB');
        $storageCapacity = strpos($storage, 'TB') ? $storageCapacity * 1000 : $storageCapacity;
        
        // Price data
        $price = $data['price'];
        $priceAmount = (float) filter_var($price, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $currency = substr($price, 0, strpos($price, $priceAmount));
        
        return [
            'name' => $data['model'],
            'ram' => $ramCapacity,
            'ram_specification' => $ramSpecification,
            'storage' => $storageCapacity,
            'storage_alias' => $storageAlias,
            'storage_description' => $storage,
            'disk_type' => $diskType,
            'location' => $data['location'],
            'price' => $priceAmount,
            'currency' => $currency
        ];
    }
    
}