<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StoreProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     DB::table('products')->truncate();

     DB::table('products')->insert([

// Latest Watches--- >
        [
        'name'=> "Latest Watch 01",
        'price'=> rand(900, 2000),
        'image'=> 'latest_watch_01.jpg',
        'description'=> "<p><strong>Products Detials</strong><br /><strong>-------------------</strong><br />Carson Analogue Blue Dial Men's Watch - CR1535</p> <p><em>Cash on Delivery eligible.</em><br />In stock.</p> <p><br />Delivery to pincode 400001 - Mumbai within 2 - 4 business days. Details<br />Sold by E-fashionRetail (4.1 out of 5 | 111 ratings) and Fulfilled by Amazon. Gift-wrap available.<br />Day And Date Display</p> <p>Three hands that move in a smooth and uninterrupted fashion</p> <ul style='list-style-type: disc;'> <li>Carson India Two Years Warranty</li> <li>Packed In Carson Gift Box</li><li>Works on Japanese Quartz format</li> </ul>",
        'category_id'=> 11,
        ],
        [
        'name'=> "Latest Watch 02",
        'price'=> rand(900, 2000),
        'image'=> 'latest_watch_02.jpg',
        'description'=> "<p><strong>Products Detials</strong><br /><strong>-------------------</strong><br />Carson Analogue Blue Dial Men's Watch - CR1535</p> <p><em>Cash on Delivery eligible.</em><br />In stock.</p> <p><br />Delivery to pincode 400001 - Mumbai within 2 - 4 business days. Details<br />Sold by E-fashionRetail (4.1 out of 5 | 111 ratings) and Fulfilled by Amazon. Gift-wrap available.<br />Day And Date Display</p> <p>Three hands that move in a smooth and uninterrupted fashion</p> <ul style='list-style-type: disc;'> <li>Carson India Two Years Warranty</li> <li>Packed In Carson Gift Box</li><li>Works on Japanese Quartz format</li> </ul>",
        'category_id'=> 11,
        ],
        [
        'name'=> "Latest Watch 03",
        'price'=> rand(900, 2000),
        'image'=> 'latest_watch_03.jpg',
        'description'=> "<p><strong>Products Detials</strong><br /><strong>-------------------</strong><br />Carson Analogue Blue Dial Men's Watch - CR1535</p> <p><em>Cash on Delivery eligible.</em><br />In stock.</p> <p><br />Delivery to pincode 400001 - Mumbai within 2 - 4 business days. Details<br />Sold by E-fashionRetail (4.1 out of 5 | 111 ratings) and Fulfilled by Amazon. Gift-wrap available.<br />Day And Date Display</p> <p>Three hands that move in a smooth and uninterrupted fashion</p> <ul style='list-style-type: disc;'> <li>Carson India Two Years Warranty</li> <li>Packed In Carson Gift Box</li><li>Works on Japanese Quartz format</li> </ul>",
        'category_id'=> 11,
        ],
        [
        'name'=> "Latest Watch 04",
        'price'=> rand(900, 2000),
        'image'=> 'latest_watch_04.jpg',
        'description'=> "<p><strong>Products Detials</strong><br /><strong>-------------------</strong><br />Carson Analogue Blue Dial Men's Watch - CR1535</p> <p><em>Cash on Delivery eligible.</em><br />In stock.</p> <p><br />Delivery to pincode 400001 - Mumbai within 2 - 4 business days. Details<br />Sold by E-fashionRetail (4.1 out of 5 | 111 ratings) and Fulfilled by Amazon. Gift-wrap available.<br />Day And Date Display</p> <p>Three hands that move in a smooth and uninterrupted fashion</p> <ul style='list-style-type: disc;'> <li>Carson India Two Years Warranty</li> <li>Packed In Carson Gift Box</li><li>Works on Japanese Quartz format</li> </ul>",
        'category_id'=> 11,
        ],
        [
        'name'=> "Latest Watch 05",
        'price'=> rand(900, 2000),
        'image'=> 'latest_watch_05.jpg',
        'description'=> "<p><strong>Products Detials</strong><br /><strong>-------------------</strong><br />Carson Analogue Blue Dial Men's Watch - CR1535</p> <p><em>Cash on Delivery eligible.</em><br />In stock.</p> <p><br />Delivery to pincode 400001 - Mumbai within 2 - 4 business days. Details<br />Sold by E-fashionRetail (4.1 out of 5 | 111 ratings) and Fulfilled by Amazon. Gift-wrap available.<br />Day And Date Display</p> <p>Three hands that move in a smooth and uninterrupted fashion</p> <ul style='list-style-type: disc;'> <li>Carson India Two Years Warranty</li> <li>Packed In Carson Gift Box</li><li>Works on Japanese Quartz format</li> </ul>",
        'category_id'=> 11,
        ],
        [
        'name'=> "Latest Watch 06",
        'price'=> rand(900, 2000),
        'image'=> 'latest_watch_06.jpg',
        'description'=> "<p><strong>Products Detials</strong><br /><strong>-------------------</strong><br />Carson Analogue Blue Dial Men's Watch - CR1535</p> <p><em>Cash on Delivery eligible.</em><br />In stock.</p> <p><br />Delivery to pincode 400001 - Mumbai within 2 - 4 business days. Details<br />Sold by E-fashionRetail (4.1 out of 5 | 111 ratings) and Fulfilled by Amazon. Gift-wrap available.<br />Day And Date Display</p> <p>Three hands that move in a smooth and uninterrupted fashion</p> <ul style='list-style-type: disc;'> <li>Carson India Two Years Warranty</li> <li>Packed In Carson Gift Box</li><li>Works on Japanese Quartz format</li> </ul>",
        'category_id'=> 11,
        ],
// Best Watches--- >
        [
        'name'=> "Best Watch 01",
        'price'=> rand(900, 2000),
        'image'=> 'best_watch_01.jpg',
        'description'=> "<p><strong>Products Detials</strong><br /><strong>-------------------</strong><br />Carson Analogue Blue Dial Men's Watch - CR1535</p> <p><em>Cash on Delivery eligible.</em><br />In stock.</p> <p><br />Delivery to pincode 400001 - Mumbai within 2 - 4 business days. Details<br />Sold by E-fashionRetail (4.1 out of 5 | 111 ratings) and Fulfilled by Amazon. Gift-wrap available.<br />Day And Date Display</p> <p>Three hands that move in a smooth and uninterrupted fashion</p> <ul style='list-style-type: disc;'> <li>Carson India Two Years Warranty</li> <li>Packed In Carson Gift Box</li><li>Works on Japanese Quartz format</li> </ul>",
        'category_id'=> 12,
        ],
        [
        'name'=> "Best Watch 02",
        'price'=> rand(900, 2000),
        'image'=> 'best_watch_02.jpg',
        'description'=> "<p><strong>Products Detials</strong><br /><strong>-------------------</strong><br />Carson Analogue Blue Dial Men's Watch - CR1535</p> <p><em>Cash on Delivery eligible.</em><br />In stock.</p> <p><br />Delivery to pincode 400001 - Mumbai within 2 - 4 business days. Details<br />Sold by E-fashionRetail (4.1 out of 5 | 111 ratings) and Fulfilled by Amazon. Gift-wrap available.<br />Day And Date Display</p> <p>Three hands that move in a smooth and uninterrupted fashion</p> <ul style='list-style-type: disc;'> <li>Carson India Two Years Warranty</li> <li>Packed In Carson Gift Box</li><li>Works on Japanese Quartz format</li> </ul>",
        'category_id'=> 12,
        ],
        [
        'name'=> "Best Watch 03",
        'price'=> rand(900, 2000),
        'image'=> 'best_watch_03.jpg',
        'description'=> "<p><strong>Products Detials</strong><br /><strong>-------------------</strong><br />Carson Analogue Blue Dial Men's Watch - CR1535</p> <p><em>Cash on Delivery eligible.</em><br />In stock.</p> <p><br />Delivery to pincode 400001 - Mumbai within 2 - 4 business days. Details<br />Sold by E-fashionRetail (4.1 out of 5 | 111 ratings) and Fulfilled by Amazon. Gift-wrap available.<br />Day And Date Display</p> <p>Three hands that move in a smooth and uninterrupted fashion</p> <ul style='list-style-type: disc;'> <li>Carson India Two Years Warranty</li> <li>Packed In Carson Gift Box</li><li>Works on Japanese Quartz format</li> </ul>",
        'category_id'=> 12,
        ],
        [
        'name'=> "Best Watch 04",
        'price'=> rand(900, 2000),
        'image'=> 'best_watch_04.jpg',
        'description'=> "<p><strong>Products Detials</strong><br /><strong>-------------------</strong><br />Carson Analogue Blue Dial Men's Watch - CR1535</p> <p><em>Cash on Delivery eligible.</em><br />In stock.</p> <p><br />Delivery to pincode 400001 - Mumbai within 2 - 4 business days. Details<br />Sold by E-fashionRetail (4.1 out of 5 | 111 ratings) and Fulfilled by Amazon. Gift-wrap available.<br />Day And Date Display</p> <p>Three hands that move in a smooth and uninterrupted fashion</p> <ul style='list-style-type: disc;'> <li>Carson India Two Years Warranty</li> <li>Packed In Carson Gift Box</li><li>Works on Japanese Quartz format</li> </ul>",
        'category_id'=> 12,
        ],
        [
        'name'=> "Best Watch 05",
        'price'=> rand(900, 2000),
        'image'=> 'best_watch_05.jpg',
        'description'=> "<p><strong>Products Detials</strong><br /><strong>-------------------</strong><br />Carson Analogue Blue Dial Men's Watch - CR1535</p> <p><em>Cash on Delivery eligible.</em><br />In stock.</p> <p><br />Delivery to pincode 400001 - Mumbai within 2 - 4 business days. Details<br />Sold by E-fashionRetail (4.1 out of 5 | 111 ratings) and Fulfilled by Amazon. Gift-wrap available.<br />Day And Date Display</p> <p>Three hands that move in a smooth and uninterrupted fashion</p> <ul style='list-style-type: disc;'> <li>Carson India Two Years Warranty</li> <li>Packed In Carson Gift Box</li><li>Works on Japanese Quartz format</li> </ul>",
        'category_id'=> 12,
        ],
        [
        'name'=> "Best Watch 06",
        'price'=> rand(900, 2000),
        'image'=> 'best_watch_06.jpg',
        'description'=> "<p><strong>Products Detials</strong><br /><strong>-------------------</strong><br />Carson Analogue Blue Dial Men's Watch - CR1535</p> <p><em>Cash on Delivery eligible.</em><br />In stock.</p> <p><br />Delivery to pincode 400001 - Mumbai within 2 - 4 business days. Details<br />Sold by E-fashionRetail (4.1 out of 5 | 111 ratings) and Fulfilled by Amazon. Gift-wrap available.<br />Day And Date Display</p> <p>Three hands that move in a smooth and uninterrupted fashion</p> <ul style='list-style-type: disc;'> <li>Carson India Two Years Warranty</li> <li>Packed In Carson Gift Box</li><li>Works on Japanese Quartz format</li> </ul>",
        'category_id'=> 12,
        ],
        [
        'name'=> "Best Watch 07",
        'price'=> rand(900, 2000),
        'image'=> 'best_watch_07.jpg',
        'description'=> "<p><strong>Products Detials</strong><br /><strong>-------------------</strong><br />Carson Analogue Blue Dial Men's Watch - CR1535</p> <p><em>Cash on Delivery eligible.</em><br />In stock.</p> <p><br />Delivery to pincode 400001 - Mumbai within 2 - 4 business days. Details<br />Sold by E-fashionRetail (4.1 out of 5 | 111 ratings) and Fulfilled by Amazon. Gift-wrap available.<br />Day And Date Display</p> <p>Three hands that move in a smooth and uninterrupted fashion</p> <ul style='list-style-type: disc;'> <li>Carson India Two Years Warranty</li> <li>Packed In Carson Gift Box</li><li>Works on Japanese Quartz format</li> </ul>",
        'category_id'=> 12,
        ],
        [
        'name'=> "Best Watch 08",
        'price'=> rand(900, 2000),
        'image'=> 'best_watch_08.jpg',
        'description'=> "<p><strong>Products Detials</strong><br /><strong>-------------------</strong><br />Carson Analogue Blue Dial Men's Watch - CR1535</p> <p><em>Cash on Delivery eligible.</em><br />In stock.</p> <p><br />Delivery to pincode 400001 - Mumbai within 2 - 4 business days. Details<br />Sold by E-fashionRetail (4.1 out of 5 | 111 ratings) and Fulfilled by Amazon. Gift-wrap available.<br />Day And Date Display</p> <p>Three hands that move in a smooth and uninterrupted fashion</p> <ul style='list-style-type: disc;'> <li>Carson India Two Years Warranty</li> <li>Packed In Carson Gift Box</li><li>Works on Japanese Quartz format</li> </ul>",
        'category_id'=> 12,
        ],
// Timex Watches--- >
        [
        'name'=> "Timex Watch 01",
        'price'=> rand(900, 2000),
        'image'=> 'timex_watch_01.jpg',
        'description'=> "<p><strong>Products Detials</strong><br /><strong>-------------------</strong><br />Carson Analogue Blue Dial Men's Watch - CR1535</p> <p><em>Cash on Delivery eligible.</em><br />In stock.</p> <p><br />Delivery to pincode 400001 - Mumbai within 2 - 4 business days. Details<br />Sold by E-fashionRetail (4.1 out of 5 | 111 ratings) and Fulfilled by Amazon. Gift-wrap available.<br />Day And Date Display</p> <p>Three hands that move in a smooth and uninterrupted fashion</p> <ul style='list-style-type: disc;'> <li>Carson India Two Years Warranty</li> <li>Packed In Carson Gift Box</li><li>Works on Japanese Quartz format</li> </ul>",
        'category_id'=> 13,
        ],
        [
        'name'=> "Timex Watch 02",
        'price'=> rand(900, 2000),
        'image'=> 'timex_watch_02.jpg',
        'description'=> "<p><strong>Products Detials</strong><br /><strong>-------------------</strong><br />Carson Analogue Blue Dial Men's Watch - CR1535</p> <p><em>Cash on Delivery eligible.</em><br />In stock.</p> <p><br />Delivery to pincode 400001 - Mumbai within 2 - 4 business days. Details<br />Sold by E-fashionRetail (4.1 out of 5 | 111 ratings) and Fulfilled by Amazon. Gift-wrap available.<br />Day And Date Display</p> <p>Three hands that move in a smooth and uninterrupted fashion</p> <ul style='list-style-type: disc;'> <li>Carson India Two Years Warranty</li> <li>Packed In Carson Gift Box</li><li>Works on Japanese Quartz format</li> </ul>",
        'category_id'=> 13,
        ],
        [
        'name'=> "Timex Watch 03",
        'price'=> rand(900, 2000),
        'image'=> 'timex_watch_03.jpg',
        'description'=> "<p><strong>Products Detials</strong><br /><strong>-------------------</strong><br />Carson Analogue Blue Dial Men's Watch - CR1535</p> <p><em>Cash on Delivery eligible.</em><br />In stock.</p> <p><br />Delivery to pincode 400001 - Mumbai within 2 - 4 business days. Details<br />Sold by E-fashionRetail (4.1 out of 5 | 111 ratings) and Fulfilled by Amazon. Gift-wrap available.<br />Day And Date Display</p> <p>Three hands that move in a smooth and uninterrupted fashion</p> <ul style='list-style-type: disc;'> <li>Carson India Two Years Warranty</li> <li>Packed In Carson Gift Box</li><li>Works on Japanese Quartz format</li> </ul>",
        'category_id'=> 13,
        ],
        [
        'name'=> "Timex Watch 04",
        'price'=> rand(900, 2000),
        'image'=> 'timex_watch_04.jpg',
        'description'=> "<p><strong>Products Detials</strong><br /><strong>-------------------</strong><br />Carson Analogue Blue Dial Men's Watch - CR1535</p> <p><em>Cash on Delivery eligible.</em><br />In stock.</p> <p><br />Delivery to pincode 400001 - Mumbai within 2 - 4 business days. Details<br />Sold by E-fashionRetail (4.1 out of 5 | 111 ratings) and Fulfilled by Amazon. Gift-wrap available.<br />Day And Date Display</p> <p>Three hands that move in a smooth and uninterrupted fashion</p> <ul style='list-style-type: disc;'> <li>Carson India Two Years Warranty</li> <li>Packed In Carson Gift Box</li><li>Works on Japanese Quartz format</li> </ul>",
        'category_id'=> 13,
        ],
        [
        'name'=> "Timex Watch 05",
        'price'=> rand(900, 2000),
        'image'=> 'timex_watch_05.jpg',
        'description'=> "<p><strong>Products Detials</strong><br /><strong>-------------------</strong><br />Carson Analogue Blue Dial Men's Watch - CR1535</p> <p><em>Cash on Delivery eligible.</em><br />In stock.</p> <p><br />Delivery to pincode 400001 - Mumbai within 2 - 4 business days. Details<br />Sold by E-fashionRetail (4.1 out of 5 | 111 ratings) and Fulfilled by Amazon. Gift-wrap available.<br />Day And Date Display</p> <p>Three hands that move in a smooth and uninterrupted fashion</p> <ul style='list-style-type: disc;'> <li>Carson India Two Years Warranty</li> <li>Packed In Carson Gift Box</li><li>Works on Japanese Quartz format</li> </ul>",
        'category_id'=> 13,
        ],
        [
        'name'=> "Timex Watch 06",
        'price'=> rand(900, 2000),
        'image'=> 'timex_watch_06.jpg',
        'description'=> "<p><strong>Products Detials</strong><br /><strong>-------------------</strong><br />Carson Analogue Blue Dial Men's Watch - CR1535</p> <p><em>Cash on Delivery eligible.</em><br />In stock.</p> <p><br />Delivery to pincode 400001 - Mumbai within 2 - 4 business days. Details<br />Sold by E-fashionRetail (4.1 out of 5 | 111 ratings) and Fulfilled by Amazon. Gift-wrap available.<br />Day And Date Display</p> <p>Three hands that move in a smooth and uninterrupted fashion</p> <ul style='list-style-type: disc;'> <li>Carson India Two Years Warranty</li> <li>Packed In Carson Gift Box</li><li>Works on Japanese Quartz format</li> </ul>",
        'category_id'=> 13,
        ],
        [
        'name'=> "Timex Watch 07",
        'price'=> rand(900, 2000),
        'image'=> 'timex_watch_07.jpg',
        'description'=> "<p><strong>Products Detials</strong><br /><strong>-------------------</strong><br />Carson Analogue Blue Dial Men's Watch - CR1535</p> <p><em>Cash on Delivery eligible.</em><br />In stock.</p> <p><br />Delivery to pincode 400001 - Mumbai within 2 - 4 business days. Details<br />Sold by E-fashionRetail (4.1 out of 5 | 111 ratings) and Fulfilled by Amazon. Gift-wrap available.<br />Day And Date Display</p> <p>Three hands that move in a smooth and uninterrupted fashion</p> <ul style='list-style-type: disc;'> <li>Carson India Two Years Warranty</li> <li>Packed In Carson Gift Box</li><li>Works on Japanese Quartz format</li> </ul>",
        'category_id'=> 13,
        ],
        [
        'name'=> "Timex Watch 08",
        'price'=> rand(900, 2000),
        'image'=> 'timex_watch_08.jpg',
        'description'=> "<p><strong>Products Detials</strong><br /><strong>-------------------</strong><br />Carson Analogue Blue Dial Men's Watch - CR1535</p> <p><em>Cash on Delivery eligible.</em><br />In stock.</p> <p><br />Delivery to pincode 400001 - Mumbai within 2 - 4 business days. Details<br />Sold by E-fashionRetail (4.1 out of 5 | 111 ratings) and Fulfilled by Amazon. Gift-wrap available.<br />Day And Date Display</p> <p>Three hands that move in a smooth and uninterrupted fashion</p> <ul style='list-style-type: disc;'> <li>Carson India Two Years Warranty</li> <li>Packed In Carson Gift Box</li><li>Works on Japanese Quartz format</li> </ul>",
        'category_id'=> 13,
        ],

        // Citizen Watches--- >
        [
        'name'=> "Citizen Watch 01",
        'price'=> rand(900, 2000),
        'image'=> 'citizen_watch_01.jpg',
        'description'=> "<p><strong>Products Detials</strong><br /><strong>-------------------</strong><br />Carson Analogue Blue Dial Men's Watch - CR1535</p> <p><em>Cash on Delivery eligible.</em><br />In stock.</p> <p><br />Delivery to pincode 400001 - Mumbai within 2 - 4 business days. Details<br />Sold by E-fashionRetail (4.1 out of 5 | 111 ratings) and Fulfilled by Amazon. Gift-wrap available.<br />Day And Date Display</p> <p>Three hands that move in a smooth and uninterrupted fashion</p> <ul style='list-style-type: disc;'> <li>Carson India Two Years Warranty</li> <li>Packed In Carson Gift Box</li><li>Works on Japanese Quartz format</li> </ul>",
        'category_id'=> 14,
        ],
        [
        'name'=> "Citizen Watch 02",
        'price'=> rand(900, 2000),
        'image'=> 'citizen_watch_02.jpg',
        'description'=> "<p><strong>Products Detials</strong><br /><strong>-------------------</strong><br />Carson Analogue Blue Dial Men's Watch - CR1535</p> <p><em>Cash on Delivery eligible.</em><br />In stock.</p> <p><br />Delivery to pincode 400001 - Mumbai within 2 - 4 business days. Details<br />Sold by E-fashionRetail (4.1 out of 5 | 111 ratings) and Fulfilled by Amazon. Gift-wrap available.<br />Day And Date Display</p> <p>Three hands that move in a smooth and uninterrupted fashion</p> <ul style='list-style-type: disc;'> <li>Carson India Two Years Warranty</li> <li>Packed In Carson Gift Box</li><li>Works on Japanese Quartz format</li> </ul>",
        'category_id'=> 14,
        ],
        [
        'name'=> "Citizen Watch 03",
        'price'=> rand(900, 2000),
        'image'=> 'citizen_watch_03.jpg',
        'description'=> "<p><strong>Products Detials</strong><br /><strong>-------------------</strong><br />Carson Analogue Blue Dial Men's Watch - CR1535</p> <p><em>Cash on Delivery eligible.</em><br />In stock.</p> <p><br />Delivery to pincode 400001 - Mumbai within 2 - 4 business days. Details<br />Sold by E-fashionRetail (4.1 out of 5 | 111 ratings) and Fulfilled by Amazon. Gift-wrap available.<br />Day And Date Display</p> <p>Three hands that move in a smooth and uninterrupted fashion</p> <ul style='list-style-type: disc;'> <li>Carson India Two Years Warranty</li> <li>Packed In Carson Gift Box</li><li>Works on Japanese Quartz format</li> </ul>",
        'category_id'=> 14,
        ],
        [
        'name'=> "Citizen Watch 04",
        'price'=> rand(900, 2000),
        'image'=> 'citizen_watch_04.jpg',
        'description'=> "<p><strong>Products Detials</strong><br /><strong>-------------------</strong><br />Carson Analogue Blue Dial Men's Watch - CR1535</p> <p><em>Cash on Delivery eligible.</em><br />In stock.</p> <p><br />Delivery to pincode 400001 - Mumbai within 2 - 4 business days. Details<br />Sold by E-fashionRetail (4.1 out of 5 | 111 ratings) and Fulfilled by Amazon. Gift-wrap available.<br />Day And Date Display</p> <p>Three hands that move in a smooth and uninterrupted fashion</p> <ul style='list-style-type: disc;'> <li>Carson India Two Years Warranty</li> <li>Packed In Carson Gift Box</li><li>Works on Japanese Quartz format</li> </ul>",
        'category_id'=> 14,
        ],
        [
        'name'=> "Citizen Watch 05",
        'price'=> rand(900, 2000),
        'image'=> 'citizen_watch_05.jpg',
        'description'=> "<p><strong>Products Detials</strong><br /><strong>-------------------</strong><br />Carson Analogue Blue Dial Men's Watch - CR1535</p> <p><em>Cash on Delivery eligible.</em><br />In stock.</p> <p><br />Delivery to pincode 400001 - Mumbai within 2 - 4 business days. Details<br />Sold by E-fashionRetail (4.1 out of 5 | 111 ratings) and Fulfilled by Amazon. Gift-wrap available.<br />Day And Date Display</p> <p>Three hands that move in a smooth and uninterrupted fashion</p> <ul style='list-style-type: disc;'> <li>Carson India Two Years Warranty</li> <li>Packed In Carson Gift Box</li><li>Works on Japanese Quartz format</li> </ul>",
        'category_id'=> 14,
        ],
        [
        'name'=> "Citizen Watch 06",
        'price'=> rand(900, 2000),
        'image'=> 'citizen_watch_06.jpg',
        'description'=> "<p><strong>Products Detials</strong><br /><strong>-------------------</strong><br />Carson Analogue Blue Dial Men's Watch - CR1535</p> <p><em>Cash on Delivery eligible.</em><br />In stock.</p> <p><br />Delivery to pincode 400001 - Mumbai within 2 - 4 business days. Details<br />Sold by E-fashionRetail (4.1 out of 5 | 111 ratings) and Fulfilled by Amazon. Gift-wrap available.<br />Day And Date Display</p> <p>Three hands that move in a smooth and uninterrupted fashion</p> <ul style='list-style-type: disc;'> <li>Carson India Two Years Warranty</li> <li>Packed In Carson Gift Box</li><li>Works on Japanese Quartz format</li> </ul>",
        'category_id'=> 14,
        ],
        [
        'name'=> "Citizen Watch 07",
        'price'=> rand(900, 2000),
        'image'=> 'citizen_watch_07.jpg',
        'description'=> "<p><strong>Products Detials</strong><br /><strong>-------------------</strong><br />Carson Analogue Blue Dial Men's Watch - CR1535</p> <p><em>Cash on Delivery eligible.</em><br />In stock.</p> <p><br />Delivery to pincode 400001 - Mumbai within 2 - 4 business days. Details<br />Sold by E-fashionRetail (4.1 out of 5 | 111 ratings) and Fulfilled by Amazon. Gift-wrap available.<br />Day And Date Display</p> <p>Three hands that move in a smooth and uninterrupted fashion</p> <ul style='list-style-type: disc;'> <li>Carson India Two Years Warranty</li> <li>Packed In Carson Gift Box</li><li>Works on Japanese Quartz format</li> </ul>",
        'category_id'=> 14,
        ],
        [
        'name'=> "Citizen Watch 08",
        'price'=> rand(900, 2000),
        'image'=> 'citizen_watch_08.jpg',
        'description'=> "<p><strong>Products Detials</strong><br /><strong>-------------------</strong><br />Carson Analogue Blue Dial Men's Watch - CR1535</p> <p><em>Cash on Delivery eligible.</em><br />In stock.</p> <p><br />Delivery to pincode 400001 - Mumbai within 2 - 4 business days. Details<br />Sold by E-fashionRetail (4.1 out of 5 | 111 ratings) and Fulfilled by Amazon. Gift-wrap available.<br />Day And Date Display</p> <p>Three hands that move in a smooth and uninterrupted fashion</p> <ul style='list-style-type: disc;'> <li>Carson India Two Years Warranty</li> <li>Packed In Carson Gift Box</li><li>Works on Japanese Quartz format</li> </ul>",
        'category_id'=> 14,
        ],

        // Fastract Watches--- >
        [
        'name'=> "Fastract Watch 01",
        'price'=> rand(900, 2000),
        'image'=> 'fastrack_watch_01.jpg',
        'description'=> "<p><strong>Products Detials</strong><br /><strong>-------------------</strong><br />Carson Analogue Blue Dial Men's Watch - CR1535</p> <p><em>Cash on Delivery eligible.</em><br />In stock.</p> <p><br />Delivery to pincode 400001 - Mumbai within 2 - 4 business days. Details<br />Sold by E-fashionRetail (4.1 out of 5 | 111 ratings) and Fulfilled by Amazon. Gift-wrap available.<br />Day And Date Display</p> <p>Three hands that move in a smooth and uninterrupted fashion</p> <ul style='list-style-type: disc;'> <li>Carson India Two Years Warranty</li> <li>Packed In Carson Gift Box</li><li>Works on Japanese Quartz format</li> </ul>",
        'category_id'=> 15,
        ],
        [
        'name'=> "Fastract Watch 02",
        'price'=> rand(900, 2000),
        'image'=> 'fastrack_watch_02.jpg',
        'description'=> "<p><strong>Products Detials</strong><br /><strong>-------------------</strong><br />Carson Analogue Blue Dial Men's Watch - CR1535</p> <p><em>Cash on Delivery eligible.</em><br />In stock.</p> <p><br />Delivery to pincode 400001 - Mumbai within 2 - 4 business days. Details<br />Sold by E-fashionRetail (4.1 out of 5 | 111 ratings) and Fulfilled by Amazon. Gift-wrap available.<br />Day And Date Display</p> <p>Three hands that move in a smooth and uninterrupted fashion</p> <ul style='list-style-type: disc;'> <li>Carson India Two Years Warranty</li> <li>Packed In Carson Gift Box</li><li>Works on Japanese Quartz format</li> </ul>",
        'category_id'=> 15,
        ],
        [
        'name'=> "Fastract Watch 03",
        'price'=> rand(900, 2000),
        'image'=> 'fastrack_watch_03.jpg',
        'description'=> "<p><strong>Products Detials</strong><br /><strong>-------------------</strong><br />Carson Analogue Blue Dial Men's Watch - CR1535</p> <p><em>Cash on Delivery eligible.</em><br />In stock.</p> <p><br />Delivery to pincode 400001 - Mumbai within 2 - 4 business days. Details<br />Sold by E-fashionRetail (4.1 out of 5 | 111 ratings) and Fulfilled by Amazon. Gift-wrap available.<br />Day And Date Display</p> <p>Three hands that move in a smooth and uninterrupted fashion</p> <ul style='list-style-type: disc;'> <li>Carson India Two Years Warranty</li> <li>Packed In Carson Gift Box</li><li>Works on Japanese Quartz format</li> </ul>",
        'category_id'=> 15,
        ],
        [
        'name'=> "Fastract Watch 04",
        'price'=> rand(900, 2000),
        'image'=> 'fastrack_watch_04.jpg',
        'description'=> "<p><strong>Products Detials</strong><br /><strong>-------------------</strong><br />Carson Analogue Blue Dial Men's Watch - CR1535</p> <p><em>Cash on Delivery eligible.</em><br />In stock.</p> <p><br />Delivery to pincode 400001 - Mumbai within 2 - 4 business days. Details<br />Sold by E-fashionRetail (4.1 out of 5 | 111 ratings) and Fulfilled by Amazon. Gift-wrap available.<br />Day And Date Display</p> <p>Three hands that move in a smooth and uninterrupted fashion</p> <ul style='list-style-type: disc;'> <li>Carson India Two Years Warranty</li> <li>Packed In Carson Gift Box</li><li>Works on Japanese Quartz format</li> </ul>",
        'category_id'=> 15,
        ],
        [
        'name'=> "Fastract Watch 05",
        'price'=> rand(900, 2000),
        'image'=> 'fastrack_watch_05.jpg',
        'description'=> "<p><strong>Products Detials</strong><br /><strong>-------------------</strong><br />Carson Analogue Blue Dial Men's Watch - CR1535</p> <p><em>Cash on Delivery eligible.</em><br />In stock.</p> <p><br />Delivery to pincode 400001 - Mumbai within 2 - 4 business days. Details<br />Sold by E-fashionRetail (4.1 out of 5 | 111 ratings) and Fulfilled by Amazon. Gift-wrap available.<br />Day And Date Display</p> <p>Three hands that move in a smooth and uninterrupted fashion</p> <ul style='list-style-type: disc;'> <li>Carson India Two Years Warranty</li> <li>Packed In Carson Gift Box</li><li>Works on Japanese Quartz format</li> </ul>",
        'category_id'=> 15,
        ],
        [
        'name'=> "Fastract Watch 06",
        'price'=> rand(900, 2000),
        'image'=> 'fastrack_watch_06.jpg',
        'description'=> "<p><strong>Products Detials</strong><br /><strong>-------------------</strong><br />Carson Analogue Blue Dial Men's Watch - CR1535</p> <p><em>Cash on Delivery eligible.</em><br />In stock.</p> <p><br />Delivery to pincode 400001 - Mumbai within 2 - 4 business days. Details<br />Sold by E-fashionRetail (4.1 out of 5 | 111 ratings) and Fulfilled by Amazon. Gift-wrap available.<br />Day And Date Display</p> <p>Three hands that move in a smooth and uninterrupted fashion</p> <ul style='list-style-type: disc;'> <li>Carson India Two Years Warranty</li> <li>Packed In Carson Gift Box</li><li>Works on Japanese Quartz format</li> </ul>",
        'category_id'=> 15,
        ],
        [
        'name'=> "Fastract Watch 07",
        'price'=> rand(900, 2000),
        'image'=> 'fastrack_watch_07.jpg',
        'description'=> "<p><strong>Products Detials</strong><br /><strong>-------------------</strong><br />Carson Analogue Blue Dial Men's Watch - CR1535</p> <p><em>Cash on Delivery eligible.</em><br />In stock.</p> <p><br />Delivery to pincode 400001 - Mumbai within 2 - 4 business days. Details<br />Sold by E-fashionRetail (4.1 out of 5 | 111 ratings) and Fulfilled by Amazon. Gift-wrap available.<br />Day And Date Display</p> <p>Three hands that move in a smooth and uninterrupted fashion</p> <ul style='list-style-type: disc;'> <li>Carson India Two Years Warranty</li> <li>Packed In Carson Gift Box</li><li>Works on Japanese Quartz format</li> </ul>",
        'category_id'=> 15,
        ],
        [
        'name'=> "Fastract Watch 08",
        'price'=> rand(900, 2000),
        'image'=> 'fastrack_watch_08.jpg',
        'description'=> "<p><strong>Products Detials</strong><br /><strong>-------------------</strong><br />Carson Analogue Blue Dial Men's Watch - CR1535</p> <p><em>Cash on Delivery eligible.</em><br />In stock.</p> <p><br />Delivery to pincode 400001 - Mumbai within 2 - 4 business days. Details<br />Sold by E-fashionRetail (4.1 out of 5 | 111 ratings) and Fulfilled by Amazon. Gift-wrap available.<br />Day And Date Display</p> <p>Three hands that move in a smooth and uninterrupted fashion</p> <ul style='list-style-type: disc;'> <li>Carson India Two Years Warranty</li> <li>Packed In Carson Gift Box</li><li>Works on Japanese Quartz format</li> </ul>",
        'category_id'=> 15,
        ],

         // Casio Watches--- >
        [
        'name'=> "Casio Watch 01",
        'price'=> rand(900, 2000),
        'image'=> 'casio_watch_01.jpg',
        'description'=> "<p><strong>Products Detials</strong><br /><strong>-------------------</strong><br />Carson Analogue Blue Dial Men's Watch - CR1535</p> <p><em>Cash on Delivery eligible.</em><br />In stock.</p> <p><br />Delivery to pincode 400001 - Mumbai within 2 - 4 business days. Details<br />Sold by E-fashionRetail (4.1 out of 5 | 111 ratings) and Fulfilled by Amazon. Gift-wrap available.<br />Day And Date Display</p> <p>Three hands that move in a smooth and uninterrupted fashion</p> <ul style='list-style-type: disc;'> <li>Carson India Two Years Warranty</li> <li>Packed In Carson Gift Box</li><li>Works on Japanese Quartz format</li> </ul>",
        'category_id'=> 16,
        ],
        [
        'name'=> "Casio Watch 02",
        'price'=> rand(900, 2000),
        'image'=> 'casio_watch_02.jpg',
        'description'=> "<p><strong>Products Detials</strong><br /><strong>-------------------</strong><br />Carson Analogue Blue Dial Men's Watch - CR1535</p> <p><em>Cash on Delivery eligible.</em><br />In stock.</p> <p><br />Delivery to pincode 400001 - Mumbai within 2 - 4 business days. Details<br />Sold by E-fashionRetail (4.1 out of 5 | 111 ratings) and Fulfilled by Amazon. Gift-wrap available.<br />Day And Date Display</p> <p>Three hands that move in a smooth and uninterrupted fashion</p> <ul style='list-style-type: disc;'> <li>Carson India Two Years Warranty</li> <li>Packed In Carson Gift Box</li><li>Works on Japanese Quartz format</li> </ul>",
        'category_id'=> 16,
        ],
        [
        'name'=> "Casio Watch 03",
        'price'=> rand(900, 2000),
        'image'=> 'casio_watch_03.jpg',
        'description'=> "<p><strong>Products Detials</strong><br /><strong>-------------------</strong><br />Carson Analogue Blue Dial Men's Watch - CR1535</p> <p><em>Cash on Delivery eligible.</em><br />In stock.</p> <p><br />Delivery to pincode 400001 - Mumbai within 2 - 4 business days. Details<br />Sold by E-fashionRetail (4.1 out of 5 | 111 ratings) and Fulfilled by Amazon. Gift-wrap available.<br />Day And Date Display</p> <p>Three hands that move in a smooth and uninterrupted fashion</p> <ul style='list-style-type: disc;'> <li>Carson India Two Years Warranty</li> <li>Packed In Carson Gift Box</li><li>Works on Japanese Quartz format</li> </ul>",
        'category_id'=> 16,
        ],
        [
        'name'=> "Casio Watch 04",
        'price'=> rand(900, 2000),
        'image'=> 'casio_watch_04.jpg',
        'description'=> "<p><strong>Products Detials</strong><br /><strong>-------------------</strong><br />Carson Analogue Blue Dial Men's Watch - CR1535</p> <p><em>Cash on Delivery eligible.</em><br />In stock.</p> <p><br />Delivery to pincode 400001 - Mumbai within 2 - 4 business days. Details<br />Sold by E-fashionRetail (4.1 out of 5 | 111 ratings) and Fulfilled by Amazon. Gift-wrap available.<br />Day And Date Display</p> <p>Three hands that move in a smooth and uninterrupted fashion</p> <ul style='list-style-type: disc;'> <li>Carson India Two Years Warranty</li> <li>Packed In Carson Gift Box</li><li>Works on Japanese Quartz format</li> </ul>",
        'category_id'=> 16,
        ],
        [
        'name'=> "Casio Watch 05",
        'price'=> rand(900, 2000),
        'image'=> 'casio_watch_05.jpg',
        'description'=> "<p><strong>Products Detials</strong><br /><strong>-------------------</strong><br />Carson Analogue Blue Dial Men's Watch - CR1535</p> <p><em>Cash on Delivery eligible.</em><br />In stock.</p> <p><br />Delivery to pincode 400001 - Mumbai within 2 - 4 business days. Details<br />Sold by E-fashionRetail (4.1 out of 5 | 111 ratings) and Fulfilled by Amazon. Gift-wrap available.<br />Day And Date Display</p> <p>Three hands that move in a smooth and uninterrupted fashion</p> <ul style='list-style-type: disc;'> <li>Carson India Two Years Warranty</li> <li>Packed In Carson Gift Box</li><li>Works on Japanese Quartz format</li> </ul>",
        'category_id'=> 16,
        ],
        [
        'name'=> "Casio Watch 06",
        'price'=> rand(900, 2000),
        'image'=> 'casio_watch_06.jpg',
        'description'=> "<p><strong>Products Detials</strong><br /><strong>-------------------</strong><br />Carson Analogue Blue Dial Men's Watch - CR1535</p> <p><em>Cash on Delivery eligible.</em><br />In stock.</p> <p><br />Delivery to pincode 400001 - Mumbai within 2 - 4 business days. Details<br />Sold by E-fashionRetail (4.1 out of 5 | 111 ratings) and Fulfilled by Amazon. Gift-wrap available.<br />Day And Date Display</p> <p>Three hands that move in a smooth and uninterrupted fashion</p> <ul style='list-style-type: disc;'> <li>Carson India Two Years Warranty</li> <li>Packed In Carson Gift Box</li><li>Works on Japanese Quartz format</li> </ul>",
        'category_id'=> 16,
        ],
        [
        'name'=> "Casio Watch 07",
        'price'=> rand(900, 2000),
        'image'=> 'casio_watch_07.jpg',
        'description'=> "<p><strong>Products Detials</strong><br /><strong>-------------------</strong><br />Carson Analogue Blue Dial Men's Watch - CR1535</p> <p><em>Cash on Delivery eligible.</em><br />In stock.</p> <p><br />Delivery to pincode 400001 - Mumbai within 2 - 4 business days. Details<br />Sold by E-fashionRetail (4.1 out of 5 | 111 ratings) and Fulfilled by Amazon. Gift-wrap available.<br />Day And Date Display</p> <p>Three hands that move in a smooth and uninterrupted fashion</p> <ul style='list-style-type: disc;'> <li>Carson India Two Years Warranty</li> <li>Packed In Carson Gift Box</li><li>Works on Japanese Quartz format</li> </ul>",
        'category_id'=> 16,
        ],
        [
        'name'=> "Casio Watch 08",
        'price'=> rand(900, 2000),
        'image'=> 'casio_watch_08.jpg',
        'description'=> "<p><strong>Products Detials</strong><br /><strong>-------------------</strong><br />Carson Analogue Blue Dial Men's Watch - CR1535</p> <p><em>Cash on Delivery eligible.</em><br />In stock.</p> <p><br />Delivery to pincode 400001 - Mumbai within 2 - 4 business days. Details<br />Sold by E-fashionRetail (4.1 out of 5 | 111 ratings) and Fulfilled by Amazon. Gift-wrap available.<br />Day And Date Display</p> <p>Three hands that move in a smooth and uninterrupted fashion</p> <ul style='list-style-type: disc;'> <li>Carson India Two Years Warranty</li> <li>Packed In Carson Gift Box</li><li>Works on Japanese Quartz format</li> </ul>",
        'category_id'=> 16,
        ],

        ]);

