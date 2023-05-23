<?php
namespace App\Services;
use App\Models\Size;
class SizeService
{
    public function findAll()
    {
        return Size::all();
    }
    public function findById($id)
    {
        return Size::find($id);//pk
    }
    public function addSize($request)
    {
        
        $size=[
            'name'=>$request['name'],
        ];
        Size::create($size);
        //dd('done');
        return ['status'=>'success','message'=>'Product Size is stored.'];
    }
    public function updateSize($request,$id)
    {   try{
        $size=[
            'name'=>$request->name
            //'Size_image'=>$FileToStore
        ];
       
        Size::where('id',$id)->update($size);
        $res= ['status'=>'success','message'=>'Product Size is updated.'];
        }catch(\Throwable $e){
            $res = ['status'=>'error','message'=>$e->getMessage()];
        }
        return $res;
    }
    public function deleteRecordById($id)
    {
        try{
            Size::where('id',$id)->delete();
            $res= ['status'=>'success','message'=>'Product Size is deleted.'];
        }
        catch(\Throwable $e)
        {
            $res = ['status'=>'error','message'=>$e->getMessage()];
        }
        return $res;
    }
}