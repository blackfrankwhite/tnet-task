<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductGroupItem;
use App\Models\UserProductGroup;
use App\Models\Cart;

class ProductsSeeder extends Seeder
{
    private $products = 
    [
        [
            'user_id' => 1,
            'title' => 'product1',
            'price' => 10
        ],
        [
            'user_id' => 1,
            'title' => 'product2',
            'price' => 15
        ],
        [
            'user_id' => 1,
            'title' => 'product3',
            'price' => 8
        ],
        [
            'user_id' => 1,
            'title' => 'product4',
            'price' => 7
        ],
        [
            'user_id' => 1,
            'title' => 'product5',
            'price' => 20
        ],
        
    ];

    private $productGroups = 
    [
        [
            'user_id' => 1,
            'discount' => 15
        ]
    ];

    private $productItems = 
    [
        [
            'group_id' => 1,
            'product_id' => 2
        ],
        [
            'group_id' => 1,
            'product_id' => 5
        ]
    ];

    private $cart = 
    [
        [
            'user_id' => 2,
            'product_id' => 1,
            'quantity' => 3
        ],
        [
            'user_id' => 2,
            'product_id' => 2,
            'quantity' => 2
        ],
        [
            'user_id' => 2,
            'product_id' => 5,
            'quantity' => 1
        ]
        
    ];
    
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        if (Product::count() == 0) {
            foreach ($this->products as $product) {
                Product::create($product);
            }
        }

        if (UserProductGroup::count() == 0) {
            foreach ($this->productGroups as $productGroup) {
                UserProductGroup::create($productGroup);
            }
        }

        if (ProductGroupItem::count() == 0) {
            foreach ($this->productItems as $productItem) {
                ProductGroupItem::create($productItem);
            }
        }

        if (Cart::count() == 0) {
            foreach ($this->cart as $cart) {
                Cart::create($cart);
            }
        }
    }
}