// Latest Watches--- >
File::copy(public_path('themes/ecommerce/assets/images/products/latest_watch/latest_watch_01.jpg'), public_path('/upload/products/'.'latest_watch_01.jpg'));
File::copy(public_path('themes/ecommerce/assets/images/products/latest_watch/latest_watch_02.jpg'), public_path('/upload/products/'.'latest_watch_02.jpg'));
File::copy(public_path('themes/ecommerce/assets/images/products/latest_watch/latest_watch_03.jpg'), public_path('/upload/products/'.'latest_watch_03.jpg'));
File::copy(public_path('themes/ecommerce/assets/images/products/latest_watch/latest_watch_04.jpg'), public_path('/upload/products/'.'latest_watch_04.jpg'));
File::copy(public_path('themes/ecommerce/assets/images/products/latest_watch/latest_watch_05.jpg'), public_path('/upload/products/'.'latest_watch_05.jpg'));
File::copy(public_path('themes/ecommerce/assets/images/products/latest_watch/latest_watch_06.jpg'), public_path('/upload/products/'.'latest_watch_06.jpg'));

// best Watches--- >
File::copy(public_path('themes/ecommerce/assets/images/products/best_watch/best_watch_01.jpg'), public_path('/upload/products/'.'best_watch_01.jpg'));
File::copy(public_path('themes/ecommerce/assets/images/products/best_watch/best_watch_02.jpg'), public_path('/upload/products/'.'best_watch_02.jpg'));
File::copy(public_path('themes/ecommerce/assets/images/products/best_watch/best_watch_03.jpg'), public_path('/upload/products/'.'best_watch_03.jpg'));
File::copy(public_path('themes/ecommerce/assets/images/products/best_watch/best_watch_04.jpg'), public_path('/upload/products/'.'best_watch_04.jpg'));
File::copy(public_path('themes/ecommerce/assets/images/products/best_watch/best_watch_05.jpg'), public_path('/upload/products/'.'best_watch_05.jpg'));
File::copy(public_path('themes/ecommerce/assets/images/products/best_watch/best_watch_06.jpg'), public_path('/upload/products/'.'best_watch_06.jpg'));
File::copy(public_path('themes/ecommerce/assets/images/products/best_watch/best_watch_07.jpg'), public_path('/upload/products/'.'best_watch_07.jpg'));
File::copy(public_path('themes/ecommerce/assets/images/products/best_watch/best_watch_08.jpg'), public_path('/upload/products/'.'best_watch_08.jpg'));

