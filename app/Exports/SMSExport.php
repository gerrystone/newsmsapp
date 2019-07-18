<?php

namespace App\Exports;

use AfricasTalking\SDK\AfricasTalking;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class SMSExport implements FromArray, WithHeadings, ShouldAutoSize
{
    private $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }
    public function array():array {
        return $this->data;
    }
    public function headings(): array
    {
        return[
            'Message',
            'Status'
        ];
    }
}
