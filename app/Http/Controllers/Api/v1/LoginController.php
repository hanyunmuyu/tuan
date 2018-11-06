<?php

namespace App\Http\Controllers\Api\v1;

use App\Repositories\v1\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login(Request $request)
    {
        $mobile = $request->get('mobile');
        $password = $request->get('password');
        if (!$mobile) {
            return $this->error('手机号不可为空');
        }
        if (!$password) {
            return $this->error('密码不可为空');
        }
        $user = $this->userRepository->findUserByMobile($mobile);
        if (!$user) {
            return $this->error('用户不存在！');
        }
        try {
            if (decrypt($user->password) != $password) {
                return $this->error('密码错误');
            }
        } catch (\Exception $exception) {
            return $this->error('密码错误');
        }
        $token = md5(str_random());
        $user->api_token = $token;
        $user->save();
        return $this->success($user->toArray());
    }
}
