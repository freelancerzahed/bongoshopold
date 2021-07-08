<?php

namespace App\Imports;

use App\PinCode;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class PinCodesImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    private $rows = 0;
    public function model(array $row)
    {
        ++$this->rows;
        return new PinCode([
            'pin_code' => $row['pin_code'],
           'delivery_time'    => $row['delivery_time'],
           'city'=> $row['city'],
           'state'=> $row['state']
        ]);
    }
    public function getRowCount(): int
    {
        return $this->rows;
    }
    
}
