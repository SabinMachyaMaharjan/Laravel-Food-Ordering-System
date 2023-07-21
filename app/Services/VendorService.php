<?php
namespace App\Services;
use App\Models\User;
use App\Models\Vendor;

class VendorService
{
    public function findOneById($id)
    {
        return Vendor::findAll($id);
    }
    public function findAll($limit=null,$offset=null,$conditions=[])
    {
        $vendors=Vendor::query();
        if(count($conditions)>0) {
            foreach($conditions as $key => $value){
                $vendors=$vendors->where($key,$value);
            }
        }
        if(!empty($limit)) {
            //dump($limit);
            $vendors=$vendors->take($limit);
        }
        if(!empty($offset)) {
            $vendors=$vendors->skip($offset);
        }
        return $vendors->get();
    }
    public function findAllPendingVendors()
    {
        return User::doesntHave('vendor')->where('is_vendor', 1)->orderBy('created_at','DESC')->get();
    }
    public function findAllApprovedVendors()
    {
        return User::has('vendor')->where('is_vendor', 1)->orderBy('created_at','DESC')->get();
    }
    public function approveVendor($id)
    {
        try{
            $user=User::find($id);
            $data=[
                'brand_name'=>$user->username,
                'service'=>'na',
                'logo'=>'na',
                'image_cover'=>'na',
                'user_id'=>$id,
                'is_active'=>1
            ];
            Vendor::create($data);
            $user->role_id=2;
            $user->save();
            //User::where('id',$id)->update(['role_id'=>2]);
            return ['status'=>'success','message'=>'Vendor is approved'];
        } catch(\Throwable $e) {
            return ['status'=>'error','message'=>$e->getMessage()];
        }
    }
    public function rejectVendor($id)
    {
        try{
            User::where('id',$id)->update(['is_vendor'=>0]);
            //send email to user
            return ['status'=>'success','message'=>'Vendor is rejected'];
        } catch(\Throwable $e) {
            return ['status'=>'error','message'=>$e->getMessage()];
        }
    }
    public function searchVendor ($inputs)
    { 
        //  $restaurants =User::with(['vendor', 'products']); 
        //  $restaurants = $restaurants->whereHas('vendor', function($query) use ($inputs) { 
        //           $query->where('vendor.brand_name', 'LIKE', '%'.$inputs ['search'].'%') 
        //                     ->orwhere('vendor.service', 'LIKE', '%'.$inputs ['search'].'%');
        //  })
        //  ->orWhereHas('products', function ($query) use ($inputs) { 
        //                              $query->where('products.name', 'LIKE', '%'.$inputs ['search'].'%') 
        //                                                 ->where('products.status', 'Available');
        //  })
             // ->selectRaw() 
//              ->join('vendors', 'users.id', 'vendors.user_id')
// ->selectRaw('vendors.*')
//              ->orderBy('created_at', 'DESC')
//      ->get();
     $restaurants =Vendor::with(['user.products:name,status'])
     ->where (function ($query) use ($inputs) { 
        $query->where('brand_name', 'LIKE', '%'.$inputs['search'].'%')
                           ->orWhere('service', 'LIKE', '%'.$inputs['search'].'%');
})
->orWhereHas('user.products',function ($query) use ($inputs) { 
$query->where('name', 'LIKE', '%'.$inputs['search'].'%')
 ->orWhere('status','Available');
})
->orderBy('created_at','DESC' )
->get();
// we are just getting vendor columns, products 
// join
// $vendor =Vendor::query();
// $vendor->join('users', 'users.id', 'vendors.user_id') 
//       ->join('products', 'products.user_id", "users.id') 
//       ->selectRaw('vendors.brand name', 'products.name', 'users.username')
//     ->get();
    //  dd($restaurants);
    return $restaurants;
    // lazy loading 
// $user->vendor>brand_name 
//select> select specific columns 
// selectRau -> handles raw sal query
// select sum ('total') from products;
        }
}
