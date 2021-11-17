<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class HoaDonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hoa_dons')->insert([
            ['id'=> 1, 'tai_khoans_id'=> 4,'ho_ten'=>'Liễu Quang Vinh','so_dien_thoai'=>'0366666666','dia_chi'=>'24 Hai Bà Trưng, Quận 1, TPHCM','ngay_lap_hd'=>'2021-01-02', 'tong_tien'=>12000, 'trang_thai_don_hang'=>4, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 2, 'tai_khoans_id'=> 6,'ho_ten'=>'Nguyễn Quang Hải','so_dien_thoai'=>'0377777777','dia_chi'=>'35 Tô Hiến Thành, Quận 10, TPHCM','ngay_lap_hd'=>'2021-02-03', 'tong_tien'=>160000, 'trang_thai_don_hang'=>4, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 3, 'tai_khoans_id'=> 10,'ho_ten'=>'Nguyễn Công Phượng','so_dien_thoai'=>'0344444444','dia_chi'=>'24 Xô Viết Nghệ Tĩnh, Quận Bình Thạnh, TPHCM','ngay_lap_hd'=>'2021-03-04', 'tong_tien'=>120000, 'trang_thai_don_hang'=>4, 'hinh_thuc_thanh_toan'=>true],
            ['id'=> 4, 'tai_khoans_id'=> 6,'ho_ten'=>'Nguyễn Quang Hải','so_dien_thoai'=>'0377777777','dia_chi'=>'35 Tô Hiến Thành, Quận 10, TPHCM','ngay_lap_hd'=>'2021-04-04', 'tong_tien'=>240000, 'trang_thai_don_hang'=>4, 'hinh_thuc_thanh_toan'=>true],
            ['id'=> 5, 'tai_khoans_id'=> 6,'ho_ten'=>'Nguyễn Quang Hải','so_dien_thoai'=>'0377777777','dia_chi'=>'35 Tô Hiến Thành, Quận 10, TPHCM','ngay_lap_hd'=>'2021-05-30', 'tong_tien'=>750000, 'trang_thai_don_hang'=>4, 'hinh_thuc_thanh_toan'=>true],
            ['id'=> 6, 'tai_khoans_id'=> 3,'ho_ten'=>'Hồ Tấn Tài','so_dien_thoai'=>'0366666666','dia_chi'=>'01 Lương Thế Vinh, Quận 2, TPHCM','ngay_lap_hd'=>'2021-06-23', 'tong_tien'=>378000, 'trang_thai_don_hang'=>4, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 7, 'tai_khoans_id'=> 4,'ho_ten'=>'Liễu Quang Vinh','so_dien_thoai'=>'0366666666','dia_chi'=>'24 Hai Bà Trưng, Quận 1, TPHCM','ngay_lap_hd'=>'2021-07-05', 'tong_tien'=>2550000, 'trang_thai_don_hang'=>4, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 8, 'tai_khoans_id'=> 4,'ho_ten'=>'Liễu Quang Vinh','so_dien_thoai'=>'0366666666','dia_chi'=>'24 Hai Bà Trưng, Quận 1, TPHCM','ngay_lap_hd'=>'2021-08-03', 'tong_tien'=>2550000, 'trang_thai_don_hang'=>4, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 9, 'tai_khoans_id'=> 5,'ho_ten'=>'Liễu Trúc Lan','so_dien_thoai'=>'0399999999','dia_chi'=>'82 Hàm Tử, Quận 8, TPHCM','ngay_lap_hd'=>'2021-09-21', 'tong_tien'=>1200000, 'trang_thai_don_hang'=>4, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 10, 'tai_khoans_id'=> 9,'ho_ten'=>'Bùi Tiến Dũng','so_dien_thoai'=>'0366666888','dia_chi'=>'24 Võ Văn Tần, Quận 3, TPHCM','ngay_lap_hd'=>'2021-10-12', 'tong_tien'=>320000, 'trang_thai_don_hang'=>4, 'hinh_thuc_thanh_toan'=>true],
            ['id'=> 12, 'tai_khoans_id'=> 9,'ho_ten'=>'Bùi Tiến Dũng','so_dien_thoai'=>'0366666888','dia_chi'=>'24 Võ Văn Tần, Quận 3, TPHCM','ngay_lap_hd'=>'2021-11-08', 'tong_tien'=>750000, 'trang_thai_don_hang'=>1, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 13, 'tai_khoans_id'=> 6,'ho_ten'=>'Nguyễn Quang Hải','so_dien_thoai'=>'0377777777','dia_chi'=>'35 Tô Hiến Thành, Quận 10, TPHCM','ngay_lap_hd'=>'2021-01-01', 'tong_tien'=>216000, 'trang_thai_don_hang'=>4, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 14, 'tai_khoans_id'=> 7,'ho_ten'=>'Hồ Duy Nhất','so_dien_thoai'=>'0366688888','dia_chi'=>'24 Âu Cơ, Quận 11, TPHCM','ngay_lap_hd'=>'2021-02-17', 'tong_tien'=>1500000, 'trang_thai_don_hang'=>4, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 15, 'tai_khoans_id'=> 7,'ho_ten'=>'Hồ Duy Nhất','so_dien_thoai'=>'0366688888','dia_chi'=>'24 Âu Cơ, Quận 11, TPHCM','ngay_lap_hd'=>'2021-03-15', 'tong_tien'=>750000, 'trang_thai_don_hang'=>4, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 16, 'tai_khoans_id'=> 7,'ho_ten'=>'Hồ Duy Nhất','so_dien_thoai'=>'0366688888','dia_chi'=>'24 Âu Cơ, Quận 11, TPHCM','ngay_lap_hd'=>'2021-04-15', 'tong_tien'=>150000, 'trang_thai_don_hang'=>4, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 17, 'tai_khoans_id'=> 7,'ho_ten'=>'Hồ Duy Nhất','so_dien_thoai'=>'0366688888','dia_chi'=>'24 Âu Cơ, Quận 11, TPHCM','ngay_lap_hd'=>'2021-05-16', 'tong_tien'=>420000, 'trang_thai_don_hang'=>4, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 18, 'tai_khoans_id'=> 8,'ho_ten'=>'Liễu Quang Vinh','so_dien_thoai'=>'0369999999','dia_chi'=>'24 Cộng Hòa, Quận 12, TPHCM','ngay_lap_hd'=>'2021-06-20', 'tong_tien'=>288000,'trang_thai_don_hang'=>4, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 19, 'tai_khoans_id'=> 8,'ho_ten'=>'Liễu Quang Vinh','so_dien_thoai'=>'0369999999','dia_chi'=>'24 Cộng Hòa, Quận 12, TPHCM','ngay_lap_hd'=>'2021-07-01', 'tong_tien'=>120000, 'trang_thai_don_hang'=>4, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 20, 'tai_khoans_id'=> 10,'ho_ten'=>'Nguyễn Công Phượng','so_dien_thoai'=>'0344444444','dia_chi'=>'24 Xô Viết Nghệ Tĩnh, Quận Bình Thạnh, TPHCM','ngay_lap_hd'=>'2021-08-09', 'tong_tien'=>120000, 'trang_thai_don_hang'=>4, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 21, 'tai_khoans_id'=> 10,'ho_ten'=>'Nguyễn Công Phượng','so_dien_thoai'=>'0344444444','dia_chi'=>'24 Xô Viết Nghệ Tĩnh, Quận Bình Thạnh, TPHCM','ngay_lap_hd'=>'2021-09-29', 'tong_tien'=>104000, 'trang_thai_don_hang'=>4, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 22, 'tai_khoans_id'=> 5,'ho_ten'=>'Liễu Trúc Lan','so_dien_thoai'=>'0399999999','dia_chi'=>'82 Hàm Tử, Quận 8, TPHCM','ngay_lap_hd'=>'2021-10-06', 'tong_tien'=>750000, 'trang_thai_don_hang'=>4, 'hinh_thuc_thanh_toan'=>true],
            ['id'=> 23, 'tai_khoans_id'=> 6,'ho_ten'=>'Nguyễn Quang Hải','so_dien_thoai'=>'0377777777','dia_chi'=>'35 Tô Hiến Thành, Quận 10, TPHCM','ngay_lap_hd'=>'2021-11-01', 'tong_tien'=>750000, 'trang_thai_don_hang'=>3, 'hinh_thuc_thanh_toan'=>true],
            
            ['id'=> 24, 'tai_khoans_id'=> 6,'ho_ten'=>'Nguyễn Quang Hải','so_dien_thoai'=>'0377777777','dia_chi'=>'35 Tô Hiến Thành, Quận 10, TPHCM','ngay_lap_hd'=>'2021-01-25', 'tong_tien'=>1275000, 'trang_thai_don_hang'=>4, 'hinh_thuc_thanh_toan'=>true],
            ['id'=> 25, 'tai_khoans_id'=> 4,'ho_ten'=>'Liễu Quang Vinh','so_dien_thoai'=>'0366666666','dia_chi'=>'24 Hai Bà Trưng, Quận 1, TPHCM','ngay_lap_hd'=>'2021-02-20', 'tong_tien'=>144000, 'trang_thai_don_hang'=>4, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 26, 'tai_khoans_id'=> 8,'ho_ten'=>'Liễu Quang Vinh','so_dien_thoai'=>'0369999999','dia_chi'=>'24 Cộng Hòa, Quận 12, TPHCM','ngay_lap_hd'=>'2021-10-24', 'tong_tien'=>125000, 'trang_thai_don_hang'=>3, 'hinh_thuc_thanh_toan'=>false],

            ['id'=> 27, 'tai_khoans_id'=> 9,'ho_ten'=>'Bùi Tiến Dũng','so_dien_thoai'=>'0366666888','dia_chi'=>'24 Võ Văn Tần, Quận 3, TPHCM','ngay_lap_hd'=>'2021-10-25', 'tong_tien'=>36000, 'trang_thai_don_hang'=>4, 'hinh_thuc_thanh_toan'=>true],
            ['id'=> 28, 'tai_khoans_id'=> 9,'ho_ten'=>'Bùi Tiến Dũng','so_dien_thoai'=>'0366666888','dia_chi'=>'24 Võ Văn Tần, Quận 3, TPHCM','ngay_lap_hd'=>'2021-10-26', 'tong_tien'=>1627000, 'trang_thai_don_hang'=>3, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 29, 'tai_khoans_id'=> 7,'ho_ten'=>'Hồ Duy Nhất','so_dien_thoai'=>'0366688888','dia_chi'=>'24 Âu Cơ, Quận 11, TPHCM','ngay_lap_hd'=>'2021-10-27', 'tong_tien'=>1320000, 'trang_thai_don_hang'=>2, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 30, 'tai_khoans_id'=> 5,'ho_ten'=>'Liễu Trúc Lan','so_dien_thoai'=>'0399999999','dia_chi'=>'82 Hàm Tử, Quận 8, TPHCM','ngay_lap_hd'=>'2021-10-28', 'tong_tien'=>752000, 'trang_thai_don_hang'=>2, 'hinh_thuc_thanh_toan'=>false],

            ['id'=> 31, 'tai_khoans_id'=> 9,'ho_ten'=>'Bùi Tiến Dũng','so_dien_thoai'=>'0366666888','dia_chi'=>'24 Võ Văn Tần, Quận 3, TPHCM','ngay_lap_hd'=>'2021-10-29', 'tong_tien'=>541000, 'trang_thai_don_hang'=>3, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 32, 'tai_khoans_id'=> 5,'ho_ten'=>'Liễu Trúc Lan','so_dien_thoai'=>'0399999999','dia_chi'=>'82 Hàm Tử, Quận 8, TPHCM','ngay_lap_hd'=>'2021-10-30', 'tong_tien'=>990000, 'trang_thai_don_hang'=>1, 'hinh_thuc_thanh_toan'=>false],

            ['id'=> 33, 'tai_khoans_id'=> 6,'ho_ten'=>'Nguyễn Quang Hải','so_dien_thoai'=>'0377777777','dia_chi'=>'35 Tô Hiến Thành, Quận 10, TPHCM','ngay_lap_hd'=>'2021-10-31', 'tong_tien'=>891000, 'trang_thai_don_hang'=>1, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 34, 'tai_khoans_id'=> 4,'ho_ten'=>'Liễu Quang Vinh','so_dien_thoai'=>'0366666666','dia_chi'=>'24 Hai Bà Trưng, Quận 1, TPHCM','ngay_lap_hd'=>'2021-11-01', 'tong_tien'=>1740000, 'trang_thai_don_hang'=>1, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 35, 'tai_khoans_id'=> 6,'ho_ten'=>'Nguyễn Quang Hải','so_dien_thoai'=>'0377777777','dia_chi'=>'35 Tô Hiến Thành, Quận 10, TPHCM','ngay_lap_hd'=>'2021-11-02', 'tong_tien'=>1230000, 'trang_thai_don_hang'=>2, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 36, 'tai_khoans_id'=> 10,'ho_ten'=>'Nguyễn Công Phượng','so_dien_thoai'=>'0344444444','dia_chi'=>'24 Xô Viết Nghệ Tĩnh, Quận Bình Thạnh, TPHCM','ngay_lap_hd'=>'2021-11-03', 'tong_tien'=>358000, 'trang_thai_don_hang'=>3, 'hinh_thuc_thanh_toan'=>true],
            ['id'=> 37, 'tai_khoans_id'=> 6,'ho_ten'=>'Nguyễn Quang Hải','so_dien_thoai'=>'0377777777','dia_chi'=>'35 Tô Hiến Thành, Quận 10, TPHCM','ngay_lap_hd'=>'2021-11-04', 'tong_tien'=>540000, 'trang_thai_don_hang'=>1, 'hinh_thuc_thanh_toan'=>true],
            ['id'=> 38, 'tai_khoans_id'=> 6,'ho_ten'=>'Nguyễn Quang Hải','so_dien_thoai'=>'0377777777','dia_chi'=>'35 Tô Hiến Thành, Quận 10, TPHCM','ngay_lap_hd'=>'2021-11-05', 'tong_tien'=>1152000, 'trang_thai_don_hang'=>3, 'hinh_thuc_thanh_toan'=>true],
            ['id'=> 39, 'tai_khoans_id'=> 3,'ho_ten'=>'Hồ Tấn Tài','so_dien_thoai'=>'0366666666','dia_chi'=>'01 Lương Thế Vinh, Quận 2, TPHCM','ngay_lap_hd'=>'2021-11-06', 'tong_tien'=>1020000, 'trang_thai_don_hang'=>1, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 40, 'tai_khoans_id'=> 4,'ho_ten'=>'Liễu Quang Vinh','so_dien_thoai'=>'0366666666','dia_chi'=>'24 Hai Bà Trưng, Quận 1, TPHCM','ngay_lap_hd'=>'2021-11-07', 'tong_tien'=>3120000, 'trang_thai_don_hang'=>3, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 41, 'tai_khoans_id'=> 4,'ho_ten'=>'Liễu Quang Vinh','so_dien_thoai'=>'0366666666','dia_chi'=>'24 Hai Bà Trưng, Quận 1, TPHCM','ngay_lap_hd'=>'2021-11-08', 'tong_tien'=>129000, 'trang_thai_don_hang'=>1, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 42, 'tai_khoans_id'=> 5,'ho_ten'=>'Liễu Trúc Lan','so_dien_thoai'=>'0399999999','dia_chi'=>'82 Hàm Tử, Quận 8, TPHCM','ngay_lap_hd'=>'2021-11-09', 'tong_tien'=>144000, 'trang_thai_don_hang'=>1, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 43, 'tai_khoans_id'=> 9,'ho_ten'=>'Bùi Tiến Dũng','so_dien_thoai'=>'0366666888','dia_chi'=>'24 Võ Văn Tần, Quận 3, TPHCM','ngay_lap_hd'=>'2021-11-10', 'tong_tien'=>120000, 'trang_thai_don_hang'=>2, 'hinh_thuc_thanh_toan'=>true],
            ['id'=> 44, 'tai_khoans_id'=> 9,'ho_ten'=>'Bùi Tiến Dũng','so_dien_thoai'=>'0366666888','dia_chi'=>'24 Võ Văn Tần, Quận 3, TPHCM','ngay_lap_hd'=>'2021-11-11', 'tong_tien'=>216000, 'trang_thai_don_hang'=>3, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 45, 'tai_khoans_id'=> 6,'ho_ten'=>'Nguyễn Quang Hải','so_dien_thoai'=>'0377777777','dia_chi'=>'35 Tô Hiến Thành, Quận 10, TPHCM','ngay_lap_hd'=>'2021-11-12', 'tong_tien'=>750000, 'trang_thai_don_hang'=>1, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 46, 'tai_khoans_id'=> 7,'ho_ten'=>'Hồ Duy Nhất','so_dien_thoai'=>'0366688888','dia_chi'=>'24 Âu Cơ, Quận 11, TPHCM','ngay_lap_hd'=>'2021-11-13', 'tong_tien'=>378000, 'trang_thai_don_hang'=>4, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 47, 'tai_khoans_id'=> 7,'ho_ten'=>'Hồ Duy Nhất','so_dien_thoai'=>'0366688888','dia_chi'=>'24 Âu Cơ, Quận 11, TPHCM','ngay_lap_hd'=>'2021-11-14', 'tong_tien'=>2550000, 'trang_thai_don_hang'=>4, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 48, 'tai_khoans_id'=> 7,'ho_ten'=>'Hồ Duy Nhất','so_dien_thoai'=>'0366688888','dia_chi'=>'24 Âu Cơ, Quận 11, TPHCM','ngay_lap_hd'=>'2021-11-15', 'tong_tien'=>2550000, 'trang_thai_don_hang'=>4, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 49, 'tai_khoans_id'=> 7,'ho_ten'=>'Hồ Duy Nhất','so_dien_thoai'=>'0366688888','dia_chi'=>'24 Âu Cơ, Quận 11, TPHCM','ngay_lap_hd'=>'2021-11-16', 'tong_tien'=>1200000, 'trang_thai_don_hang'=>4, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 50, 'tai_khoans_id'=> 8,'ho_ten'=>'Liễu Quang Vinh','so_dien_thoai'=>'0369999999','dia_chi'=>'24 Cộng Hòa, Quận 12, TPHCM','ngay_lap_hd'=>'2021-11-17', 'tong_tien'=>320000, 'trang_thai_don_hang'=>4, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 51, 'tai_khoans_id'=> 8,'ho_ten'=>'Liễu Quang Vinh','so_dien_thoai'=>'0369999999','dia_chi'=>'24 Cộng Hòa, Quận 12, TPHCM','ngay_lap_hd'=>'2021-11-01', 'tong_tien'=>25000, 'trang_thai_don_hang'=>3, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 52, 'tai_khoans_id'=> 10,'ho_ten'=>'Nguyễn Công Phượng','so_dien_thoai'=>'0344444444','dia_chi'=>'24 Xô Viết Nghệ Tĩnh, Quận Bình Thạnh, TPHCM','ngay_lap_hd'=>'2021-11-02', 'tong_tien'=>894000, 'trang_thai_don_hang'=>2, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 53, 'tai_khoans_id'=> 10,'ho_ten'=>'Nguyễn Công Phượng','so_dien_thoai'=>'0344444444','dia_chi'=>'24 Xô Viết Nghệ Tĩnh, Quận Bình Thạnh, TPHCM','ngay_lap_hd'=>'2021-11-03', 'tong_tien'=>870000, 'trang_thai_don_hang'=>3, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 54, 'tai_khoans_id'=> 5,'ho_ten'=>'Liễu Trúc Lan','so_dien_thoai'=>'0399999999','dia_chi'=>'82 Hàm Tử, Quận 8, TPHCM','ngay_lap_hd'=>'2021-11-04', 'tong_tien'=>1491000, 'trang_thai_don_hang'=>4, 'hinh_thuc_thanh_toan'=>true],
            ['id'=> 55, 'tai_khoans_id'=> 6,'ho_ten'=>'Nguyễn Quang Hải','so_dien_thoai'=>'0377777777','dia_chi'=>'35 Tô Hiến Thành, Quận 10, TPHCM','ngay_lap_hd'=>'2021-11-05', 'tong_tien'=>894000, 'trang_thai_don_hang'=>3, 'hinh_thuc_thanh_toan'=>true],
            
            ['id'=> 56, 'tai_khoans_id'=> 6,'ho_ten'=>'Nguyễn Quang Hải','so_dien_thoai'=>'0377777777','dia_chi'=>'35 Tô Hiến Thành, Quận 10, TPHCM','ngay_lap_hd'=>'2021-11-06', 'tong_tien'=>503000, 'trang_thai_don_hang'=>1, 'hinh_thuc_thanh_toan'=>true],
            ['id'=> 57, 'tai_khoans_id'=> 4,'ho_ten'=>'Liễu Quang Vinh','so_dien_thoai'=>'0366666666','dia_chi'=>'24 Hai Bà Trưng, Quận 1, TPHCM','ngay_lap_hd'=>'2021-11-07', 'tong_tien'=>2586000, 'trang_thai_don_hang'=>3, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 58, 'tai_khoans_id'=> 8,'ho_ten'=>'Liễu Quang Vinh','so_dien_thoai'=>'0369999999','dia_chi'=>'24 Cộng Hòa, Quận 12, TPHCM','ngay_lap_hd'=>'2021-11-08', 'tong_tien'=>1038000, 'trang_thai_don_hang'=>2, 'hinh_thuc_thanh_toan'=>false],

            ['id'=> 59, 'tai_khoans_id'=> 9,'ho_ten'=>'Bùi Tiến Dũng','so_dien_thoai'=>'0366666888','dia_chi'=>'24 Võ Văn Tần, Quận 3, TPHCM','ngay_lap_hd'=>'2021-11-09', 'tong_tien'=>270000, 'trang_thai_don_hang'=>2, 'hinh_thuc_thanh_toan'=>true],
            ['id'=> 60, 'tai_khoans_id'=> 9,'ho_ten'=>'Bùi Tiến Dũng','so_dien_thoai'=>'0366666888','dia_chi'=>'24 Võ Văn Tần, Quận 3, TPHCM','ngay_lap_hd'=>'2021-11-10', 'tong_tien'=>540000, 'trang_thai_don_hang'=>3, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 61, 'tai_khoans_id'=> 7,'ho_ten'=>'Hồ Duy Nhất','so_dien_thoai'=>'0366688888','dia_chi'=>'24 Âu Cơ, Quận 11, TPHCM','ngay_lap_hd'=>'2021-11-11', 'tong_tien'=>229000, 'trang_thai_don_hang'=>4, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 62, 'tai_khoans_id'=> 5,'ho_ten'=>'Liễu Trúc Lan','so_dien_thoai'=>'0399999999','dia_chi'=>'82 Hàm Tử, Quận 8, TPHCM','ngay_lap_hd'=>'2021-11-12', 'tong_tien'=>1500000, 'trang_thai_don_hang'=>4, 'hinh_thuc_thanh_toan'=>false],

            ['id'=> 63, 'tai_khoans_id'=> 9,'ho_ten'=>'Bùi Tiến Dũng','so_dien_thoai'=>'0366666888','dia_chi'=>'24 Võ Văn Tần, Quận 3, TPHCM','ngay_lap_hd'=>'2021-11-13', 'tong_tien'=>216000, 'trang_thai_don_hang'=>1, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 64, 'tai_khoans_id'=> 5,'ho_ten'=>'Liễu Trúc Lan','so_dien_thoai'=>'0399999999','dia_chi'=>'82 Hàm Tử, Quận 8, TPHCM','ngay_lap_hd'=>'2021-11-14', 'tong_tien'=>150000, 'trang_thai_don_hang'=>4, 'hinh_thuc_thanh_toan'=>false],

        ]);
    }
}
