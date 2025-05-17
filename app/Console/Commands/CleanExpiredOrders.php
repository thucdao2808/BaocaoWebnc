<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CleanExpiredOrders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'orders:clean-expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Xoá các đơn hàng chưa thanh toán sau 15 phút';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $expiredOrders = Order::where('status', 'Chưa thanh toán')
            ->where('created_at', '<', now()->subMinutes(15))
            ->get();

        foreach ($expiredOrders as $order) {
            $order->items()->delete(); // xoá order_items liên quan
            $order->delete();          // xoá đơn hàng
        }

        $this->info("Đã xoá {$expiredOrders->count()} đơn hàng hết hạn.");
    }
    
}
