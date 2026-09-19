<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | CATEGORY LIST
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $categories = Category::withCount('products')
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        return view(
            'admin.categories.index',
            compact('categories')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | CREATE CATEGORY
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        return view(
            'admin.categories.create'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | STORE CATEGORY
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | Normalize Manual Slug
        |--------------------------------------------------------------------------
        */

        if ($request->filled('slug')) {

            $request->merge([
                'slug' => Str::slug(
                    $request->input('slug')
                ),
            ]);

        }


        /*
        |--------------------------------------------------------------------------
        | Validation
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate(
            $this->validationRules()
        );


        /*
        |--------------------------------------------------------------------------
        | Generate Slug
        |--------------------------------------------------------------------------
        */

        if (!empty($validated['slug'])) {

            $slug = $validated['slug'];

        } else {

            $baseSlug = Str::slug(
                $validated['name']
            );

            $slug = $this->generateUniqueSlug(
                $baseSlug
            );

        }


        /*
        |--------------------------------------------------------------------------
        | Create Category
        |--------------------------------------------------------------------------
        */

        Category::create(
            $this->categoryPayload(
                $request,
                $validated,
                $slug
            )
        );


        return redirect()
            ->route('admin.categories.index')
            ->with(
                'success',
                'Category created successfully.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | EDIT CATEGORY
    |--------------------------------------------------------------------------
    */

    public function edit(Category $category)
    {
        return view(
            'admin.categories.edit',
            compact('category')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE CATEGORY
    |--------------------------------------------------------------------------
    */

    public function update(
        Request $request,
        Category $category
    ) {
        /*
        |--------------------------------------------------------------------------
        | Normalize Manual Slug
        |--------------------------------------------------------------------------
        */

        if ($request->filled('slug')) {

            $request->merge([
                'slug' => Str::slug(
                    $request->input('slug')
                ),
            ]);

        }


        /*
        |--------------------------------------------------------------------------
        | Validation
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate(
            $this->validationRules(
                $category
            )
        );


        /*
        |--------------------------------------------------------------------------
        | Generate Slug
        |--------------------------------------------------------------------------
        */

        if (!empty($validated['slug'])) {

            $slug = $validated['slug'];

        } else {

            $baseSlug = Str::slug(
                $validated['name']
            );

            $slug = $this->generateUniqueSlug(
                $baseSlug,
                $category->id
            );

        }


        /*
        |--------------------------------------------------------------------------
        | Update Category
        |--------------------------------------------------------------------------
        */

        $category->update(
            $this->categoryPayload(
                $request,
                $validated,
                $slug
            )
        );


        return redirect()
            ->route('admin.categories.index')
            ->with(
                'success',
                'Category updated successfully.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | DELETE CATEGORY
    |--------------------------------------------------------------------------
    */

    public function destroy(Category $category)
    {
        /*
        |--------------------------------------------------------------------------
        | Protect Categories Containing Products
        |--------------------------------------------------------------------------
        */

        $productCount = $category
            ->products()
            ->count();


        if ($productCount > 0) {

            return redirect()
                ->route('admin.categories.index')
                ->with(
                    'error',
                    "Category \"{$category->name}\" cannot be deleted because it contains {$productCount} product(s). Move or delete those products first."
                );

        }


        /*
        |--------------------------------------------------------------------------
        | Safe Delete
        |--------------------------------------------------------------------------
        |
        | Sirf database category delete hogi.
        | Physical catalogue images delete nahi hongi.
        |
        */

        $categoryName = $category->name;

        $category->delete();


        return redirect()
            ->route('admin.categories.index')
            ->with(
                'success',
                "Category \"{$categoryName}\" deleted successfully."
            );
    }


    /*
    |--------------------------------------------------------------------------
    | VALIDATION RULES
    |--------------------------------------------------------------------------
    */

    private function validationRules(
        ?Category $category = null
    ): array {

        /*
        |--------------------------------------------------------------------------
        | Unique Slug
        |--------------------------------------------------------------------------
        */

        $slugRule = Rule::unique(
            'categories',
            'slug'
        );


        if ($category) {

            $slugRule->ignore(
                $category->id
            );

        }


        return [

            /*
            |--------------------------------------------------------------------------
            | BASIC INFORMATION
            |--------------------------------------------------------------------------
            */

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


            /*
            |--------------------------------------------------------------------------
            | CATALOGUE
            |--------------------------------------------------------------------------
            */

            'folder' => [
                'nullable',
                'string',
                'max:255',
            ],

            /*
            | Existing category image.
            | Isko preserve kar rahe hain.
            */

            'image' => [
                'nullable',
                'string',
                'max:1000',
            ],


            /*
            |--------------------------------------------------------------------------
            | PRODUCTS PAGE MEDIA
            |--------------------------------------------------------------------------
            */

            'hero_image' => [
                'nullable',
                'string',
                'max:1000',
            ],

            'banner_image' => [
                'nullable',
                'string',
                'max:1000',
            ],


            /*
            |--------------------------------------------------------------------------
            | SORTING
            |--------------------------------------------------------------------------
            */

            'sort_order' => [
                'nullable',
                'integer',
                'min:0',
                'max:999999',
            ],

        ];
    }


    /*
    |--------------------------------------------------------------------------
    | CATEGORY PAYLOAD
    |--------------------------------------------------------------------------
    */

    private function categoryPayload(
        Request $request,
        array $validated,
        string $slug
    ): array {

        return [

            /*
            |--------------------------------------------------------------------------
            | BASIC INFORMATION
            |--------------------------------------------------------------------------
            */

            'name' =>
                trim(
                    $validated['name']
                ),

            'slug' =>
                $slug,

            'description' =>
                $this->nullableString(
                    $validated['description']
                    ?? null
                ),


            /*
            |--------------------------------------------------------------------------
            | CATALOGUE
            |--------------------------------------------------------------------------
            */

            'folder' =>
                $this->nullableString(
                    $validated['folder']
                    ?? null
                ),

            'image' =>
                $this->nullableString(
                    $validated['image']
                    ?? null
                ),


            /*
            |--------------------------------------------------------------------------
            | PRODUCTS PAGE MEDIA
            |--------------------------------------------------------------------------
            */

            'hero_image' =>
                $this->nullableString(
                    $validated['hero_image']
                    ?? null
                ),

            'banner_image' =>
                $this->nullableString(
                    $validated['banner_image']
                    ?? null
                ),


            /*
            |--------------------------------------------------------------------------
            | DISPLAY
            |--------------------------------------------------------------------------
            */

            'sort_order' =>
                isset($validated['sort_order'])
                    ? (int) $validated['sort_order']
                    : 0,

            'is_active' =>
                $request->boolean(
                    'is_active'
                ),

        ];
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


        $value = trim(
            $value
        );


        return $value !== ''
            ? $value
            : null;
    }


    /*
    |--------------------------------------------------------------------------
    | GENERATE UNIQUE CATEGORY SLUG
    |--------------------------------------------------------------------------
    */

    private function generateUniqueSlug(
        string $baseSlug,
        ?int $ignoreCategoryId = null
    ): string {

        if ($baseSlug === '') {

            $baseSlug =
                'category';

        }


        $slug =
            $baseSlug;

        $counter =
            2;


        while (true) {

            $query = Category::query()
                ->where(
                    'slug',
                    $slug
                );


            if ($ignoreCategoryId !== null) {

                $query->where(
                    'id',
                    '!=',
                    $ignoreCategoryId
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