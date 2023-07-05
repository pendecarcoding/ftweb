<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductTranslation;
use App\Models\Category;
use App\Models\ProductTax;
use App\Models\AttributeValue;
use App\Models\Car;
use App\Models\Cart;
use App\Models\Pricefeed;
use Carbon\Carbon;
use Combinations;
use CoreComponentRepository;
use Artisan;
use Cache;
use Str;
use App\Services\ProductService;
use App\Services\ProductTaxService;
use App\Services\ProductFlashDealService;
use App\Services\ProductStockService;
use Illuminate\Support\Facades\DB;
use Session;
use App\Models\User;

class ProductController extends Controller
{
    protected $productService;
    protected $productTaxService;
    protected $productFlashDealService;
    protected $productStockService;

    public function __construct(
        ProductService $productService,
        ProductTaxService $productTaxService,
        ProductFlashDealService $productFlashDealService,
        ProductStockService $productStockService
    ) {
        $this->productService = $productService;
        $this->productTaxService = $productTaxService;
        $this->productFlashDealService = $productFlashDealService;
        $this->productStockService = $productStockService;

        // Staff Permission Check
        $this->middleware(['permission:add_new_product'])->only('create');
        $this->middleware(['permission:show_all_products'])->only('all_products');
        $this->middleware(['permission:show_in_house_products'])->only('admin_products');
        $this->middleware(['permission:show_seller_products'])->only('seller_products');
        $this->middleware(['permission:product_edit'])->only('admin_product_edit','seller_product_edit');
        $this->middleware(['permission:product_duplicate'])->only('duplicate');
        $this->middleware(['permission:product_delete'])->only('destroy');
    }

    public function getcarfrombrandId(Request $r){
        $data = Car::where('make',$r->id)->get();
        if($data != null){
            foreach($data as $i =>$v){
               echo "<option value='".$v->id."'>".$v->name."</option>";
            }
        }else{
            echo "<option value='kosong'>TESTET</option>";
        }
    }

    public function all_discount(){
        $data = Product::join('marginprice','products.id','marginprice.id_product')->orderby('denominations','ASC')->get();
        return view('backend.product.discount.index',compact('data'));
    }


