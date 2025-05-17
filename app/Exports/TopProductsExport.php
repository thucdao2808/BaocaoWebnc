<?php
namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TopProductsExport implements FromCollection, WithHeadings
{
    protected $topProducts;

    public function __construct($topProducts)
    {
        $this->topProducts = $topProducts;
    }

    public function collection()
    {
        return collect($this->topProducts)->map(function($item, $index) {
            return [
                'STT' => $index + 1,
                'Tên sản phẩm' => $item->product_name,
                'Mã SP' => $item->product_id,
                'Số lượng bán' => $item->total_quantity,
                'Doanh thu (VNĐ)' => $item->total_revenue,
            ];
        });
    }

    public function headings(): array
    {
        return ['STT', 'Tên sản phẩm', 'Mã SP', 'Số lượng bán', 'Doanh thu (VNĐ)'];
    }
}
