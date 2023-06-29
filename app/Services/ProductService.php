<?php
namespace App\Services;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
class ProductService
{
    public function findAll()
    {
        return Product::all();
    }
    public function findByProductId($id)
    {
    return Product::find($id);
    }
    public function findAllProductsByUserId($userid)
    {
        return Product::where('user_id',$userid)->get();
    }
    public function addProduct($request)
    {
        //Log::useDailyFiles(storage_path().'/logs/productErrorNew.log');
        try {
            $product=[
                'name'=>$request['name'],
                'price'=>$request['price'],
                'status'=>isset($request['status'])?1:0,
                'size_id'=>$request['size_id'],
                'user_id'=>Auth::user()->id
            ];
            Product::create($product);
            //dd('done');
            return ['status'=>'success','message'=>'Product is stored successfully.'];
        } catch (\Throwable $e) {
            Log::channel('product_error')->error($e->getMessage());
            //Log::error($e->getMessage());
            return ['status'=>'error','message'=>$e->getMessage()];
        }
        
    }
   
    public function updateProduct($request,$userid)
    {   
        try{
        $product=[
                'name'=>$request['name'],
                'price'=>$request['price'],
                'status'=>isset($request['status'])?1:0,
                'size_id'=>$request['size_id'],
                'user_id'=>Auth::user()->id
        ];
        product::where('user_id',$userid)->update($product);
        $res= ['status'=>'success','message'=>'product is updated.'];
        }catch(\Throwable $e){
            $res = ['status'=>'error','message'=>$e->getMessage()];
        }
        return $res;
    }
    public function deleteRecordById($userid)
    {
        try{
            $product=$this->findAllProductsByUserId($userid);
            product::where('user_id',$userid)->delete();
            $res= ['status'=>'success','message'=>'product is deleted.'];
        }
        catch(\Throwable $e)
        {
            $res = ['status'=>'error','message'=>$e->getMessage()];
        }
        return $res;
    }

    public function findProductByUserId($userid)
    {
        try{
            $products = Product::where('user_id',$userid)->get();
            return['status'=>'success','message'=>'Product is fetched successfully.','products'=>$products->getMessage()];
        } catch (\Throwable $e) {
            Log::channel('product_error')->error($e->getMessage());
            //Log::error($e->getMessage());
            return ['status'=>'error','message'=>$e->getMessage(),'products'=>[]];   
        }
    }
}  