// Timex Watches--- >
File::copy(public_path('themes/ecommerce/assets/images/products/timex_watch/timex_watch_01.jpg'), public_path('/upload/products/'.'timex_watch_01.jpg'));
File::copy(public_path('themes/ecommerce/assets/images/products/timex_watch/timex_watch_02.jpg'), public_path('/upload/products/'.'timex_watch_02.jpg'));
File::copy(public_path('themes/ecommerce/assets/images/products/timex_watch/timex_watch_03.jpg'), public_path('/upload/products/'.'timex_watch_03.jpg'));
File::copy(public_path('themes/ecommerce/assets/images/products/timex_watch/timex_watch_04.jpg'), public_path('/upload/products/'.'timex_watch_04.jpg'));
File::copy(public_path('themes/ecommerce/assets/images/products/timex_watch/timex_watch_05.jpg'), public_path('/upload/products/'.'timex_watch_05.jpg'));
File::copy(public_path('themes/ecommerce/assets/images/products/timex_watch/timex_watch_06.jpg'), public_path('/upload/products/'.'timex_watch_06.jpg'));
File::copy(public_path('themes/ecommerce/assets/images/products/timex_watch/timex_watch_07.jpg'), public_path('/upload/products/'.'timex_watch_07.jpg'));
File::copy(public_path('themes/ecommerce/assets/images/products/timex_watch/timex_watch_08.jpg'), public_path('/upload/products/'.'timex_watch_08.jpg'));

