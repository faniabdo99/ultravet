<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ProductImport implements ToCollection {
    public function collection(Collection $collection){
        /*
         * The below method assumes the following:
             * 0: Product SKU
             * 1: Product Price
             * 3: Product Quantity
         * */
        foreach ($collection as $item){
            // Update the model record if found, otherwise do nothing
            $Product = Product::where('sku' , $item[0])->first();
            if($Product){
                $Product->update([
                    'price' => $item[1],
                    'qty' => $item[2]
                ]);
                dump("Item {$item[0]} Updated");
            }else{
                dump("Item {$item[0]} Not found");
            }
        }
    }
}
