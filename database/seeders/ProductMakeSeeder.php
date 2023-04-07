<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductMakeSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->delete();

        DB::table('products')->truncate();

        DB::table('products')->insert([
            [
                'name_product' => 'Trà sữa truyền thống',
                'slug_product' => 'tra-sua-truyen-thong',
                'id_product_catalog' => 1,
                'description_product' => 'Trà sữa với những nguyên liệu truyền thống',
                'price_product' => 20000,
                'sales_price_product' => 17500,
                'status_product' => 1,
                'image_product' => 'https://www.bartender.edu.vn/wp-content/uploads/2015/11/tra-sua-truyen-thong.jpg',
                'quantity_product' => 1,
            ],
            [
                'name_product' => 'Trà sữa trân châu đường đen',
                'slug_product' => 'tra-sua-truyen-thong',
                'id_product_catalog' => 1,
                'description_product' => 'Trà sữa trân châu đường đen vẫn gồm nguyên liệu là như trà sữa thông thường.
                                          Thông thường trà sữa trân châu đường đen sẽ sử dụng sữa tươi không đường để vị không bị ngọt quá và phù hợp với phần topping gồm trân châu và đường đen.
                                          Một điểm nữa khiến giới trẻ mê mẩn trà sữa trân châu đường đen so với các loại trà sữa khác đó là vẻ ngoài bắt mắt của cốc trà với phần trà sữa trắng hòa quyện khéo léo cùng phần đường đen, trân châu đen bên dưới.',
                'price_product' => 25000,
                'sales_price_product' => 21500,
                'status_product' => 1,
                'image_product' => 'https://horecavn.com/uploads/images/cong-thuc/sua-tuoi-tran-chau-duong-den(1).jpg',
                'quantity_product' => 1,
            ],
            [
                'name_product' => 'Trà sữa khoai môn',
                'slug_product' => 'tra-sua-khoai-mon',
                'id_product_catalog' => 1,
                'description_product' => 'Trà sữa khoai môn tuy không phải là thức uống mới nhưng nó vẫn giữ được độ hot với giới trẻ,
                                          đặc biệt là vào các khoảng thời gian hè nắng nóng. Trà sữa khoai môn có vị béo béo của sữa,
                                          mùi thơm của khoai môn cùng với chút vị chát nhẹ của trà.
                                          Thức uống này không quá ngọt và ngậy như những loại trà sữa có kem cheese,
                                          vị ngọt thanh mà vẫn có chút béo bùi là điểm cộng lớn nhất của trà sữa khoai môn.
                                          Trà sữa khoai môn một số nơi sẽ dùng bột khoai môn để pha chế hoặc có thể dùng củ khoai môn tươi xay lấy nước sẽ nguyên chất hơn.
                                          2 loại topping hợp với trà sữa khoai môn là trân châu đen và trân châu trắng.',
                'price_product' => 35000,
                'sales_price_product' => 30000,
                'status_product' => 1,
                'image_product' => 'https://bizweb.dktcdn.net/thumb/grande/100/421/036/products/combo-tra-sua-khoai-mon-2.jpg?v=1641544356143',
                'quantity_product' => 1,
            ],
            [
                'name_product' => 'Trà sữa sương sáo',
                'slug_product' => 'tra-sua-suong-sao',
                'id_product_catalog' => 1,
                'description_product' => 'Sương sáo, sương sa là những nguyên liệu phổ biến tại các tỉnh miền Nam và cực thích hợp cho những ngày hè nắng nóng.
                                          Sương sáo có tính giải nhiệt cao cùng với đó là nhiều công dụng tốt cho sức khỏe.
                                          Trà sữa sương sáo là sự kết hợp giữa trà sữa truyền thống với phần sương sáo mát lạnh.',
                'price_product' => 27000,
                'sales_price_product' => 22000,
                'status_product' => 1,
                'image_product' => 'https://i.ytimg.com/vi/yGq7myl1470/maxresdefault.jpg',
                'quantity_product' => 1,
            ],
            [
                'name_product' => 'Trà xoài kem cheese',
                'slug_product' => 'tra-xoai-kem-cheese',
                'id_product_catalog' => 1,
                'description_product' => 'Một trong những món đồ uống của các tín đồ kem cheese là trà xoài kem cheese.
                                          Trà xoài kem cheese được làm từ trà, xoài tươi cùng với phần kem cheese,
                                          tạo nên loại thức uống độc đáo có vị thơm đặc trưng của xoài, chút vị chua ngọt cùng với lớp kem béo béo, mặn mặn hấp dẫn nhiều người.',
                'price_product' => 35000,
                'sales_price_product' => 30000,
                'status_product' => 1,
                'image_product' => 'https://bizweb.dktcdn.net/thumb/grande/100/421/036/products/combo-tra-sua-khoai-mon-2.jpg?v=1641544356143',
                'quantity_product' => 1,
            ],
            [
                'name_product' => 'Cà phê sữa đá',
                'slug_product' => 'ca-phe-sua-da',
                'id_product_catalog' => 2,
                'description_product' => 'Cà phê sữa đá là một loại thức uống thông dụng ở Việt Nam.
                                          Cà phê sữa đá truyền thống được làm từ cà phê nguyên chất đựng trong phin với sữa đặc có đường và bỏ đá vào trong một cái ly bằng thủy tinh rồi thưởng thức.',
                'price_product' => 12000,
                'sales_price_product' => 10000,
                'status_product' => 1,
                'image_product' => 'https://123phache.com/wp-content/uploads/2020/02/ca_phe_sua_da-600x600-1.jpg',
                'quantity_product' => 1,
            ],
            [
                'name_product' => 'Bạc xỉu',
                'slug_product' => 'bac-xiu',
                'id_product_catalog' => 2,
                'description_product' => 'Bạc xỉu hay Bạc sỉu là một món đồ uống có nguồn gốc từ người Hoa sống ở vùng Sài Gòn-Chợ Lớn những năm thập niên 1950-1960 và là món thức uống phổ biến ở khu vực này và các vùng xung quanh.',
                'price_product' => 15000,
                'sales_price_product' => 12000,
                'status_product' => 1,
                'image_product' => 'https://cdn.dayphache.edu.vn/wp-content/uploads/2019/10/bac-xiu-da.jpg',
                'quantity_product' => 1,
            ],
            [
                'name_product' => 'Cà phê Mocha',
                'slug_product' => 'ca-phe-mocha',
                'id_product_catalog' => 2,
                'description_product' => 'Cafe Mocha có hương thơm nhẹ nhàng của cafe kết hợp với vị béo của kem và chocolate,
                                          không giống như Cappuccino hay Latte,
                                          một tách cafe Mocha mang đến cho người thưởng thức hương vị béo thơm của kem tươi cùng với vị ngậy của chocolate nóng.',
                'price_product' => 15000,
                'sales_price_product' => 12000,
                'status_product' => 1,
                'image_product' => 'https://vietblend.vn/wp-content/uploads/2018/12/cafe-mocha-nong.jpg',
                'quantity_product' => 1,
            ],
            [
                'name_product' => 'Cà phê Macchiato',
                'slug_product' => 'ca-phe-macchiato',
                'id_product_catalog' => 2,
                'description_product' => 'Macchiato (trong tiếng Ý có nghĩa là lốm đốm),
                                          bề mặt tách cà phê được thêm vài vệt sữa lên trên để tạo thành các đường gợn trông bắt mắt mà thôi.',
                'price_product' => 35000,
                'sales_price_product' => 32000,
                'status_product' => 1,
                'image_product' => 'https://bakingmischief.com/wp-content/uploads/2016/01/better-than-starbucks-caramel-macchiato-photo.jpg',
                'quantity_product' => 1,
            ],
            [
                'name_product' => 'Cà phê Cappuccino',
                'slug_product' => 'ca-phe-cappuccino',
                'id_product_catalog' => 2,
                'description_product' => 'Cà phê Cappuccino không còn quá xa lạ đối với người dân Việt Nam,
                                          một tách cà phê gồm 3 tầng thường được chia đều nhau: cà phê espresso, sữa nóng và bọt sữa.',
                'price_product' => 42000,
                'sales_price_product' => 40000,
                'status_product' => 1,
                'image_product' => 'https://media.istockphoto.com/id/505168330/photo/cup-of-cafe-latte-with-coffee-beans-and-cinnamon-sticks.jpg?s=612x612&w=0&k=20&c=h7v8kAfWOpRapv6hrDwmmB54DqrGQWxlhP_mTeqTQPA=',
                'quantity_product' => 1,
            ],
        ]);
    }
}
