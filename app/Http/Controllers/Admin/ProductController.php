<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class ProductController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | PRODUCTS LIST
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        $query = Product::with('category')
            ->orderBy('sort_order')
            ->orderByDesc('id');

        if ($request->filled('category')) {
            $query->where(
                'category_id',
                $request->integer('category')
            );
        }

        $products = $query
            ->paginate(30)
            ->withQueryString();

        $categories = Category::query()
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        return view(
            'admin.products.index',
            compact('products', 'categories')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        $categories = Category::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        return view(
            'admin.products.create',
            compact('categories')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | STORE
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        if ($request->filled('slug')) {
            $request->merge([
                'slug' => Str::slug(
                    $request->input('slug')
                ),
            ]);
        }

        $validated = $request->validate(
            $this->validationRules()
        );

        /*
        |--------------------------------------------------------------------------
        | Validate gallery total
        |--------------------------------------------------------------------------
        */

        $this->validateGalleryLimit($request);


        /*
        |--------------------------------------------------------------------------
        | Main image required
        |--------------------------------------------------------------------------
        */

        if (
            empty($validated['image'])
            && !$request->hasFile('image_upload')
        ) {
            return back()
                ->withErrors([
                    'image_upload' =>
                        'Please upload a main product image or enter an existing image path.',
                ])
                ->withInput();
        }


        /*
        |--------------------------------------------------------------------------
        | Slug
        |--------------------------------------------------------------------------
        */

        if (!empty($validated['slug'])) {
            $slug = $validated['slug'];
        } else {
            $slug = $this->generateUniqueSlug(
                Str::slug($validated['name'])
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Create Product
        |--------------------------------------------------------------------------
        */

        Product::create(
            $this->productPayload(
                $request,
                $validated,
                $slug
            )
        );

        return redirect()
            ->route('admin.products.index')
            ->with(
                'success',
                'Product created successfully.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | EDIT
    |--------------------------------------------------------------------------
    */

    public function edit(Product $product)
    {
        $categories = Category::query()
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        return view(
            'admin.products.edit',
            compact('product', 'categories')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */

    public function update(
        Request $request,
        Product $product
    ) {
        if ($request->filled('slug')) {
            $request->merge([
                'slug' => Str::slug(
                    $request->input('slug')
                ),
            ]);
        }

        $validated = $request->validate(
            $this->validationRules($product)
        );


        /*
        |--------------------------------------------------------------------------
        | Gallery limit
        |--------------------------------------------------------------------------
        */

        $this->validateGalleryLimit($request);


        /*
        |--------------------------------------------------------------------------
        | Main image must always exist
        |--------------------------------------------------------------------------
        */

        if (
            empty($validated['image'])
            && !$request->hasFile('image_upload')
            && empty($product->image)
        ) {
            return back()
                ->withErrors([
                    'image_upload' =>
                        'Please upload a main product image or enter an existing image path.',
                ])
                ->withInput();
        }


        /*
        |--------------------------------------------------------------------------
        | Slug
        |--------------------------------------------------------------------------
        */

        if (!empty($validated['slug'])) {
            $slug = $validated['slug'];
        } else {
            $slug = $this->generateUniqueSlug(
                Str::slug($validated['name']),
                $product->id
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Update
        |--------------------------------------------------------------------------
        */

        $product->update(
            $this->productPayload(
                $request,
                $validated,
                $slug,
                $product
            )
        );

        return redirect()
            ->route('admin.products.index')
            ->with(
                'success',
                'Product updated successfully.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | DELETE
    |--------------------------------------------------------------------------
    */

    public function destroy(Product $product)
    {
        /*
        |--------------------------------------------------------------------------
        | IMPORTANT
        |--------------------------------------------------------------------------
        |
        | Only database record is deleted.
        |
        | Physical files inside public/images are NOT deleted because
        | old images may be used by another product/page.
        |
        */

        $productName = $product->name;

        $product->delete();

        return redirect()
            ->route('admin.products.index')
            ->with(
                'success',
                "Product \"{$productName}\" deleted successfully."
            );
    }


    /*
    |--------------------------------------------------------------------------
    | VALIDATION RULES
    |--------------------------------------------------------------------------
    */

    private function validationRules(
        ?Product $product = null
    ): array {
        $slugRule = Rule::unique(
            'products',
            'slug'
        );

        if ($product) {
            $slugRule->ignore($product->id);
        }

        return [

            /*
            |--------------------------------------------------------------------------
            | Basic
            |--------------------------------------------------------------------------
            */

            'category_id' => [
                'required',
                'integer',
                'exists:categories,id',
            ],

            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'slug' => [
                'nullable',
                'string',
                'max:255',
                $slugRule,
            ],

            'description' => [
                'nullable',
                'string',
                'max:10000',
            ],

            'price' => [
                'required',
                'numeric',
                'min:0',
                'max:99999999.99',
            ],


            /*
            |--------------------------------------------------------------------------
            | Main Image
            |--------------------------------------------------------------------------
            */

            'image' => [
                'nullable',
                'string',
                'max:1000',
            ],

            'image_upload' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:10240',
            ],


            /*
            |--------------------------------------------------------------------------
            | Gallery
            |--------------------------------------------------------------------------
            */

            'gallery' => [
                'nullable',
                'array',
                'max:7',
            ],

            'gallery.*' => [
                'nullable',
                'string',
                'max:1000',
            ],

            'gallery_uploads' => [
                'nullable',
                'array',
                'max:7',
            ],

            'gallery_uploads.*' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:10240',
            ],


            /*
            |--------------------------------------------------------------------------
            | Video
            |--------------------------------------------------------------------------
            */

            'video' => [
                'nullable',
                'string',
                'max:1000',
            ],

            'video_upload' => [
                'nullable',
                'file',
                'mimes:mp4,webm',
                'max:102400',
            ],

            'remove_video' => [
                'nullable',
                'boolean',
            ],


            /*
            |--------------------------------------------------------------------------
            | Display
            |--------------------------------------------------------------------------
            */

            'rating' => [
                'nullable',
                'numeric',
                'min:0',
                'max:5',
            ],

            'review_count' => [
                'nullable',
                'integer',
                'min:0',
                'max:999999999',
            ],

            'sort_order' => [
                'nullable',
                'integer',
                'min:0',
                'max:999999',
            ],


            /*
            |--------------------------------------------------------------------------
            | Product Types
            |--------------------------------------------------------------------------
            */

            'product_types' => [
                'nullable',
                'array',
                'max:20',
            ],

            'product_types.*' => [
                'nullable',
                'string',
                'max:100',
            ],


            /*
            |--------------------------------------------------------------------------
            | Detail
            |--------------------------------------------------------------------------
            */

            'detail_content' => [
                'nullable',
                'string',
                'max:30000',
            ],

            'detail_features' => [
                'nullable',
                'array',
                'max:20',
            ],

            'detail_features.*.title' => [
                'nullable',
                'string',
                'max:255',
            ],

            'detail_features.*.description' => [
                'nullable',
                'string',
                'max:1000',
            ],


            /*
            |--------------------------------------------------------------------------
            | Specifications
            |--------------------------------------------------------------------------
            */

            'specifications' => [
                'nullable',
                'array',
                'max:50',
            ],

            'specifications.*.label' => [
                'nullable',
                'string',
                'max:255',
            ],

            'specifications.*.value' => [
                'nullable',
                'string',
                'max:1000',
            ],


            /*
            |--------------------------------------------------------------------------
            | Dimensions
            |--------------------------------------------------------------------------
            */

            'dimensions' => [
                'nullable',
                'array',
            ],

            'dimensions.width' => [
                'nullable',
                'string',
                'max:100',
            ],

            'dimensions.height' => [
                'nullable',
                'string',
                'max:100',
            ],

            'dimensions.length' => [
                'nullable',
                'string',
                'max:100',
            ],

            'dimensions.weight' => [
                'nullable',
                'string',
                'max:100',
            ],


            /*
            |--------------------------------------------------------------------------
            | Installation
            |--------------------------------------------------------------------------
            */

            'installation_steps' => [
                'nullable',
                'array',
                'max:20',
            ],

            'installation_steps.*.title' => [
                'nullable',
                'string',
                'max:255',
            ],

            'installation_steps.*.description' => [
                'nullable',
                'string',
                'max:2000',
            ],


            /*
            |--------------------------------------------------------------------------
            | FAQs
            |--------------------------------------------------------------------------
            */

            'faqs' => [
                'nullable',
                'array',
                'max:30',
            ],

            'faqs.*.question' => [
                'nullable',
                'string',
                'max:500',
            ],

            'faqs.*.answer' => [
                'nullable',
                'string',
                'max:5000',
            ],
        ];
    }


    /*
    |--------------------------------------------------------------------------
    | PRODUCT PAYLOAD
    |--------------------------------------------------------------------------
    */

    private function productPayload(
        Request $request,
        array $validated,
        string $slug,
        ?Product $product = null
    ): array {

        /*
        |--------------------------------------------------------------------------
        | MAIN IMAGE
        |--------------------------------------------------------------------------
        */

        $image = $product?->image;

        $manualImage = $this->nullableString(
            $validated['image'] ?? null
        );

        /*
        | Manual path can replace existing path.
        */

        if ($manualImage !== null) {
            $image = $manualImage;
        }

        /*
        | Uploaded image always has highest priority.
        */

        if ($request->hasFile('image_upload')) {
            $image = $this->uploadProductMedia(
                $request->file('image_upload'),
                'main'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | GALLERY
        |--------------------------------------------------------------------------
        */

        $gallery = $this->cleanStringArray(
            $validated['gallery'] ?? []
        );

        $galleryUploads = $request->file(
            'gallery_uploads',
            []
        );

        if (!is_array($galleryUploads)) {
            $galleryUploads = [];
        }

        foreach ($galleryUploads as $uploadedImage) {

            if (!$uploadedImage instanceof UploadedFile) {
                continue;
            }

            $gallery[] = $this->uploadProductMedia(
                $uploadedImage,
                'gallery'
            );
        }

        $gallery = array_values(
            array_unique(
                array_filter($gallery)
            )
        );

        $gallery = array_slice(
            $gallery,
            0,
            7
        );


        /*
        |--------------------------------------------------------------------------
        | VIDEO
        |--------------------------------------------------------------------------
        */

        $video = $product?->video;

        $manualVideo = $this->nullableString(
            $validated['video'] ?? null
        );

        /*
        |--------------------------------------------------------------------------
        | Create
        |--------------------------------------------------------------------------
        */

        if ($product === null) {
            $video = $manualVideo;
        }

        /*
        |--------------------------------------------------------------------------
        | Edit - manual path replaces current video
        |--------------------------------------------------------------------------
        */

        elseif ($manualVideo !== null) {
            $video = $manualVideo;
        }


        /*
        |--------------------------------------------------------------------------
        | Remove Video
        |--------------------------------------------------------------------------
        */

        if ($request->boolean('remove_video')) {
            $video = null;
        }


        /*
        |--------------------------------------------------------------------------
        | New upload has highest priority
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('video_upload')) {
            $video = $this->uploadProductMedia(
                $request->file('video_upload'),
                'videos'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Product Types
        |--------------------------------------------------------------------------
        */

        $productTypes = $this->cleanStringArray(
            $validated['product_types'] ?? []
        );


        /*
        |--------------------------------------------------------------------------
        | Payload
        |--------------------------------------------------------------------------
        */

        return [

            'category_id' =>
                (int) $validated['category_id'],

            'name' =>
                trim($validated['name']),

            'slug' =>
                $slug,

            'description' =>
                $this->nullableString(
                    $validated['description'] ?? null
                ),

            'price' =>
                (float) $validated['price'],


            /*
            |--------------------------------------------------------------------------
            | Media
            |--------------------------------------------------------------------------
            */

            'image' =>
                $image,

            'gallery' =>
                $gallery,

            'video' =>
                $video,


            /*
            |--------------------------------------------------------------------------
            | Display
            |--------------------------------------------------------------------------
            */

            'rating' =>
                isset($validated['rating'])
                    ? (float) $validated['rating']
                    : 5.0,

            'review_count' =>
                isset($validated['review_count'])
                    ? (int) $validated['review_count']
                    : 0,

            'sort_order' =>
                isset($validated['sort_order'])
                    ? (int) $validated['sort_order']
                    : 0,

            'is_active' =>
                $request->boolean('is_active'),

            'is_featured' =>
                $request->boolean('is_featured'),


            /*
            |--------------------------------------------------------------------------
            | Types
            |--------------------------------------------------------------------------
            */

            'product_types' =>
                $productTypes,


            /*
            |--------------------------------------------------------------------------
            | Detail
            |--------------------------------------------------------------------------
            */

            'detail_content' =>
                $this->nullableString(
                    $validated['detail_content'] ?? null
                ),

            'detail_features' =>
                $this->cleanRows(
                    $validated['detail_features'] ?? [],
                    [
                        'title',
                        'description',
                    ]
                ),


            /*
            |--------------------------------------------------------------------------
            | Specifications
            |--------------------------------------------------------------------------
            */

            'specifications' =>
                $this->cleanRows(
                    $validated['specifications'] ?? [],
                    [
                        'label',
                        'value',
                    ]
                ),


            /*
            |--------------------------------------------------------------------------
            | Dimensions
            |--------------------------------------------------------------------------
            */

            'dimensions' =>
                $this->cleanDimensions(
                    $validated['dimensions'] ?? []
                ),


            /*
            |--------------------------------------------------------------------------
            | Installation
            |--------------------------------------------------------------------------
            */

            'installation_steps' =>
                $this->cleanRows(
                    $validated['installation_steps'] ?? [],
                    [
                        'title',
                        'description',
                    ]
                ),


            /*
            |--------------------------------------------------------------------------
            | FAQs
            |--------------------------------------------------------------------------
            */

            'faqs' =>
                $this->cleanRows(
                    $validated['faqs'] ?? [],
                    [
                        'question',
                        'answer',
                    ]
                ),
        ];
    }


    /*
    |--------------------------------------------------------------------------
    | VALIDATE GALLERY LIMIT
    |--------------------------------------------------------------------------
    */

    private function validateGalleryLimit(
        Request $request
    ): void {
        $existingGallery = $request->input(
            'gallery',
            []
        );

        if (!is_array($existingGallery)) {
            $existingGallery = [];
        }

        $existingCount = collect($existingGallery)
            ->filter(function ($path) {
                return is_string($path)
                    && trim($path) !== '';
            })
            ->count();


        $uploads = $request->file(
            'gallery_uploads',
            []
        );

        if (!is_array($uploads)) {
            $uploads = [];
        }

        $uploadCount = collect($uploads)
            ->filter(
                fn ($file) =>
                    $file instanceof UploadedFile
            )
            ->count();


        if (($existingCount + $uploadCount) > 7) {
            throw ValidationException::withMessages([
                'gallery_uploads' =>
                    'Maximum 7 gallery images are allowed. Remove some existing images or select fewer new images.',
            ]);
        }
    }


    /*
    |--------------------------------------------------------------------------
    | UPLOAD PRODUCT MEDIA
    |--------------------------------------------------------------------------
    |
    | Existing public/images structure is preserved.
    |
    | New files:
    |
    | public/images/Products/uploads/main/
    | public/images/Products/uploads/gallery/
    | public/images/Products/uploads/videos/
    |
    */

    private function uploadProductMedia(
        UploadedFile $file,
        string $folder
    ): string {
        $allowedFolders = [
            'main',
            'gallery',
            'videos',
        ];

        if (!in_array(
            $folder,
            $allowedFolders,
            true
        )) {
            $folder = 'main';
        }

        $directory = public_path(
            'images/Products/uploads/' . $folder
        );

        if (!File::isDirectory($directory)) {
            File::makeDirectory(
                $directory,
                0755,
                true,
                true
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Extension
        |--------------------------------------------------------------------------
        */

        $extension = strtolower(
            $file->getClientOriginalExtension()
        );


        /*
        |--------------------------------------------------------------------------
        | Safe unique filename
        |--------------------------------------------------------------------------
        */

        $filename =
            now()->format('YmdHis')
            . '-'
            . Str::lower(
                Str::random(20)
            )
            . '.'
            . $extension;


        /*
        |--------------------------------------------------------------------------
        | Move directly into public/images
        |--------------------------------------------------------------------------
        */

        $file->move(
            $directory,
            $filename
        );


        /*
        |--------------------------------------------------------------------------
        | Store public-relative path in DB
        |--------------------------------------------------------------------------
        */

        return
            'images/Products/uploads/'
            . $folder
            . '/'
            . $filename;
    }


    /*
    |--------------------------------------------------------------------------
    | CLEAN STRING ARRAY
    |--------------------------------------------------------------------------
    */

    private function cleanStringArray(
        array $items
    ): array {
        return collect($items)
            ->map(function ($item) {

                if (!is_string($item)) {
                    return null;
                }

                $item = trim($item);

                return $item !== ''
                    ? $item
                    : null;
            })
            ->filter()
            ->unique()
            ->values()
            ->all();
    }


    /*
    |--------------------------------------------------------------------------
    | CLEAN ROWS
    |--------------------------------------------------------------------------
    */

    private function cleanRows(
        array $rows,
        array $allowedKeys
    ): array {
        return collect($rows)
            ->map(
                function ($row) use ($allowedKeys) {

                    if (!is_array($row)) {
                        return null;
                    }

                    $cleanRow = [];

                    foreach ($allowedKeys as $key) {

                        $value = $row[$key] ?? null;

                        if (is_string($value)) {
                            $value = trim($value);
                        }

                        $cleanRow[$key] =
                            $value === ''
                                ? null
                                : $value;
                    }

                    $hasValue = collect($cleanRow)
                        ->contains(
                            fn ($value) =>
                                $value !== null
                                && $value !== ''
                        );

                    return $hasValue
                        ? $cleanRow
                        : null;
                }
            )
            ->filter()
            ->values()
            ->all();
    }


    /*
    |--------------------------------------------------------------------------
    | CLEAN DIMENSIONS
    |--------------------------------------------------------------------------
    */

    private function cleanDimensions(
        array $dimensions
    ): array {
        $keys = [
            'width',
            'height',
            'length',
            'weight',
        ];

        $clean = [];

        foreach ($keys as $key) {

            $value = $dimensions[$key] ?? null;

            if (is_string($value)) {
                $value = trim($value);
            }

            $clean[$key] =
                $value === ''
                    ? null
                    : $value;
        }

        return $clean;
    }


    /*
    |--------------------------------------------------------------------------
    | NULLABLE STRING
    |--------------------------------------------------------------------------
    */

    private function nullableString(
        mixed $value
    ): ?string {
        if (!is_string($value)) {
            return null;
        }

        $value = trim($value);

        return $value !== ''
            ? $value
            : null;
    }


    /*
    |--------------------------------------------------------------------------
    | UNIQUE SLUG
    |--------------------------------------------------------------------------
    */

    private function generateUniqueSlug(
        string $baseSlug,
        ?int $ignoreProductId = null
    ): string {
        if ($baseSlug === '') {
            $baseSlug = 'product';
        }

        $slug = $baseSlug;
        $counter = 2;

        while (true) {

            $query = Product::query()
                ->where(
                    'slug',
                    $slug
                );

            if ($ignoreProductId !== null) {
                $query->where(
                    'id',
                    '!=',
                    $ignoreProductId
                );
            }

            if (!$query->exists()) {
                return $slug;
            }

            $slug =
                $baseSlug
                . '-'
                . $counter;

            $counter++;
        }
    }
}