// Citizen Watches--- >
File::copy(public_path('themes/ecommerce/assets/images/products/citizen_watch/citizen_watch_01.jpg'), public_path('/upload/products/'.'citizen_watch_01.jpg'));
File::copy(public_path('themes/ecommerce/assets/images/products/citizen_watch/citizen_watch_02.jpg'), public_path('/upload/products/'.'citizen_watch_02.jpg'));
File::copy(public_path('themes/ecommerce/assets/images/products/citizen_watch/citizen_watch_03.jpg'), public_path('/upload/products/'.'citizen_watch_03.jpg'));
File::copy(public_path('themes/ecommerce/assets/images/products/citizen_watch/citizen_watch_04.jpg'), public_path('/upload/products/'.'citizen_watch_04.jpg'));
File::copy(public_path('themes/ecommerce/assets/images/products/citizen_watch/citizen_watch_05.jpg'), public_path('/upload/products/'.'citizen_watch_05.jpg'));
File::copy(public_path('themes/ecommerce/assets/images/products/citizen_watch/citizen_watch_06.jpg'), public_path('/upload/products/'.'citizen_watch_06.jpg'));
File::copy(public_path('themes/ecommerce/assets/images/products/citizen_watch/citizen_watch_07.jpg'), public_path('/upload/products/'.'citizen_watch_07.jpg'));
File::copy(public_path('themes/ecommerce/assets/images/products/citizen_watch/citizen_watch_08.jpg'), public_path('/upload/products/'.'citizen_watch_08.jpg'));

