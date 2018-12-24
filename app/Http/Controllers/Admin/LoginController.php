<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    //
    public function login(Request $request)
    {
        $admin = Admin::where('name', $request->get('username'))->first();
        if (!$admin) {
            return $this->error();
        }
        try {
            if (decrypt($admin->password) == $request->get('password')) {
                auth('admin')->login($admin);
                $token = encrypt('123456');
                $admin->api_token = $token;
                $admin->save();
                $admin->token = $token;
                $admin->avatar = config('app.url') . $admin->avatar;
                return $this->success($admin->toArray());
            }else{
                return $this->error();
            }
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage());
        }
    }
}