    public function discountextra(Request $request){
        try {
            foreach ($request->types as $key => $type) {
                overWriteEnvFile($type, $request[$type]);
                //print $type;
            }
            Artisan::call('cache:clear');
            flash(translate('Extra Discount has been updated successfully'))->success();
            return back();
           } catch (\Throwable $th) {
            print $th->getmessage();
            // flash(translate('Slider has been updated successfully'))->success();
            // return redirect()->route('about.index');
           }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_products(Request $request)
    {
        //CoreComponentRepository::instantiateShopRepository();

        $type = 'In House';
        $col_name = null;
        $query = null;
        $sort_search = null;

        $products = Product::where('added_by', 'admin')->where('auction_product', 0)->where('wholesale_product', 0);

        if ($request->type != null) {
            $var = explode(",", $request->type);
            $col_name = $var[0];
            $query = $var[1];
            $products = $products->orderBy($col_name, $query);
            $sort_type = $request->type;
        }
        if ($request->search != null) {
            $sort_search = $request->search;
            $products = $products
                ->where('name', 'like', '%' . $sort_search . '%')
                ->orWhereHas('stocks', function ($q) use ($sort_search) {
                    $q->where('sku', 'like', '%' . $sort_search . '%');
                });
        }

        $products = $products->where('digital', 0)->orderBy('created_at', 'desc')->paginate(15);

        return view('backend.product.products.index', compact('products', 'type', 'col_name', 'query', 'sort_search'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function seller_products(Request $request)
    {
        $col_name = null;
        $query = null;
        $seller_id = null;
        $sort_search = null;
        $products = Product::where('added_by', 'seller')->where('auction_product', 0)->where('wholesale_product', 0);
        if ($request->has('user_id') && $request->user_id != null) {
            $products = $products->where('user_id', $request->user_id);
            $seller_id = $request->user_id;
        }
        if ($request->search != null) {
            $products = $products
                ->where('name', 'like', '%' . $request->search . '%');
            $sort_search = $request->search;
        }
        if ($request->type != null) {
            $var = explode(",", $request->type);
            $col_name = $var[0];
            $query = $var[1];
            $products = $products->orderBy($col_name, $query);
            $sort_type = $request->type;
        }

        $products = $products->where('digital', 0)->orderBy('created_at', 'desc')->paginate(15);
        $type = 'Seller';

        return view('backend.product.products.index', compact('products', 'type', 'col_name', 'query', 'seller_id', 'sort_search'));
    }

    public function all_products(Request $request)
    {
        $col_name = null;
        $query = null;
        $seller_id = null;
        $sort_search = null;
        $products = Product::orderBy('created_at', 'desc');
        if ($request->has('user_id') && $request->user_id != null) {
            $products = $products->where('user_id', $request->user_id);
            $seller_id = $request->user_id;
        }
        if ($request->search != null) {
            $sort_search = $request->search;
            $products = $products
                ->where('name', 'like', '%' . $sort_search . '%')
                ->orWhereHas('stocks', function ($q) use ($sort_search) {
                    $q->where('sku', 'like', '%' . $sort_search . '%');
                });
        }
        if ($request->type != null) {
            $var = explode(",", $request->type);
            $col_name = $var[0];
            $query = $var[1];
            $products = $products->orderBy($col_name, $query);
            $sort_type = $request->type;
        }

        $products = $products->paginate(15);
        $type = 'All';

        return view('backend.product.products.index', compact('products', 'type', 'col_name', 'query', 'seller_id', 'sort_search'));
    }


    public function pricefeed()
    {
        $data = Pricefeed::orderby('id','desc')->take(20);
        $last = Pricefeed::latest()->first();
        return view('backend.product.pricefeed.index',compact('data','last'));
    }

    public function pricefeedjson()
    {
        $data = Pricefeed::select('updateby','name','systemprice','overrideprice','created_at')->whereDate('created_at',date('Y-m-d'))->take(20)->orderby('id','desc')->get();
        header("Content-Type: application/json");
        echo json_encode($data);
    }

    public function pricefeedupdate(Request $r){
        $ip        = $_SERVER['REMOTE_ADDR'];
        $data =[
            'updateby'=>'AdminACE',
            'name'=>'Admin',
            'systemprice'=>$r->pricecurrent,
            'overrideprice'=>$r->override,
            'ip'=>$ip
        ];
        Pricefeed::insert($data);
            $datas = Product::all();
            foreach ($datas as $key => $v) {
                $margin = DB::table('marginprice')->where('denominations',$v->weight)->first();
                $formula = ($r->override+$margin->margin)*$v->weight;
                if($v->discount_start_date != null && $v->discount_end_date != null && $v->promo_price != null){
                    $discount  = ($r->override+$v->promo_price)*$v->weight;
                    $discount  = $formula-$discount;
                    $u = [
                        'unit_price'=>$formula,
                        'discount'=>$discount
                    ];
                    $act = Product::where('id',$v->id)->update($u);
                    $p = [
                        'price'=>$formula
                    ];
                    $act = DB::table('product_stocks')->where('product_id',$v->id)->update($p);
                }else{
                    $u = [
                        'unit_price'=>$formula
                    ];
                    $act = Product::where('id',$v->id)->update($u);
                    $p = [
                        'price'=>$formula
                    ];
                    $act = DB::table('product_stocks')->where('product_id',$v->id)->update($p);

                }

            }


    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //CoreComponentRepository::initializeCache();

        $categories = Category::where('parent_id', 0)
            ->where('digital', 0)
            ->with('childrenCategories')
            ->get();

        return view('backend.product.products.create', compact('categories'));
    }

    public function add_more_choice_option(Request $request)
    {
        $all_attribute_values = AttributeValue::with('attribute')->where('attribute_id', $request->attribute_id)->get();

        $html = '';

        foreach ($all_attribute_values as $row) {
            $html .= '<option value="' . $row->value . '">' . $row->value . '</option>';
        }

        echo json_encode($html);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        try {
            $publish = ($r->button == 'publish') ? 1:0;
                if (auth()->user()->user_type == 'seller') {
                    $user_id = auth()->user()->id;
                    if (get_setting('product_approve_by_admin') == 1) {
                        $approved = 0;
                    }
                } else {
                    $user_id = User::where('user_type', 'admin')->first()->id;
                }
            if($r->has('materialPrice') and $r->has('materialName')){
                $materialPrice = implode(',',$r->materialPrice);
                $materialName  = implode(',',$r->materialName);
                $data=[
                    'name'=>$r->name,
                    'added_by'=>$user_id,
                    'user_id'=>$user_id,
                    'category_id'=>$r->category_id,
                    'brand_id'=>$r->brand_id,
                    'car_id'=>$r->car_id,
                    'material_name'=>$materialName,
                    'material_price'=>$materialPrice,
                    'photos'=>$r->photos,
                    'thumbnail_img'=>$r->thumbnail_img,
                    'unit_price'=>$r->unit_price,
                    'colors'=>null,
                    'published'=>$publish,
                    'approved'=>1,
                    'slug'=>createSlug($r->name)
                ];
                try {
                    Product::insert($data);
                    flash(translate('Product added successfully'))->success();
                    return redirect()->route('products.admin');
                } catch (\Throwable $th) {
                    flash(translate($th->getMessage()))->warning();
                    return back();
                }
            }else{
                $data=[
                    'name'=>$r->name,
                    'added_by'=>$user_id,
                    'user_id'=>$user_id,
                    'category_id'=>$r->category_id,
                    'brand_id'=>$r->brand_id,
                    'car_id'=>$r->car_id,
                    'material_name'=>null,
                    'material_price'=>null,
                    'photos'=>$r->photos,
                    'thumbnail_img'=>$r->thumbnail_img,
                    'unit_price'=>$r->unit_price,
                    'colors'=>null,
                    'published'=>$publish,
                    'approved'=>1,
                    'slug'=>createSlug($r->name)
                ];
                try {
                    Product::insert($data);
                    flash(translate('Product added successfully'))->success();
                    return redirect()->route('products.admin');
                } catch (\Throwable $th) {
                    flash(translate($th->getMessage()))->warning();
                    return back();
                }
            }



        } catch (\Throwable $th) {
            print $th->getMessage();
        }

        //return redirect()->route('products.admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function admin_product_edit(Request $request, $id)
    {
        //CoreComponentRepository::initializeCache();

        $product = Product::findOrFail($id);
        if ($product->digital == 1) {
            return redirect('admin/digitalproducts/' . $id . '/edit');
        }

        $lang = $request->lang;
        $tags = json_decode($product->tags);
        $categories = Category::where('parent_id', 0)
            ->where('digital', 0)
            ->with('childrenCategories')
            ->get();
        return view('backend.product.products.edit', compact('product', 'categories', 'tags', 'lang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function seller_product_edit(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        if ($product->digital == 1) {
            return redirect('digitalproducts/' . $id . '/edit');
        }
        $lang = $request->lang;
        $tags = json_decode($product->tags);
        // $categories = Category::all();
        $categories = Category::where('parent_id', 0)
            ->where('digital', 0)
            ->with('childrenCategories')
            ->get();

        return view('backend.product.products.edit', compact('product', 'categories', 'tags', 'lang'));
    }

    public function seller_product_edit_discount(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        if ($product->digital == 1) {
            return redirect('digitalproducts/' . $id . '/edit');
        }
        $lang = $request->lang;
        $tags = json_decode($product->tags);
        // $categories = Category::all();
        $categories = Category::where('parent_id', 0)
            ->where('digital', 0)
            ->with('childrenCategories')
            ->get();

        return view('backend.product.discount.edit', compact('product', 'categories', 'tags', 'lang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, Product $product)
    {
        try {
            $publish = ($r->button == 'publish') ? 1:0;
            if (auth()->user()->user_type == 'seller') {
                $user_id = auth()->user()->id;
                if (get_setting('product_approve_by_admin') == 1) {
                    $approved = 0;
                }
            } else {
                $user_id = User::where('user_type', 'admin')->first()->id;
            }
        if($r->has('materialPrice') and $r->has('materialName')){
            $materialPrice = implode(',',$r->materialPrice);
            $materialName  = implode(',',$r->materialName);
            $data=[
                'name'=>$r->name,
                'added_by'=>$user_id,
                'user_id'=>$user_id,
                'category_id'=>$r->category_id,
                'brand_id'=>$r->brand_id,
                'car_id'=>$r->car_id,
                'material_name'=>$materialName,
                'material_price'=>$materialPrice,
                'photos'=>$r->photos,
                'thumbnail_img'=>$r->thumbnail_img,
                'unit_price'=>$r->unit_price,
                'colors'=>null,
                'published'=>$publish,
                'approved'=>1,
                'num_of_sale'=>0,
                'slug'=>createSlug($r->name)
            ];
            try {
                Product::where('id',$product->id)->update($data);
                flash(translate('Product added successfully'))->success();
                return back();
            } catch (\Throwable $th) {
                flash(translate($th->getMessage()))->warning();
                return back();
            }
        }else{
            $data=[
                'name'=>$r->name,
                'added_by'=>$user_id,
                'user_id'=>$user_id,
                'category_id'=>$r->category_id,
                'brand_id'=>$r->brand_id,
                'car_id'=>$r->car_id,
                'material_name'=>null,
                'material_price'=>null,
                'photos'=>$r->photos,
                'thumbnail_img'=>$r->thumbnail_img,
                'unit_price'=>$r->unit_price,
                'colors'=>null,
                'published'=>$publish,
                'approved'=>1,
                'num_of_sale'=>0,
                'slug'=>createSlug($r->name)
            ];
            try {
                Product::where('id',$product->id)->update($data);
                flash(translate('Product added successfully'))->success();
                return back();
            } catch (\Throwable $th) {
                flash(translate($th->getMessage()))->warning();
                return back();
            }
        }



    } catch (\Throwable $th) {
        print $th->getMessage();
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->product_translations()->delete();
        $product->stocks()->delete();
        $product->taxes()->delete();

        if (Product::destroy($id)) {
            Cart::where('product_id', $id)->delete();

            flash(translate('Product has been deleted successfully'))->success();

            Artisan::call('view:clear');
            Artisan::call('cache:clear');

            return back();
        } else {
            flash(translate('Something went wrong'))->error();
            return back();
        }
    }

    public function bulk_product_delete(Request $request)
    {
        if ($request->id) {
            foreach ($request->id as $product_id) {
                $this->destroy($product_id);
            }
        }

        return 1;
    }

    /**
     * Duplicates the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function duplicate(Request $request, $id)
    {
        $product = Product::find($id);

        $product_new = $product->replicate();
        $product_new->slug = $product_new->slug . '-' . Str::random(5);
        $product_new->save();

        //Product Stock
        $this->productStockService->product_duplicate_store($product->stocks, $product_new);

        //VAT & Tax
        $this->productTaxService->product_duplicate_store($product->taxes, $product_new);

        flash(translate('Product has been duplicated successfully'))->success();
        if ($request->type == 'In House')
            return redirect()->route('products.admin');
        elseif ($request->type == 'Seller')
            return redirect()->route('products.seller');
        elseif ($request->type == 'All')
            return redirect()->route('products.all');
    }

    public function get_products_by_brand(Request $request)
    {
        $products = Product::where('brand_id', $request->brand_id)->get();
        return view('partials.product_select', compact('products'));
    }

    public function updateTodaysDeal(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->todays_deal = $request->status;
        $product->save();
        Cache::forget('todays_deal_products');
        return 1;
    }

    public function updatePublished(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->published = $request->status;

        if ($product->added_by == 'seller' && addon_is_activated('seller_subscription') && $request->status == 1) {
            $shop = $product->user->shop;
            if (
                $shop->package_invalid_at == null
                || Carbon::now()->diffInDays(Carbon::parse($shop->package_invalid_at), false) < 0
                || $shop->product_upload_limit <= $shop->user->products()->where('published', 1)->count()
            ) {
                return 0;
            }
        }

        $product->save();

        Artisan::call('view:clear');
        Artisan::call('cache:clear');
        return 1;
    }

    public function updateProductApproval(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->approved = $request->approved;

        if ($product->added_by == 'seller' && addon_is_activated('seller_subscription')) {
            $shop = $product->user->shop;
            if (
                $shop->package_invalid_at == null
                || Carbon::now()->diffInDays(Carbon::parse($shop->package_invalid_at), false) < 0
                || $shop->product_upload_limit <= $shop->user->products()->where('published', 1)->count()
            ) {
                return 0;
            }
        }

        $product->save();

        Artisan::call('view:clear');
        Artisan::call('cache:clear');
        return 1;
    }

    public function updateFeatured(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->featured = $request->status;
        if ($product->save()) {
            Artisan::call('view:clear');
            Artisan::call('cache:clear');
            return 1;
        }
        return 0;
    }

    public function sku_combination(Request $request)
    {
        $options = array();
        if ($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0) {
            $colors_active = 1;
            array_push($options, $request->colors);
        } else {
            $colors_active = 0;
        }

        $unit_price = $request->unit_price;
        $product_name = $request->name;

        if ($request->has('choice_no')) {
            foreach ($request->choice_no as $key => $no) {
                $name = 'choice_options_' . $no;
                $data = array();
                // foreach (json_decode($request[$name][0]) as $key => $item) {
                foreach ($request[$name] as $key => $item) {
                    // array_push($data, $item->value);
                    array_push($data, $item);
                }
                array_push($options, $data);
            }
        }

        $combinations = Combinations::makeCombinations($options);
        return view('backend.product.products.sku_combinations', compact('combinations', 'unit_price', 'colors_active', 'product_name'));
    }

    public function sku_combination_edit(Request $request)
    {
        $product = Product::findOrFail($request->id);

        $options = array();
        if ($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0) {
            $colors_active = 1;
            array_push($options, $request->colors);
        } else {
            $colors_active = 0;
        }

        $product_name = $request->name;
        $unit_price = $request->unit_price;

        if ($request->has('choice_no')) {
            foreach ($request->choice_no as $key => $no) {
                $name = 'choice_options_' . $no;
                $data = array();
                // foreach (json_decode($request[$name][0]) as $key => $item) {
                foreach ($request[$name] as $key => $item) {
                    // array_push($data, $item->value);
                    array_push($data, $item);
                }
                array_push($options, $data);
            }
        }

        $combinations = Combinations::makeCombinations($options);
        return view('backend.product.products.sku_combinations_edit', compact('combinations', 'unit_price', 'colors_active', 'product_name', 'product'));
    }
}