// Fastrack Watches--- >
File::copy(public_path('themes/ecommerce/assets/images/products/fastrack_watch/fastrack_watch_01.jpg'), public_path('/upload/products/'.'fastrack_watch_01.jpg'));
File::copy(public_path('themes/ecommerce/assets/images/products/fastrack_watch/fastrack_watch_02.jpg'), public_path('/upload/products/'.'fastrack_watch_02.jpg'));
File::copy(public_path('themes/ecommerce/assets/images/products/fastrack_watch/fastrack_watch_03.jpg'), public_path('/upload/products/'.'fastrack_watch_03.jpg'));
File::copy(public_path('themes/ecommerce/assets/images/products/fastrack_watch/fastrack_watch_04.jpg'), public_path('/upload/products/'.'fastrack_watch_04.jpg'));
File::copy(public_path('themes/ecommerce/assets/images/products/fastrack_watch/fastrack_watch_05.jpg'), public_path('/upload/products/'.'fastrack_watch_05.jpg'));
File::copy(public_path('themes/ecommerce/assets/images/products/fastrack_watch/fastrack_watch_06.jpg'), public_path('/upload/products/'.'fastrack_watch_06.jpg'));
File::copy(public_path('themes/ecommerce/assets/images/products/fastrack_watch/fastrack_watch_07.jpg'), public_path('/upload/products/'.'fastrack_watch_07.jpg'));
File::copy(public_path('themes/ecommerce/assets/images/products/fastrack_watch/fastrack_watch_08.jpg'), public_path('/upload/products/'.'fastrack_watch_08.jpg'));

