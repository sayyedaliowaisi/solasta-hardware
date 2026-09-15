<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductCatalog
{
    /**
     * App category slug => actual public folder name
     */
    private array $categoryFolders = [
        'aldrops'               => 'aldrops',
        'cabinet-handles'       => 'cabinate handles',
        'cloth-hanging-khuti'   => 'cloth hanging khuti',
        'sliding-handles'       => 'consild handles   sliding  handles',
        'cup-handles'           => 'cup handle',
        'door-handles'          => 'door handles',
        'door-knockers'         => 'door knocker',
        'door-stoppers'         => 'door stoper',
        'key-holders'           => 'key holders',
        'knobs'                 => 'knobs',
        'latches'               => 'latch',
        'magnet-catchers'       => 'magnet catcher',
        'profile-handles'       => 'profile handles kitchen handle',
        'door-kadi'             => 'pullars door kadi',
        'sofa-legs'             => 'sofa leg',
        'ventilation-jali'      => 'ventilation jali',
    ];

    /**
     * Category display titles
     */
    private array $categoryTitles = [
        'aldrops'               => 'Aldrops',
        'cabinet-handles'       => 'Cabinet Handles',
        'cloth-hanging-khuti'   => 'Cloth Hanging Khuti',
        'sliding-handles'       => 'Sliding Handles',
        'cup-handles'           => 'Cup Handles',
        'door-handles'          => 'Door Handles',
        'door-knockers'         => 'Door Knockers',
        'door-stoppers'         => 'Door Stoppers',
        'key-holders'           => 'Key Holders',
        'knobs'                 => 'Knobs',
        'latches'               => 'Latches',
        'magnet-catchers'       => 'Magnet Catchers',
        'profile-handles'       => 'Profile Handles',
        'door-kadi'             => 'Door Kadi',
        'sofa-legs'             => 'Sofa Legs',
        'ventilation-jali'      => 'Ventilation Jali',
    ];

    /**
     * Safe category descriptions.
     */
    private array $categoryDescriptions = [
        'aldrops' =>
            'Explore our available aldrops collection.',

        'cabinet-handles' =>
            'Browse cabinet handle designs available in our collection.',

        'cloth-hanging-khuti' =>
            'Explore cloth hanging khuti designs available in our range.',

        'sliding-handles' =>
            'Browse sliding handle designs from our available collection.',

        'cup-handles' =>
            'Explore available cup handle designs.',

        'door-handles' =>
            'Browse our available door handle collection.',

        'door-knockers' =>
            'Explore door knocker designs available in our range.',

        'door-stoppers' =>
            'Browse available door stopper designs.',

        'key-holders' =>
            'Explore our available key holder collection.',

        'knobs' =>
            'Browse knob designs available in our collection.',

        'latches' =>
            'Explore available latch designs.',

        'magnet-catchers' =>
            'Browse magnet catcher designs available in our range.',

        'profile-handles' =>
            'Explore profile handle designs available in our collection.',

        'door-kadi' =>
            'Browse available door kadi designs.',

        'sofa-legs' =>
            'Explore sofa leg designs available in our range.',

        'ventilation-jali' =>
            'Browse ventilation jali designs available in our collection.',
    ];

    /**
     * Product image stem => converted browser-ready video.
     *
     * Same video can be assigned to multiple product images
     * where the video clearly shows those products.
     */
    private array $videoMap = [

        'cabinet-handles' => [

            '20260823_173510' =>
                '20260823_173522_web.mp4',

            '20260823_174618' =>
                '20260823_174635_web.mp4',

            '20260823_174849' =>
                '20260823_174820_web.mp4',

            '20260823_175755' =>
                '20260823_175803_web.mp4',

            '20260823_180356' =>
                '20260823_180412_web.mp4',

            '20260823_180939' =>
                '20260823_181015_web.mp4',

            '20260823_181229' =>
                '20260823_181147_web.mp4',

            '20260823_181409' =>
                '20260823_181419_web.mp4',

            '20260823_182434' =>
                '20260823_182248_web.mp4',

            '20260823_182641' =>
                '20260823_182705_web.mp4',

            '20260823_190939' =>
                '20260823_190828_web.mp4',

            '20260826_142344' =>
                '20260826_142131_web.mp4',

            /**
             * This mapping was previously visually reviewed.
             * Keep only if this is the image you confirmed locally.
             */
            '20260826_153749' =>
                '20260826_153445_web.mp4',
        ],

        'sliding-handles' => [

            '20260823_193511' =>
                '20260823_193546_web.mp4',

            '20260823_193522' =>
                '20260823_193546_web.mp4',

            '20260823_193535' =>
                '20260823_193546_web.mp4',
        ],

        'knobs' => [

            '20260823_173150' =>
                '20260823_173301_web.mp4',

            '20260823_173230' =>
                '20260823_173301_web.mp4',
        ],

        'profile-handles' => [

            '20260823_183746' =>
                '20260823_183820_web.mp4',

            '20260823_172913' =>
                '20260823_172752_web.mp4',

            '20260823_184137' =>
                '20260823_183807_web.mp4',
        ],

        'sofa-legs' => [

            '20260826_130403' =>
                '20260826_130434_web.mp4',
        ],
    ];

    /**
     * Return all categories.
     */
    public function categories(): array
    {
        $categories = [];

        foreach ($this->categoryFolders as $slug => $folder) {
            $categories[$slug] = $this->buildCategory(
                $slug,
                $folder
            );
        }

        return $categories;
    }

    /**
     * Return one category.
     */
    public function category(string $slug): ?array
    {
        if (!isset($this->categoryFolders[$slug])) {
            return null;
        }

        return $this->buildCategory(
            $slug,
            $this->categoryFolders[$slug]
        );
    }

    /**
     * Build category data.
     */
    private function buildCategory(
        string $slug,
        string $folder
    ): array {
        $products = $this->scanCategory(
            $slug,
            $folder
        );

        return [
            'slug'        => $slug,
            'title'       => $this->categoryTitles[$slug]
                ?? Str::headline($slug),

            'description' => $this->categoryDescriptions[$slug]
                ?? 'Browse available products in this category.',

            'folder'      => $folder,

            'count'       => $products->count(),

            'products'    => $products,
        ];
    }

    /**
     * Scan actual files from public/images/Products/{folder}
     */
    private function scanCategory(
        string $slug,
        string $folder
    ): Collection {
        $directory = public_path(
            "images/Products/{$folder}"
        );

        if (!File::exists($directory)) {
            return collect();
        }

        $files = collect(
            File::files($directory)
        );

        /**
         * Only image files.
         */
        $imageFiles = $files
            ->filter(function ($file) {
                $extension = strtolower(
                    $file->getExtension()
                );

                return in_array(
                    $extension,
                    [
                        'jpg',
                        'jpeg',
                        'png',
                        'webp',
                    ],
                    true
                );
            })

            /**
             * Exclude duplicated "- Copy" files.
             */
            ->reject(function ($file) {
                return str_contains(
                    strtolower($file->getFilename()),
                    ' - copy'
                );
            })

            /**
             * Natural sort by filename.
             */
            ->sort(function ($a, $b) {
                return strnatcasecmp(
                    $a->getFilename(),
                    $b->getFilename()
                );
            })
            ->values();

        /**
         * Number only timestamp filenames.
         */
        $timestampCounter = 0;

        return $imageFiles
            ->map(function ($file) use (
                $slug,
                $folder,
                &$timestampCounter
            ) {
                $filename = $file->getFilename();

                $stem = pathinfo(
                    $filename,
                    PATHINFO_FILENAME
                );

                $isTimestamp = preg_match(
                    '/^\d{8}_\d{6}$/',
                    $stem
                ) === 1;

                if ($isTimestamp) {
                    $timestampCounter++;
                }

                $name = $this->makeProductName(
                    $slug,
                    $stem,
                    $isTimestamp,
                    $timestampCounter
                );

                $productSlug =
                    $slug
                    . '-'
                    . Str::slug($stem);

                $videoFilename =
                    $this->videoMap[$slug][$stem]
                    ?? null;

                $videoPath = null;

                if ($videoFilename) {
                    $fullVideoPath = public_path(
                        "images/Products/{$folder}/{$videoFilename}"
                    );

                    /**
                     * Only expose video if converted _web.mp4
                     * actually exists locally.
                     */
                    if (File::exists($fullVideoPath)) {
                        $videoPath =
                            "images/Products/{$folder}/{$videoFilename}";
                    }
                }

                return [
                    'name'          => $name,

                    'filename'      => $filename,

                    'stem'          => $stem,

                    'image'         =>
                        "images/Products/{$folder}/{$filename}",

                    'video'         => $videoPath,

                    'slug'          => $productSlug,

                    'category_slug' => $slug,
                ];
            })
            ->values();
    }

    /**
     * Generate readable product name.
     */
    private function makeProductName(
        string $categorySlug,
        string $stem,
        bool $isTimestamp,
        int $timestampCounter
    ): string {
        $categoryTitle =
            $this->categoryTitles[$categorySlug]
            ?? Str::headline($categorySlug);

        /**
         * Timestamp filenames aren't useful to customers,
         * so use sequential readable names.
         */
        if ($isTimestamp) {
            return $categoryTitle
                . ' '
                . $timestampCounter;
        }

        /**
         * Preserve useful catalog names like:
         * Cabinate handles 1
         * Knobs 10
         * Sofa leg 2
         */
        return Str::headline($stem);
    }

    /**
     * Find product globally by product slug.
     */
    public function findProduct(
        string $productSlug
    ): ?array {
        foreach ($this->categoryFolders as $slug => $folder) {
            $category = $this->buildCategory(
                $slug,
                $folder
            );

            $product = $category['products']
                ->first(function ($item) use ($productSlug) {
                    return $item['slug']
                        === $productSlug;
                });

            if ($product) {
                return $product;
            }
        }

        return null;
    }
}