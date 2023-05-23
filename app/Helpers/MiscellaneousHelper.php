<?php
use App\Models\User;
//This is autoload file
function getVendorApprovalStatus($id)
{
    //dd($id);
    $vendor=User::doesntHave('vendor')->where('is_vendor',1)->where('id',$id)->first();
    //dd($approvedVendor);
    if(!empty($vendor)){
        $is_approved= false;
    } else {
        $is_approved= true;
    }
    return $is_approved;
}
//1. User has data but vendor doesnot has (which is approved)
//2. $vendor = current data ($vendor is not empty) thus it has to not approved
//3. hence $is_approved is false