// Fastrack Watches--- >
File::copy(public_path('themes/ecommerce/assets/images/products/casio_watch/casio_watch_01.jpg'), public_path('/upload/products/'.'casio_watch_01.jpg'));
File::copy(public_path('themes/ecommerce/assets/images/products/casio_watch/casio_watch_02.jpg'), public_path('/upload/products/'.'casio_watch_02.jpg'));
File::copy(public_path('themes/ecommerce/assets/images/products/casio_watch/casio_watch_03.jpg'), public_path('/upload/products/'.'casio_watch_03.jpg'));
File::copy(public_path('themes/ecommerce/assets/images/products/casio_watch/casio_watch_04.jpg'), public_path('/upload/products/'.'casio_watch_04.jpg'));
File::copy(public_path('themes/ecommerce/assets/images/products/casio_watch/casio_watch_05.jpg'), public_path('/upload/products/'.'casio_watch_05.jpg'));
File::copy(public_path('themes/ecommerce/assets/images/products/casio_watch/casio_watch_06.jpg'), public_path('/upload/products/'.'casio_watch_06.jpg'));
File::copy(public_path('themes/ecommerce/assets/images/products/casio_watch/casio_watch_07.jpg'), public_path('/upload/products/'.'casio_watch_07.jpg'));
File::copy(public_path('themes/ecommerce/assets/images/products/casio_watch/casio_watch_08.jpg'), public_path('/upload/products/'.'casio_watch_08.jpg'));



}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
