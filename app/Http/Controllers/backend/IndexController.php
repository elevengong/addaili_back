<?php

namespace App\Http\Controllers\backend;

use App\Model\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\MyController;
use App\Http\Requests;
use Crypt;

class IndexController extends MyController
{
    public function index(Request $request){

        return view('backend.layout.main')->with('admin',session('admin'));
    }

    //注销用户
    public function logout(Request $request){
        $this->deleteAllSession($request);
        $data['status'] = 1;
        $data['msg'] = "注销成功";
        echo json_encode($data);
    }

    //改当前管理员密码
    public function changepwd(Request $request){
        if($request->isMethod('post')){
            $newpwd = request()->input('newpwd');
            $newPassword= Crypt::encrypt($newpwd);

            $result = Admin::where('admin_id',session('admin_id'))->update(['pwd'=>$newPassword]);

            if($result)
            {
                $data['status'] = 1;
                $data['msg'] = "修改成功";
            }else{
                $data['status'] = 0;
                $data['msg'] = "修改失败";
            }
            echo json_encode($data);

        }



    }

}
