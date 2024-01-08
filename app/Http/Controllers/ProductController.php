<?php

namespace App\Http\Controllers;

use App\Events\PurchaseSuccessfull;
use App\Jobs\SendProductCreatedEmail;
use App\Mail\ProductCreated;
use App\Models\Category;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ProductController extends Controller
{
    public function index()
    {
        $category = Category::orderBy('id', 'DESC')->get();

        $product = Product::with('category')->orderBy('id', 'DESC')->get();


        return view('Product.product', compact('category', 'product'));
    }

    public function store(Request $request)
    {
        $data = new Product();
        $data->name = $request->name;
        $data->category_id = $request->Category_id;
        $data->price = $request->price;
        $data->qty = $request->qty;
        $data->save();

        // $data = User::where('id', Auth::user()->id)->first();
        $user = auth()->user();
        SendProductCreatedEmail::dispatch($user);
        // Mail::to($data->email)->send(new ProductCreated());

        return redirect()->back()->with('success', 'product Created successfully');
    }


    public function purchase(Request $request)
    {
        $data = Purchase::create([
            'product_id' => $request->product_name,
            'qty' => $request->qty
        ]);

        //return $data;

        
        PurchaseSuccessfull::dispatch($data);

        return redirect()->back();
    }
}
