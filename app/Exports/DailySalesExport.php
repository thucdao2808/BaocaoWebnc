<?php
namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DailySalesExport implements FromCollection, WithHeadings
{
    protected $dailyStats;

    public function __construct($dailyStats)
    {
        $this->dailyStats = $dailyStats;
    }

    public function collection()
    {
        return collect($this->dailyStats)->map(function($item) {
            return [
                'Ngày' => $item['date'],
                'Số đơn hàng' => $item['total_orders'],
                'Tổng sản phẩm bán' => $item['total_products'],
                'Doanh thu (VNĐ)' => $item['total_revenue'],
            ];
        });
    }

    public function headings(): array
    {
        return ['Ngày', 'Số đơn hàng', 'Tổng sản phẩm bán', 'Doanh thu (VNĐ)'];
    }
}
