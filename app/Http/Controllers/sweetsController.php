<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sweets;
class sweetsController extends Controller
{
    //
    public function create(){
        return view('sweetform');
    }
    public function store(Request $request){
        //dump($request->all());
        //echo('This is end');
        try{
        $data=array(
            'name'=>$request->name,
            'color'=>$request->color,
            'is_prefferable'=>$request->is_prefferable
        );
        Sweets::create($data);
        dd('Sweet is stored');
    }catch(\Throwable $e){
        dd($e->getMessage());
    }
    }
public function index(){
    $sweet=Sweets::all();
    return view('sweetView',compact('sweet'));
}
public function edit($id){
    //$sweet =Sweets::where;
    $sweet=Sweets::find($id);
    //dd($sweet);
    return view('sweetFormEdit',compact('sweet'));
}
public function update(Request $request,$id){
    //$sweet =Sweets::where;
    $sweet=Sweets::find($id);
    $array=[
        'name'=>$request->name,
            'color'=>$request->color,
            'is_prefferable'=>$request->is_prefferable
    ];
    dump($array);
    $value=Sweets::where('id',$id)->update($array);
    //dd($value);
    //return redirect()->back();
    return redirect('/new-sweet');
    //dump($value);
    //dd($sweet);
    //return view(sweetFormEdit,compact)
}
public function destroy($id){
    //$sweet =Sweets::where;
    Sweets::where('id',$id)->delete();
    dd('Deletion successful');
    return redirect();
}
public function show($id){
    //$sweet =Sweets::where;
    $sweet=Sweets::find($id);
    //dd($sweet);
    return view('sweetShow',compact('sweet'));
}}