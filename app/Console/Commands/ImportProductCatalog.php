<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\Product;
use App\Services\ProductCatalog;
use Illuminate\Console\Command;

class ImportProductCatalog extends Command
{
    protected $signature = 'catalog:import';

    protected $description = 'Import existing ProductCatalog into database';

    public function handle(
        ProductCatalog $catalog
    ): int {
        $categories = $catalog->categories();

        $categoryOrder = 0;

        foreach ($categories as $categorySlug => $categoryData) {

            $category = Category::updateOrCreate(
                [
                    'slug' => $categorySlug,
                ],
                [
                    'name' => $categoryData['title'],
                    'description' => $categoryData['description'] ?? null,
                    'folder' => $categoryData['folder'] ?? null,
                    'is_active' => true,
                    'sort_order' => $categoryOrder++,
                ]
            );

            $productOrder = 0;

            foreach ($categoryData['products'] as $productData) {

                Product::updateOrCreate(
                    [
                        'slug' => $productData['slug'],
                    ],
                    [
                        'category_id' => $category->id,

                        'name' => $productData['name'],

                        'description' => null,

                        'image' => $productData['image'],

                        'video' => $productData['video'] ?? null,

                        'is_active' => true,

                        'is_featured' => false,

                        'sort_order' => $productOrder++,
                    ]
                );
            }

            $this->info(
                $category->name .
                ': ' .
                $categoryData['products']->count() .
                ' products'
            );
        }

        $this->newLine();

        $this->info(
            'Catalog imported successfully.'
        );

        $this->info(
            'Categories: ' . Category::count()
        );

        $this->info(
            'Products: ' . Product::count()
        );

        return self::SUCCESS;
    }
}