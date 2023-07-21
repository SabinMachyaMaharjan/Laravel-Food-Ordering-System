<?php
namespace App\Services;

use App\Models\UserDetail;
class UserDetailService
{
public function findUserById($id) 
{
  return UserDetail::find($id);
}
public function updateUserDetail($request, $id)
{
         try {
           $data = [
                             "address">$request->address, 
                             "phone">$request->phone,
           ];
             UserDetail::where("id", $id)->update($data); 
             $response= [
                   "status" >"success",
           "message"=>"Your Detail Updated Successfully!",
             ];
            } catch(\Throwable $e) {
                $response=[
    "status "=>"error",
    "message"=>$e->getMessage()
                ];
            }
            return $response;
        }
      }