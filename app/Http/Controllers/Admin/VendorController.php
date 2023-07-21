<?php

namespace App\Http\Controllers\Admin;
use App\Models\Vendor;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Services\VendorService;

class VendorController extends Controller
{
    //
    private $vendorService;
    public function __construct(VendorService $service)
    {
        $this->vendorService=$service;
    }
    public function pendingVendorIndex()
    {
        try{
            $users= $this->vendorService->findAllPendingVendors();
            return view('pages.admin.vendors.pendingVendors.index',compact('users'));
        } catch(\Throwable $e) {
            Alert::toast($e->getMessage(), 'error');
            return redirect('/admin/pending-vendors');//->with( $response['status'],$response['message']);
        }
    }
    public function approvedVendorIndex()
    {
        try{
            $users= $this->vendorService->findAllApprovedVendors();
            return view('pages.admin.vendors.approvedVendors.index',compact('users'));
        } catch(\Throwable $e) {
            Alert::toast($e->getMessage(), 'error');
            return redirect('/admin/approved-vendors');//->with( $response['status'],$response['message']);
        }
    }
    public function approveVendor($id)
    {
        $response=$this->vendorService->approveVendor($id);
        Alert::toast($response['message'], $response['status']);
        return redirect('/admin/pending-vendors');
        try{
            $users = User::find($id);
            $data=[
                'brand_name'=>$users->username,
                'service'=>'na',
                'logo'=>'na',
                'image_cover'=>'na',
                'user_id'=>$id,
                'is_active'=>1,
            ];
            Vendor::create($data);
            return ['status'=>'success','message'=>'Vendor is approved'];
        } catch(\Throwable $e){

        }
    }
    public function rejectVendor($id)
    {
        $response=$this->vendorService->rejectVendor($id);
        Alert::toast($response['message'], $response['status']);
        return redirect('/admin/pending-vendors');
    } 
       
    public function deleteapprovedvendor($id){
        $response = $this->vendorService->deleteApprovedVendor($id);
        Alert::toast($response["message"],$response["status"]);
        return redirect(route('approvedvendors.index'));
    }

    public function checkstatusvendor($id)
    {
        $response = $this->vendorService->checkstatusvendor($id);
        Alert::toast($response["message"],$response["status"]);
        return redirect(route('approvedvendors.index'));
    }
}
