<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class DetailsComponent extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function render()
    {
        $categories = Category::orderBy('name', 'ASC')->get();
        $product = Product::where('slug', $this->slug)->first();
        $rproduct = Product::where('category_id', $product->category_id)->inRandomOrder()->limit(4)->get();
        $nproducts = Product::latest()->take(4)->get();
        return view('livewire.details-component', ['product' => $product, 'categories' => $categories, 'rproducts' => $rproduct, 'nproducts' => $nproducts]);
    }
}
