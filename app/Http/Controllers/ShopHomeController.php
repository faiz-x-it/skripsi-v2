<?php

namespace App\Http\Controllers;

use GrahamCampbell\Markdown\Facades\Markdown;
use App\Product;
use App\Category;
use Illuminate\Http\Request;

class ShopHomeController extends Controller
{
    public function index()
    {
        # Home page Products
        
        $produk = Product::with('category', 'image')
        ->where('discount_rate', '=', 0)
        ->orderBy('id', 'DESC')
        ->take(4)
            ->get();
        $discount_produk = Product::with('category')
            ->where('discount_rate', '>', 0)
            ->orderBy('discount_rate', 'desc')
            ->take(4)
            ->get();
            
        return view('public.home', compact('discount_produk', 'produk'));
    }
    public function all()
    {
        # ComposerServiceProvider load here
        $produk = Product::with('image', 'category')
                    ->orderBy('id', 'ASC')
                    ->search(request('term')) #...Search Query
                    ->paginate(16);
        return view('public.product-page', compact('produk'));
    }
    public function discount()
    {
        # ComposerServiceProvider load here
        $discountTitle = "All discount produk";
        $produk = Product::with( 'image', 'category')
            ->orderBy('discount_rate', 'DESC')
            ->where('discount_rate', '>', 0)
            ->paginate(16);
        return view('public.product-page', compact('produk', 'discountTitle'));
    }
    /*
     * Books filter by category
     */
    public function category(Category $category)
    {
        $categoryName = $category->name;
        $produk = $category->books()
            ->with('category', 'image')
            ->orderBy('id','DESC')
            ->paginate(16);
        return view('public.product-page', compact('produk', 'categoryName'));
    }
  

    
    public function ProductDetails($id)
    {
        $produk = Product::findOrFail($id);
        $produk_reviews = $produk->reviews()->latest()->get();
        
        // Preprocessing
        $title = strtolower($produk->title);
        $title = preg_replace('/[^\w\s]/', '', $title);
        $keywords = explode(' ', $title);
        
        // TF-IDF Weighting
        $allBooks = Product::all();
        $bookCount = $allBooks->count();
        $bookKeywords = [];
    
        foreach ($allBooks as $book) {
            $bookKeywords[$book->id] = [];
            $bookTitle = strtolower($book->title);
            $bookTitle = preg_replace('/[^\w\s]/', '', $bookTitle);
            $bookTitleKeywords = explode(' ', $bookTitle);
    
            foreach ($bookTitleKeywords as $keyword) {
                if (!in_array($keyword, $bookKeywords[$book->id])) {
                    $bookKeywords[$book->id][] = $keyword;
                }
            }
        }
    
        // Cosine Similarity Calculation
        $similarProducts = [];
        $currentProductKeywords = $bookKeywords[$id];
    
        foreach ($allBooks as $book) {
            if ($book->id != $id) {
                $dotProduct = 0;
                $magnitudeA = 0;
                $magnitudeB = 0;
    
                foreach ($currentProductKeywords as $keyword) {
                    $dotProduct += array_count_values($bookKeywords[$book->id])[$keyword] ?? 0;
                    $magnitudeA += pow(array_count_values($bookKeywords[$id])[$keyword] ?? 0, 2);
                    $magnitudeB += pow(array_count_values($bookKeywords[$book->id])[$keyword] ?? 0, 2);
                }
    
                $magnitudeA = sqrt($magnitudeA);
                $magnitudeB = sqrt($magnitudeB);
    
                if ($magnitudeA != 0 && $magnitudeB != 0) {
                    $similarity = ($dotProduct / ($magnitudeA * $magnitudeB)) * 100;
                    $similarProducts[$book->id] = $similarity;
                }
            }
        }
    
        arsort($similarProducts);
    
        // Checkbox Filtering
        // $themeCheckbox = request()->input('theme');
        // $colorCheckbox = request()->input('color');
    
        // if ($themeCheckbox || $colorCheckbox) {
        //     $filteredProducts = [];
    
        //     foreach ($similarProducts as $productId => $similarity) {
        //         $book = Book::find($productId);
    
        //         if (($themeCheckbox && $book->theme == $produk->theme) || ($colorCheckbox && $book->color == $produk->color)) {
        //             $filteredProducts[$productId] = $similarity;
        //         }
        //     }
    
        //     $similarProducts = $filteredProducts;
        // }
    
        // Take Top 3 Random Products
        $similarProductIds = array_keys($similarProducts);
        shuffle($similarProductIds);
        $similarProductIds = array_slice($similarProductIds, 0, 3);
        $similarProducts = Product::whereIn('id', $similarProductIds)->get();
    
        return view('public.detail', compact('produk', 'produk_reviews', 'similarProducts'));
    }
    
}
