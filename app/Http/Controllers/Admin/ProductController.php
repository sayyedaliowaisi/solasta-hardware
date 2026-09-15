<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Products List
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        $query = Product::with('category')
            ->orderBy('sort_order')
            ->orderByDesc('id');

        /*
        |--------------------------------------------------------------------------
        | Category Filter
        |--------------------------------------------------------------------------
        */

        if ($request->filled('category')) {
            $query->where(
                'category_id',
                $request->integer('category')
            );
        }

        $products = $query
            ->paginate(30)
            ->withQueryString();

        $categories = Category::orderBy('sort_order')
            ->orderBy('name')
            ->get();

        return view(
            'admin.products.index',
            compact(
                'products',
                'categories'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Create Product
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        $categories = Category::where('is_active', true)
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
    | Store Product
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | Normalize Manual Slug Before Validation
        |--------------------------------------------------------------------------
        |
        | Example:
        | "Premium Door Handle" => "premium-door-handle"
        |
        | Isse unique validation final normalized slug par chalegi.
        |
        */

        if ($request->filled('slug')) {
            $request->merge([
                'slug' => Str::slug($request->input('slug')),
            ]);
        }

        $validated = $request->validate([

            'category_id' => [
                'required',
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
                'unique:products,slug',
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'image' => [
                'required',
                'string',
                'max:1000',
            ],

            'video' => [
                'nullable',
                'string',
                'max:1000',
            ],

            'sort_order' => [
                'nullable',
                'integer',
                'min:0',
            ],

        ]);

        /*
        |--------------------------------------------------------------------------
        | Product Slug
        |--------------------------------------------------------------------------
        */

        if (!empty($validated['slug'])) {

            /*
             * Manual slug already normalized before validation.
             */
            $slug = $validated['slug'];

        } else {

            /*
             * Blank slug:
             * Generate automatically from product name.
             */
            $baseSlug = Str::slug(
                $validated['name']
            );

            $slug = $this->generateUniqueSlug(
                $baseSlug
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Create Product
        |--------------------------------------------------------------------------
        */

        Product::create([

            'category_id' =>
                $validated['category_id'],

            'name' =>
                $validated['name'],

            'slug' =>
                $slug,

            'description' =>
                $validated['description'] ?? null,

            'image' =>
                $validated['image'],

            'video' =>
                $validated['video'] ?? null,

            'sort_order' =>
                $validated['sort_order'] ?? 0,

            'is_active' =>
                $request->boolean('is_active'),

            'is_featured' =>
                $request->boolean('is_featured'),

        ]);

        return redirect()
            ->route('admin.products.index')
            ->with(
                'success',
                'Product created successfully.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | Edit Product
    |--------------------------------------------------------------------------
    */

    public function edit(Product $product)
    {
        $categories = Category::orderBy('sort_order')
            ->orderBy('name')
            ->get();

        return view(
            'admin.products.edit',
            compact(
                'product',
                'categories'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Update Product
    |--------------------------------------------------------------------------
    */

    public function update(
        Request $request,
        Product $product
    ) {
        /*
        |--------------------------------------------------------------------------
        | Normalize Manual Slug Before Validation
        |--------------------------------------------------------------------------
        */

        if ($request->filled('slug')) {
            $request->merge([
                'slug' => Str::slug($request->input('slug')),
            ]);
        }

        $validated = $request->validate([

            'category_id' => [
                'required',
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

                Rule::unique(
                    'products',
                    'slug'
                )->ignore($product->id),
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'image' => [
                'required',
                'string',
                'max:1000',
            ],

            'video' => [
                'nullable',
                'string',
                'max:1000',
            ],

            'sort_order' => [
                'nullable',
                'integer',
                'min:0',
            ],

        ]);

        /*
        |--------------------------------------------------------------------------
        | Update Slug
        |--------------------------------------------------------------------------
        */

        if (!empty($validated['slug'])) {

            /*
             * Manual slug already normalized and validated.
             */
            $slug = $validated['slug'];

        } else {

            /*
             * Blank slug:
             * Generate from current product name.
             */
            $baseSlug = Str::slug(
                $validated['name']
            );

            $slug = $this->generateUniqueSlug(
                $baseSlug,
                $product->id
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Update Product
        |--------------------------------------------------------------------------
        */

        $product->update([

            'category_id' =>
                $validated['category_id'],

            'name' =>
                $validated['name'],

            'slug' =>
                $slug,

            'description' =>
                $validated['description'] ?? null,

            'image' =>
                $validated['image'],

            'video' =>
                $validated['video'] ?? null,

            'sort_order' =>
                $validated['sort_order'] ?? 0,

            'is_active' =>
                $request->boolean('is_active'),

            'is_featured' =>
                $request->boolean('is_featured'),

        ]);

        return redirect()
            ->route('admin.products.index')
            ->with(
                'success',
                'Product updated successfully.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | Delete Product
    |--------------------------------------------------------------------------
    */

    public function destroy(Product $product)
    {
        /*
        |--------------------------------------------------------------------------
        | Keep Physical Catalogue Media
        |--------------------------------------------------------------------------
        |
        | Product record sirf database se remove hoga.
        |
        | Image/video ki physical files intentionally delete nahi hongi,
        | kyunki catalogue media public/images/Products directory me
        | independently maintained hai aur reuse ho sakta hai.
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
    | Generate Unique Product Slug
    |--------------------------------------------------------------------------
    */

    private function generateUniqueSlug(
        string $baseSlug,
        ?int $ignoreProductId = null
    ): string {

        /*
        |--------------------------------------------------------------------------
        | Empty Product Name Edge Case
        |--------------------------------------------------------------------------
        */

        if ($baseSlug === '') {
            $baseSlug = 'product';
        }

        $slug = $baseSlug;
        $counter = 2;

        /*
        |--------------------------------------------------------------------------
        | Find Available Slug
        |--------------------------------------------------------------------------
        |
        | Example:
        |
        | door-handle
        | door-handle-2
        | door-handle-3
        |
        */

        while (true) {

            $query = Product::where(
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

            $slug = $baseSlug . '-' . $counter;

            $counter++;
        }
    }
}