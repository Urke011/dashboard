<?php

namespace Database\Seeders;

use App\Models\ReceiptCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReceiptCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Glavne kategorije
        $mainCategories = [
            ['id' => 1, 'label' => 'Education', 'img' => '/images/receipt-logos/education.png'],
            ['id' => 2, 'label' => 'Gifts', 'img' => '/images/receipt-logos/gifts.jpg'],
            ['id' => 3, 'label' => 'Nightlife', 'img' => '/images/receipt-logos/nightLife.png'],
            ['id' => 4, 'label' => 'Opel', 'img' => '/images/receipt-logos/opel.png'],
            ['id' => 5, 'label' => 'Cost of living', 'img' => '/images/receipt-logos/racuni.png'],
            ['id' => 6, 'label' => 'Renovation', 'img' => '/images/receipt-logos/renoviranje.jpg'],
            ['id' => 7, 'label' => 'Travel', 'img' => '/images/receipt-logos/travel.jpg'],
            ['id' => 8, 'label' => 'Other costes', 'img' => '/images/receipt-logos/other.jpg'],
            ['id' => 9, 'label' => 'Food', 'img' => '/images/receipt-logos/food.jpg'],
        ];

        foreach ($mainCategories as $category) {
            ReceiptCategory::create([
                'id' => $category['id'],
                'label' => $category['label'],
                'img' => $category['img'],
                'parent_id' => null,
            ]);
        }

        // Potkategorije hrane (parent_id = 9)
        $foodSubcategories = [
            ['label' => 'Aldi', 'img' => '/images/receipt-logos/food/aldi.jpg'],
            ['label' => 'Aroma', 'img' => '/images/receipt-logos/food/aroma.png'],
            ['label' => 'Butcher', 'img' => '/images/receipt-logos/food/butcher.png'],
            ['label' => 'Fruits', 'img' => '/images/receipt-logos/food/fruit.png'],
            ['label' => 'Lidl', 'img' => '/images/receipt-logos/food/Lidl-Logo.svg.png'],
            ['label' => 'Maxi', 'img' => '/images/receipt-logos/food/maxi.jpg'],
            ['label' => 'McDonalds', 'img' => '/images/receipt-logos/food/McDonalds.svg.png'],
            ['label' => 'Rewe', 'img' => '/images/receipt-logos/food/rewe.png'],
        ];

        foreach ($foodSubcategories as $subcategory) {
            ReceiptCategory::create([
                'label' => $subcategory['label'],
                'img' => $subcategory['img'],
                'parent_id' => 9,
            ]);
        }
    }
}
