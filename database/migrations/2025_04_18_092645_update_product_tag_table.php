<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::table('product_tag', function (Blueprint $table) {
        // Xóa foreign key trước
        $table->dropForeign(['product_id']);
        $table->dropForeign(['tag_id']);

        // Sau đó mới được xóa khóa chính
        $table->dropPrimary(['product_id', 'tag_id']);

        // Thêm cột id tự tăng
        $table->id()->first();

        // Thêm timestamps
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::table('product_tag', function (Blueprint $table) {
        $table->dropColumn(['id', 'created_at', 'updated_at']);

        // Phục hồi lại khóa chính cũ
        $table->primary(['product_id', 'tag_id']);

        // Phục hồi foreign key nếu muốn (tuỳ)
        $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
    });
}

};
