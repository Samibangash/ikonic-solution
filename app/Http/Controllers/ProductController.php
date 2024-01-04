<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\ProductFeedback;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all();
        return view('Product.product_index',compact('product'));
    }

    public function landing_index()
    {
        $product = Product::all();
        return view('landing_page',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function productFeedback(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        if (Auth::user()->role == "admin") {
            Auth::logout();
            return redirect()->route('login');
        }
        DB::beginTransaction();
        try{
            $product_feedback                   = new ProductFeedback();
            $product_feedback->product_id       = $request->product_id;
            $product_feedback->user_id          = Auth::user()->id;
            $product_feedback->title            = $request->title;
            $product_feedback->category_id      =  $request->category_id;
            $product_feedback->description      =  $request->description;
            $product_feedback->save();
            DB::commit();
            return back()->with(['type' => 'success', 'title' => 'success', 'message' => 'Add Successfully']);
        }
        catch (Exception $e)
        {
            DB::rollback();
            return back()->with(['type' => 'error', 'title' => 'error', 'message' => $e->getMessage().'something wrong!!']);
        }
    }
    public function productFeedbackComment(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        if (Auth::user()->role == "admin") {
            Auth::logout();
            return redirect()->route('login');
        }
        DB::beginTransaction();
        try{
            $comment                            = new Comment();
            $comment->product_feedback_id       = $request->product_feedback_id;
            $comment->user_id                   = Auth::user()->id;
            $comment->parent_id                 = $request->parent_id;
            $comment->comment                   = $request->comment;
            $comment->date                      = Carbon::now()->format('Y-m-d');
            $comment->save();
            DB::commit();
            return back()->with(['type' => 'success', 'title' => 'success', 'message' => 'Add Successfully']);
        }
        catch (Exception $e)
        {
            DB::rollback();
            dd($e->getMessage());
            return back()->with(['type' => 'error', 'title' => 'error', 'message' => $e->getMessage().'something wrong!!']);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        DB::beginTransaction();
        try{
            $product               = new Product();
            $product->name         = $request->name;
            $product->price        = $request->price;
            if ($request->file('image')){
                $file = $request->file('image');
                $filename = time().uniqid('', true).'.'.$file->getClientOriginalExtension();
                $file->storeAs('/public/images/product', $filename);

                $product->image = $filename;
            }
            $product->status       = $request->active ?? 0;
            $product->save();
            DB::commit();
            return back()->with(['type' => 'success', 'title' => 'success', 'message' => 'Add Successfully']);
        }
        catch (Exception $e)
        {
            DB::rollback();
            return back()->with(['type' => 'error', 'title' => 'error', 'message' => $e->getMessage().'something wrong!!']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {

        return view('Product.product_feedback',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return response()->json(
            [
                'id' => $product->id,
                'name' => $product->name,
                'image' => $product->image,
                'price' => $product->price,
                'status' => $product->status
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        DB::beginTransaction();
        try{
            $product->name = $request->name;
            $product->price = $request->price;

            if ($request->file('image')) {
                if ($product->image) {
                    $previousImagePath = 'images/product/' . $product->image;

                    if (Storage::disk('public')->exists($previousImagePath)) {
                        Storage::disk('public')->delete($previousImagePath);
                    }
                }
                $file = $request->file('image');
                $filename = time() . uniqid('', true) . '.' . $file->getClientOriginalExtension();
                $file->storeAs('/public/images/product', $filename);

                $product->image = $filename;
            }
            $product->status = $request->active ?? 0;
            $product->save();

            DB::commit();
            return back()->with(['type' => 'success', 'title' => 'success', 'message' => 'Add Successfully']);
        }
        catch (Exception $e)
        {
            DB::rollback();
            return back()->with(['type' => 'error', 'title' => 'error', 'message' => $e->getMessage().'something wrong!!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json(['success' => 'success']);
    }
}
