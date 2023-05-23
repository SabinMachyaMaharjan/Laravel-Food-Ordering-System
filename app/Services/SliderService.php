<?php
namespace App\Services;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;
class SliderService
{
    public function findAll()
    {
        return Slider::all();
    }
    public function findById($id)
    {
        return Slider::find($id);//pk
    }
    public function addSlider($request)
    {
        //dd($request->all());
        
        if($request->hasFile('slider_image')){
            //$filename=$request['slider_image'];
                $FilenameWithExtension = $request['slider_image']->getClientOriginalName();
                $Filename = pathinfo($FilenameWithExtension,PATHINFO_FILENAME);
                $Extension = $request['slider_image']->getClientOriginalExtension();
                $FileToStore = $Filename.'_'.time().'.'.$Extension;
                $path = $request['slider_image']->storeAs('/public/slider',$FileToStore);
        }
        else{
            $FileToStore= 'no_image.jpg';
        }
        $slider=[
            'slider_text'=>$request['slider_text'],
            'slider_image'=>$FileToStore
        ];
        Slider::create($slider);
        //dd('done');
        return ['status'=>'success','message'=>'Slider is stored.'];
    }
    public function updateSlider($request,$id)
    {   try{
        $slider=[
            'slider_text'=>$request->slider_text
            //'slider_image'=>$FileToStore
        ];
        if($request->hasFile('slider_image')){
            //$filename=$request['slider_image'];
                $FilenameWithExtension = $request['slider_image']->getClientOriginalName();
                $Filename = pathinfo($FilenameWithExtension,PATHINFO_FILENAME);
                $Extension = $request['slider_image']->getClientOriginalExtension();
                $FileToStore = $Filename.'_'.time().'.'.$Extension;
                $path = $request['slider_image']->storeAs('/public/slider',$FileToStore);
                $slider['slider_image'] =$FileToStore;
        }
        Slider::where('id',$id)->update($slider);
        $res= ['status'=>'success','message'=>'Slider is updated.'];
        }catch(\Throwable $e){
            $res = ['status'=>'error','message'=>$e->getMessage()];
        }
        return $res;
    }
    public function deleteRecordById($id)
    {
        try{
            $slider=$this->findById($id);
            Storage::delete('/public/slider/'.$slider->slider_image);
            Slider::where('id',$id)->delete();
            $res= ['status'=>'success','message'=>'Slider is deleted.'];
        }
        catch(\Throwable $e)
        {
            $res = ['status'=>'error','message'=>$e->getMessage()];
        }
        return $res;
    }
}