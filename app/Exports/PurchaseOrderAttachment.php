<?php

namespace App\Exports;

use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderItem;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PurchaseOrderAttachment implements FromCollection, ShouldAutoSize, WithHeadings, WithTitle, WithEvents
{
    public $purchaseOrder;

    public function __construct($po)
    {
        $this->purchaseOrder = $po;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data = collect();
       $po = PurchaseOrder::where('id',$this->purchaseOrder->id)->first();
        $i=1;
       $pois = PurchaseOrderItem::where('purchase_order_id',$po->id)->get();
        foreach ($pois as $poi) {
            $data->push([
                'Item'=>$i,
                'Product' => $poi->product->name, 
                'Qty' =>$poi->quantity, 
                'Unit Price'=>number_format(round($poi->unit_price,2),2), 
                'Amount'=> number_format(round($poi->ammount,2),2)
            ]);
            $i += 1 ;
        }
        return $data;
    }

    public function headings() : array{

        return ['Item','Product', 'Qty', 'Unit Price', 'Amount'];
    }

    public function title(): string
    {
        return 'ICAC - Purchase Order' ;
    }

    public function registerEvents(): array
    {
        return [AfterSheet::class => function(AfterSheet $event) {
            $event->sheet->insertNewRowBefore(1, 1);
            $event->sheet->mergeCells('A1:E1');
            $event->sheet->setCellValue('A1', 'Purchase Order' );
            $event->sheet->insertNewRowBefore(1, 1);
            $event->sheet->mergeCells('A1:E1');
            $event->sheet->setCellValue('A1', 'InterConnect Airport Cottages');

            $event->sheet->insertNewRowBefore(3, 1); 
            $event->sheet->insertNewRowBefore(3, 1); 
            $event->sheet->insertNewRowBefore(3, 1); 
            $event->sheet->insertNewRowBefore(3, 1); 
            $event->sheet->setCellValue('A4', "Supplier: ");
            $event->sheet->setCellValue('B4', "Company: ");
            $event->sheet->setCellValue('D4', "Expected: ");
            $event->sheet->setCellValue('E4', "Deadline: ");
           
            $event->sheet->setCellValue('A5',  $this->purchaseOrder->supplier->name);
            $event->sheet->setCellValue('B5',  $this->purchaseOrder->supplier->company);
            $event->sheet->setCellValue('D5',  $this->purchaseOrder->expected_arrival_date);
            $event->sheet->setCellValue('E5',  $this->purchaseOrder->order_deadline_date);

           


            $event->sheet->getStyle('A1')->applyFromArray([
                'font' => [
                    'bold' => true,
                    'size' => 20,
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
            ]);
            $event->sheet->getStyle('A2')->applyFromArray([
                'font' => [
                    'bold' => true,
                    'size' => 14,
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
            ]);

            $event->sheet->getStyle('A4:E4')->applyFromArray([
                'font' => [
                    'bold' => true,
                    'size' => 12,
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
            ]);

            $event->sheet->getStyle('A7:E7')->applyFromArray([
                'font' => [
                    'bold' => true,
                    'size' => 12,
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
            ]);

            $dataRows = count($this->collection()) + 8; // +8 for the title and date rows
            $range = 'A7:E' . $dataRows;

            // Apply borders to all cells
            $event->sheet->getStyle($range)->applyFromArray([
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    ],
                ],
            ]);

            $event->sheet->insertNewRowBefore(2, 1); 
            $event->sheet->mergeCells('A2:E2');
            $event->sheet->setCellValue('A2', 'Kitooro Rd. Entebbe   |   +256 750 084912   |   ' . url('/'));

            $event->sheet->getStyle('A2')->applyFromArray([
                'font' => [
                    'bold' => false,
                    'size' => 10,
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
            ]);

            // Calculate the total amount
            $totalAmount = 0;
            foreach ($this->collection() as $item) {
                $totalAmount += str_replace(',', '', $item['Amount']); // Remove commas for proper calculation
            }

            // Insert a new row for the grand total
            $event->sheet->setCellValue('D' . ($dataRows + 1), 'Grand Total:');
            $event->sheet->setCellValue('E' . ($dataRows + 1), number_format(round($totalAmount, 2), 2));

            $event->sheet->getStyle('D' . ($dataRows + 1) . ':E' . ($dataRows + 1))->applyFromArray([
                'font' => [
                    'bold' => true,
                    'size' => 12,
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
                ],
            ]);


        }];
    }
}
