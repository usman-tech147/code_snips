<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function store(Request $request)
    {

//        create product
        $product = new Product();
        $product->subcategory_id = $request->subcategory;
        $product->name = $request->pro_name;
        $product->price = $request->pro_price;
        $product->added_date = $request->added_date;
        $product->description = $request->pro_description;
        $product->quality_id = $request->pro_quality;
        $product->fabric_id = $request->pro_fabric;
        $product->status = 0;

        // single file save in storage
        if ($request->hasFile('pro_image')) {
            $fileName = Str::random(10) . '.' . $request->file('pro_image')->getClientOriginalName();
            $request->file('pro_image')->move(public_path('images'),$fileName);
            $product->image = $fileName;
        } else {
            $product->image = "nophoto.png";
        }
        $product->save();

//        save data in pivot tables
        $product->colors()->sync($request->colors);
        $product->sizes()->sync($request->sizes);


        return response()->json(['data' => $product]);
    }

    public function edit($id)
    {
        $categories = DB::table('categories')->get();
        $colors = DB::table('colors')->select(['id', 'name'])->get();
        $sizes = DB::table('sizes')->select(['id', 'name'])->get();
        $qualities = DB::table('qualities')->select(['id', 'name'])->get();
        $fabrics = DB::table('fabrics')->select(['id', 'name'])->get();

        $getProductDetails = Product::with('subcategory', 'fabric', 'quality', 'colors', 'sizes')
            ->where('id', '=', $id)->get();
        $category = Subcategory::find($getProductDetails[0]['subcategory']['id'])->category->id;

        $colors_id = array();
        $sizes_id = array();

        foreach ($getProductDetails[0]['colors']->toArray() as $color) {
            array_push($colors_id, $color['id']);
        }

        foreach ($getProductDetails[0]['sizes']->toArray() as $size) {
            array_push($sizes_id, $size['id']);
        }

        $product = [
            "id" => $getProductDetails[0]['id'],
            "category" => $category,
            "subcategory_id" => $getProductDetails[0]['subcategory']['id'],
            "subcategory_name" => $getProductDetails[0]['subcategory']['name'],
            "name" => $getProductDetails[0]['name'],
            "price" => $getProductDetails[0]['price'],
            "description" => $getProductDetails[0]['description'],
            "added_date" => $getProductDetails[0]['added_date'],
            "status" => $getProductDetails[0]['status'],
            "quality" => $getProductDetails[0]['quality']['id'],
            "fabric" => $getProductDetails[0]['fabric']['id'],
            "colors" => $colors_id,
            "sizes" => $sizes_id,
            "image" => $getProductDetails[0]['image']
        ];

        return view('admin.product.product',
            compact('categories', 'colors', 'sizes', 'fabrics', 'qualities', 'product')
        );
    }

    public function update(Request $request)
    {
        $product = Product::find($request->product_id);
        if($product->image != 'nophoto.png')
        {
            $path = public_path('/images/'.$product->image);
            if(File::exists($path))
            {
                File::delete($path);
            }
        }
        $product->subcategory_id = $request->subcategory;
        $product->name = $request->pro_name;
        $product->price = $request->pro_price;
        $product->added_date = $request->added_date;
        $product->description = $request->pro_description;
        $product->quality_id = $request->pro_quality;
        $product->fabric_id = $request->pro_fabric;
        $product->status = 0;
        if ($request->hasFile('pro_image')) {
            $fileName = Str::random(10) . '.' . $request->file('pro_image')->getClientOriginalName();
            $request->file('pro_image')->move(public_path('images'),$fileName);
            $product->image = $fileName;
        } else {
            $product->image = "nophoto.png";
        }

//        save data in pivot tables
        $product->colors()->sync($request->colors);
        $product->sizes()->sync($request->sizes);
        $product->save();

        return response()->json(['data' => $product]);

    }


    public function delete(Request $request)
    {
        $product = Product::find($request->product_id);
        if($product->image != 'nophoto.png')
        {
            $path = public_path('/images/'.$product->image);
            if(File::exists($path))
            {
                File::delete($path);
            }
        }
        $product->delete();

        return response()->json(['id' => $request->product_id]);
    }
}
