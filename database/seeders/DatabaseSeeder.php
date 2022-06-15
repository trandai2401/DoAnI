<?php

namespace Database\Seeders;

use App\Models\BaiViet;
use App\Models\DanhMuc;
use App\Models\DanhMucCon;
use App\Models\HinhAnh;
use App\Models\QuanHuyen;
use App\Models\ThanhPho;
use App\Models\XaPhuong;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();

        $danhMuc = new DanhMuc();
        $danhMuc->tendanhmuc = "Địa điểm";
        $danhMuc->save();

        $danhMucCon = new DanhMucCon();
        $danhMucCon->tendanhmuc = "Biển";
        $danhMucCon->danhmuc_id = 1;
        $danhMucCon->save();

        $tinhThanh = new ThanhPho();
        $tinhThanh->ten = "Đà Nẵng";
        $tinhThanh->save();

        $quanHuyen = new QuanHuyen();
        $quanHuyen->ten = 'Sơn Trà';
        $quanHuyen->thanhpho_id = 1;
        $quanHuyen->save();

        $xaPhuong = new XaPhuong();
        $xaPhuong->ten = 'Thọ Quang';
        $xaPhuong->quanhuyen_id = 1;
        $xaPhuong->save();





        $baiViet = new BaiViet();
        $baiViet->trangthai = true;
        $baiViet->chitietbaiviet = 'Bãi Đá đen Bãi Đá Đen đặc biệt hơn những địa điểm khác bởi sở hữu nhiều tảng đá to màu đen, nằm xếp chồng hoặc xen kẽ vào nhau tạo nên những góc nhìn vừa lạ vừa đẹp. Cũng nhờ vào sự che chắn của những tảng đá lớn này mà nước ở đây trong vắt quanh năm và sóng cũng rất dịu nhẹ. Đỉnh Bàn Cờ Sơn Trà không chỉ có biển mà còn có núi. Một trong những hoạt động hấp dẫn du khách đó chính là hành trình leo núi khoảng 700m từ chân bán đảo lên đến đỉnh Bàn Cờ. Từ vị trí này, du khách có thể ngắm nhìn toàn bộ thành phố sầm uất nhộn nhịp phía xa.';
        $baiViet->user_id = '1';
        $baiViet->danhmuccon_id = 1;
        $baiViet->save();
        


        $hinhAnh = new HinhAnh();
        $hinhAnh->tenhinhanh = "images/baiviet/baidaden1.jpg";
        $hinhAnh->baiviet_id = 1;
        $hinhAnh->save();
        $hinhAnh = new HinhAnh();
        $hinhAnh->tenhinhanh = "images/baiviet/baidaden2.jpg";
        $hinhAnh->baiviet_id = 1;
        $hinhAnh->save();
        $hinhAnh = new HinhAnh();
        $hinhAnh->tenhinhanh = "images/baiviet/baidaden2.jpg";
        $hinhAnh->baiviet_id = 1;
        $hinhAnh->save();

    }
}
