<?php

namespace App\Http\Controllers\Api\v1;

use App\Repositories\v1\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    //
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register(Request $request)
    {
        $mobile = $request->get('mobile');
        $password = $request->get('password');
        if (!$mobile) {
            return $this->error('手机号不可以为空');
        }
        if (!$password) {
            return $this->error('密码不可以为空');
        }
        $user = $this->userRepository->getUserByMobile($mobile);
        if ($user) {
            return $this->error('手机号已经被注册');
        }
        $data['mobile'] = $mobile;
        $data['password'] = encrypt($password);
        $this->userRepository->createUser($data);
        return $this->success();
    }
}
