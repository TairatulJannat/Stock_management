<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $products = Product::all();
        $stocks = Stock::all();
        $categories = Category::all();
        return view('admin.stock.view_stock', ['stocks' => $stocks, 'categories' => $categories]);
        
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('admin.stock.add_stock',['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request);
        $array_size = count($request['category_id']);
        for($i=0;$i<$array_size;$i++){
         $p_id= $request['product_id'][$i];
         $p_exist= Stock::where('product_id',$p_id)->first();
         if($p_exist != null){
             $p_exist['quantity'] = $p_exist['quantity']+$request['quantity'][$i];
             $p_exist->update();
         }
         else{
           $inputs['category_id'] = $request['category_id'][$i];
           $inputs['product_id'] = $request['product_id'][$i];
           $inputs['quantity'] = $request['quantity'][$i];
           $stock = new Stock($inputs);
           $stock->save();

         }
 

        }
        return redirect()->route('stock.index');
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
    public function edit($id)
    {
        //
        $stock = Stock::find($id);
        $categories = Category::all();
        return view('admin.stock.edit_stock',['stock'=>$stock,'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $stock = Stock::find($id);
        $stock['quantity'] = $request['quantity'];
        $stock->update();
        return redirect()->route('stock.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $stock = Stock::find($id);
        $stock->delete();
        return redirect()->back();
    }
    public function cat_product(Request $request){
    if($request->has('q')){
     $q = $request->q;
     $products = Product::where('category_id',$q)->get();
     return response()->json(['products'=>$products]);

    }
  }
    public function previous_product(Request $request){
        if($request->has('p')){
         $p = $request->p;
         $stock = Stock::where('product_id',$p)->first();
         return response()->json(['stock'=>$stock]);
    
        }

    }
}
