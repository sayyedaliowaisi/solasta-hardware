<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductCatalog
{
    /**
     * =========================================================
     * CATEGORY MASTER
     * =========================================================
     *
     * "folder" = public/images/Products/ ke andar actual folder.
     *
     * Example:
     * public/images/Products/cabinate handles/
     */
    protected array $categoryData = [

        'aldrops' => [
            'title' => 'Aldrops',
            'folder' => 'aldrops',
            'description' => 'Explore our collection of aldrops for doors and furniture applications.',
        ],

        'cabinet-handles' => [
            'title' => 'Cabinet Handles',
            'folder' => 'cabinate handles',
            'description' => 'Explore our cabinet handle collection in multiple styles and designs.',
        ],

        'cloth-hanging-khuti' => [
            'title' => 'Cloth Hanging Khuti',
            'folder' => 'cloth hanging khuti',
            'description' => 'Browse cloth hanging khuti designs for home and furniture applications.',
        ],

        'sliding-handles' => [
            'title' => 'Sliding Handles',
            'folder' => 'consild handles   sliding  handles',
            'description' => 'Explore sliding handle designs for doors, cabinets and furniture.',
        ],

        'cup-handles' => [
            'title' => 'Cup Handles',
            'folder' => 'cup handle',
            'description' => 'Browse our collection of cup handles for cabinets and drawers.',
        ],

        'door-handles' => [
            'title' => 'Door Handles',
            'folder' => 'door handles',
            'description' => 'Explore door handle designs for residential and furniture applications.',
        ],

        'door-knockers' => [
            'title' => 'Door Knockers',
            'folder' => 'door knocker',
            'description' => 'Browse our collection of decorative door knockers.',
        ],

        'door-stoppers' => [
            'title' => 'Door Stoppers',
            'folder' => 'door stoper',
            'description' => 'Explore door stopper options for different applications.',
        ],

        'key-holders' => [
            'title' => 'Key Holders',
            'folder' => 'key holders',
            'description' => 'Browse key holder designs for homes and interior spaces.',
        ],

        'knobs' => [
            'title' => 'Knobs',
            'folder' => 'knobs',
            'description' => 'Explore furniture and cabinet knobs in multiple designs.',
        ],

        'latches' => [
            'title' => 'Latches',
            'folder' => 'latch',
            'description' => 'Browse latch options for doors and furniture applications.',
        ],

        'magnet-catchers' => [
            'title' => 'Magnet Catchers',
            'folder' => 'magnet catcher',
            'description' => 'Explore magnetic catchers for cabinets and furniture.',
        ],

        'profile-handles' => [
            'title' => 'Profile Handles',
            'folder' => 'profile handles kitchen handle',
            'description' => 'Browse profile handles for kitchens, cabinets and furniture.',
        ],

        'door-kadi' => [
            'title' => 'Door Kadi',
            'folder' => 'pullars door kadi',
            'description' => 'Explore door kadi designs for different door applications.',
        ],

        'sofa-legs' => [
            'title' => 'Sofa Legs',
            'folder' => 'sofa leg',
            'description' => 'Browse sofa leg designs for furniture applications.',
        ],

        'ventilation-jali' => [
            'title' => 'Ventilation Jali',
            'folder' => 'ventilation jali',
            'description' => 'Explore ventilation jali options for residential and furniture use.',
        ],

    ];


    /**
     * =========================================================
     * GET ALL CATEGORIES
     * =========================================================
     */
    public function categories(): array
    {
        $categories = [];

        foreach ($this->categoryData as $slug => $category) {
            $categories[$slug] = $this->buildCategory(
                $slug,
                $category
            );
        }

        return $categories;
    }


    /**
     * =========================================================
     * GET ONE CATEGORY
     * =========================================================
     */
    public function category(string $slug): ?array
    {
        if (!isset($this->categoryData[$slug])) {
            return null;
        }

        return $this->buildCategory(
            $slug,
            $this->categoryData[$slug]
        );
    }


    /**
     * =========================================================
     * BUILD CATEGORY
     * =========================================================
     */
    protected function buildCategory(
        string $slug,
        array $category
    ): array {

        $media = $this->scanCategory(
            $slug,
            $category['folder']
        );

        return [

            'slug' => $slug,

            'title' => $category['title'],

            'folder' => $category['folder'],

            'description' => $category['description'] ?? '',

            'products' => $media['products'],

            'videos' => $media['videos'],

            'product_count' => $media['products']->count(),

            'video_count' => $media['videos']->count(),

        ];
    }


    /**
     * =========================================================
     * SCAN CATEGORY DIRECTORY
     * =========================================================
     *
     * Images:
     * jpg
     * jpeg
     * png
     * webp
     *
     * Videos:
     * ONLY *_web.mp4
     *
     * "- Copy" files are ignored.
     */
    protected function scanCategory(
        string $categorySlug,
        string $folder
    ): array {

        $relativeDirectory = 'images/Products/' . $folder;

        $absoluteDirectory = public_path(
            $relativeDirectory
        );


        /**
         * Folder missing
         */
        if (!File::exists($absoluteDirectory)) {

            return [
                'products' => collect(),
                'videos' => collect(),
            ];
        }


        /**
         * Read all files
         */
        $files = collect(
            File::files($absoluteDirectory)
        );


        /**
         * =====================================================
         * IMAGES
         * =====================================================
         */
        $imageFiles = $files

            ->filter(function ($file) {

                return in_array(
                    strtolower($file->getExtension()),
                    [
                        'jpg',
                        'jpeg',
                        'png',
                        'webp',
                    ]
                );

            })

            ->reject(function ($file) {

                return str_contains(
                    strtolower($file->getFilename()),
                    ' - copy'
                );

            })

            ->sort(function ($a, $b) {

                return strnatcasecmp(
                    $a->getFilename(),
                    $b->getFilename()
                );

            })

            ->values();


        /**
         * Generate products
         */
        $products = $imageFiles

            ->map(function ($file, $index) use (
                $categorySlug,
                $relativeDirectory
            ) {

                $filename = $file->getFilename();

                $stem = pathinfo(
                    $filename,
                    PATHINFO_FILENAME
                );


                /**
                 * Unique slug:
                 *
                 * cabinet-handles-20260823-175755
                 */
                $slug = $categorySlug
                    . '-'
                    . Str::slug($stem);


                return [

                    'name' => $this->makeProductName(
                        $categorySlug,
                        $stem,
                        $index + 1
                    ),

                    'filename' => $filename,

                    'stem' => $stem,

                    'image' => $relativeDirectory
                        . '/'
                        . $filename,

                    'slug' => $slug,

                    'category_slug' => $categorySlug,

                ];

            })

            ->values();


        /**
         * =====================================================
         * VIDEOS
         * =====================================================
         *
         * ONLY converted web files:
         *
         * xxxx_web.mp4
         */
        $videos = $files

            ->filter(function ($file) {

                $filename = strtolower(
                    $file->getFilename()
                );

                return strtolower(
                    $file->getExtension()
                ) === 'mp4'

                    && str_ends_with(
                        $filename,
                        '_web.mp4'
                    );

            })

            ->reject(function ($file) {

                return str_contains(
                    strtolower($file->getFilename()),
                    ' - copy'
                );

            })

            ->sort(function ($a, $b) {

                return strnatcasecmp(
                    $a->getFilename(),
                    $b->getFilename()
                );

            })

            ->values()

            ->map(function ($file) use (
                $relativeDirectory
            ) {

                return $relativeDirectory
                    . '/'
                    . $file->getFilename();

            });


        return [

            'products' => $products,

            'videos' => $videos,

        ];
    }


    /**
     * =========================================================
     * FIND PRODUCT BY SLUG
     * =========================================================
     */
    public function findProduct(
        string $slug
    ): ?array {

        foreach ($this->categories() as $category) {

            $product = $category['products']
                ->firstWhere(
                    'slug',
                    $slug
                );


            if ($product) {

                /**
                 * Add category data
                 */
                $product['category_title']
                    = $category['title'];

                $product['category_description']
                    = $category['description'];

                return $product;
            }
        }


        return null;
    }


    /**
     * =========================================================
     * PRODUCT DISPLAY NAME
     * =========================================================
     */
    protected function makeProductName(
        string $categorySlug,
        string $stem,
        int $index
    ): string {

        $categoryTitle =
            $this->categoryData[$categorySlug]['title']
            ?? 'Product';


        /**
         * For timestamp filenames:
         *
         * 20260823_190828
         *
         * Show:
         * Cabinet Handle 01
         */
        if (
            preg_match(
                '/^\d{8}_\d{6}$/',
                $stem
            )
        ) {

            return $categoryTitle
                . ' '
                . str_pad(
                    (string) $index,
                    2,
                    '0',
                    STR_PAD_LEFT
                );
        }


        /**
         * Normal readable filename
         */
        return Str::headline($stem);
    }
}