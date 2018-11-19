<?php

namespace App\Http\Controllers\Api\v1;

use App\Repositories\v1\SchoolRepository;
use App\Repositories\v1\UserRepository;
use App\Services\DistrictService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    private $userRepository;
    private $districtService;
    private $schoolRepository;

    public function __construct(UserRepository $userRepository, DistrictService $districtService, SchoolRepository $schoolRepository)
    {
        $this->userRepository = $userRepository;
        $this->districtService = $districtService;
        $this->schoolRepository = $schoolRepository;
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
        $province = $this->districtService->getDistrictById($user->province);
        $city = $this->districtService->getDistrictById($user->city);
        $area = $this->districtService->getDistrictById($user->area);
        $school = $this->schoolRepository->getSchoolById($user->school_id);


        $token = md5(str_random());
        $user->api_token = $token;
        $user->save();
        $user->avatar = config('app.url') . $user->avatar;
        $user->bg = config('app.url') . $user->bg;
        $user->province = $province ? $province : new \stdClass();
        $user->city = $city ? $city : new \stdClass();
        $user->area = $area ? $area : new \stdClass();
        $user->school = $school ? $school : new \stdClass();
        return $this->success($user->toArray());
    }
}
