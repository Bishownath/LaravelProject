<?php

namespace App;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Cart;
use App\Image;
use App\Order;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	// use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     
    protected $fillable = [
        'title',
        'description',
        'price',
      	'stock',
      	'status',
        'category_id',
        'image',
    ];

    public function carts(){
      return $this->morphedByMany(Cart::class ,'productable')->withPivot('quantity');
    }

    public function orders(){
      return $this->morphedByMany(Order::class, 'productable')->withPivot('quantity');
    }

    public function images(){
      return $this->morphMany(Image::class, 'imageable');
    }

    // creating dynamic scope
    public function scopeAvailable($query){
      return $query->where('status', 'available')->get();
    }

    public function category(){
      // $products = Product::with('category')->get();
      // $categories = Category::all();
      return $this->belongsTo(Category::class, 'category_id');
    }

  //   public function productsCreateCategory() {
  //     $categories = Category::get();
  //     return view::make('site.admin.products_create', [
  //         'categories' => $categories
  //     ]);
  // }
    
}
