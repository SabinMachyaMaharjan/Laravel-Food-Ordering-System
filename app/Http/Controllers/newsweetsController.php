<?php

namespace App\Http\Controllers;
use App\Models\Sweets;
use Illuminate\Http\Request;
class newsweetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sweet=Sweets::all();
        return view('sweetView',compact('sweet'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('sweetForm');
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
                //dump($request->all());
        //echo('This is end');
        //try{
            $data=array(
                'name'=>$request->name,
                'color'=>$request->color,
                'is_prefferable'=>$request->is_prefferable
            );
            Sweets::create($data);
            dd('Sweet is stored');
        //}catch(\Throwable $e){
        //    dd($e->getMessage());
        //}
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
          //$sweet =Sweets::where;
        $sweet=Sweets::find($id);
        //dd($sweet);
        return view('sweetShow',compact('sweet'));
    
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
            //$sweet =Sweets::where;
    $sweet=Sweets::find($id);
    //dd($sweet);
    return view('sweetFormEdit',compact('sweet'));
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
        //dump($request->all());
        //dd($id);
        //$sweet =Sweets::where;
    //$sweet=Sweets::find($id);
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        //$sweet =Sweets::where;
    Sweets::where('id',$id)->delete();
    dump('Deletion successful');
    return redirect()->back();
    }
}
