<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    //用户列表页
    public function getIndex(Request $request)
    {
        $data = DB::table('users')->where(function($query) use($request) {
            $query->where('nickname','like','%'.$request->input('keys_name').'%');
        })->paginate($request->input('show_n',10));

        if($request->input('b')){
            return $data;
        }else{
            return view('admin.user.index',['user'=>$data]);
        }
    }

    /**
     * 后台用户添加页
     */
    public function getAdd()
    {
        return view('admin.user.add');
    }

    /**
     * 用户添加操作
     */
    public function postInsert(UserRequest $request)
    {
        $data = $request->except(['_token','repassword']);

        $data['password'] = Hash::make($data['password']);

        $res = DB::table('users')->insert($data);

        if($res){
            return redirect('/admin/user')->with('success','添加用户成功');
        }else{
            return back()->with('error','添加失败请稍后重试');
        }
    }

    /**
     * 更新显示
     */
    public function getEdit($id)
    {
        $data = DB::table('users')->where('id',$id)->first();
        return view('admin.user.edit',['user'=>$data]);
    }

    /**
     * 更新操作
     */
    public function postUpdate(Request $request)
    {
        // dd($request->all());
        $data = $request->except(['_token','id']);
        $res = DB::table('users')->where('id',$request->input('id'))->update($data);
        if($res){
            return redirect('/admin/user/index')->with('success','成功修改了ID为'.$request->input('id').'的用户');
        }else{
            return back()->with('error','没有做任何更改');
        }
    }

    /**
     * 删除用户操作
     */
    public function getDelete($id)
    {  
        // dd($id);
        $res = DB::table('users')->where('id',$id)->delete();
        if($res)
        {
            return back()->with('success','删除成功');
        }else{
            return back()->with('error','删除失败请稍后再试');
        }
    }

}
