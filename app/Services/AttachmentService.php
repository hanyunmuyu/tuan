<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/16
 * Time: 10:41
 */

namespace App\Services;


use App\Models\AttachmentModel;
use Illuminate\Http\Request;

class AttachmentService
{

    /**上传附件
     * @param Request $request
     * @return array
     */
    public function addAttachment(Request $request, $key = 'file', $single = true): array
    {
        $filePath = [];
        if ($single && $request->hasFile($key)) {
            $attachment = $request->file($key);
            $name = $attachment->getClientOriginalName();//得到图片名；
            $ext = $attachment->getClientOriginalExtension();//得到图片后缀；
            $destinationPath = '/uploads/' . date('Y-m-d'); // public文件夹下面uploads/xxxx-xx-xx 建文件夹
            $extension = $attachment->getClientOriginalExtension();   // 上传文件后缀
            $fileName = date('YmdHis') . mt_rand(100, 999) . '.' . $extension; // 重命名
            $attachment->move(public_path() . $destinationPath, $fileName); // 保存图片

            $data = [];
            $data['origin_name'] = $name;
            $data['attachment_path'] = $destinationPath . '/' . $fileName;
            $res = $this->saveAttachment2Db($data);

            $map = [];
            $map['origin_name'] = $name;
            $map['id'] = $res->id;
            $map['attachment_path'] = $destinationPath . '/' . $fileName;
            $filePath[] = $map;
        } else {
            $attachments = $request->allFiles();
            foreach ($attachments[$key] as $attachment) {
                $name = $attachment->getClientOriginalName();//得到图片名；
                $ext = $attachment->getClientOriginalExtension();//得到图片后缀；
                $destinationPath = '/uploads/' . date('Y-m-d'); // public文件夹下面uploads/xxxx-xx-xx 建文件夹
                $extension = $attachment->getClientOriginalExtension();   // 上传文件后缀
                $fileName = date('YmdHis') . mt_rand(100, 999) . '.' . $extension; // 重命名
                $attachment->move(public_path() . $destinationPath, $fileName); // 保存图片

                $data = [];
                $data['origin_name'] = $name;
                $data['attachment_path'] = $destinationPath . '/' . $fileName;
                $res = $this->saveAttachment2Db($data);

                $map = [];
                $map['origin_name'] = $name;
                $map['id'] = $res->id;
                $map['attachment_path'] = $destinationPath . '/' . $fileName;
                $filePath[] = $map;
            }

        }
        return $filePath;
    }

    /**
     * 返回字符串
     * @param Request $request
     * @param string $key
     * @return string
     * @author 牛永光 <nyg199111@126.com>
     * @date 2018/11/13 9:24
     */
    public function addAttachments(Request $request, $key = ''): string
    {
        $filePath = [];
        if ($request->hasFile($key ?: 'file')) {
            $attachments = $request->file($key ?: 'file');
            $array = [];
            if (is_object($attachments)) {
                $array[] = $attachments;
            } else {
                $array = $attachments;
            }
            foreach ($array as $attachment) {
                $name = $attachment->getClientOriginalName();//得到图片名；
                $ext = $attachment->getClientOriginalExtension();//得到图片后缀；
                $fileName = md5(uniqid($name));
                $destinationPath = '/uploads/' . date('Y-m-d'); // public文件夹下面uploads/xxxx-xx-xx 建文件夹
                $extension = $attachment->getClientOriginalExtension();   // 上传文件后缀
                $fileName = date('YmdHis') . mt_rand(100, 999) . '.' . $extension; // 重命名
                $attachment->move(public_path() . $destinationPath, $fileName); // 保存图片

                $data = [];
                $data['origin_name'] = $name;
                $data['attachment_path'] = $destinationPath . '/' . $fileName;
                $res = $this->saveAttachment2Db($data);
                $filePath[] = $res->id;
            }
        }
        return join(',', $filePath);
    }

    private function saveAttachment2Db($data)
    {
        return AttachmentModel::create($data);
    }

    /**
     * 通过附件id获得附件地址
     * @param $attachmentId
     * @return string
     */
    public function getAttachmentById($attachmentId)
    {
        return AttachmentModel::where('id', $attachmentId)->first();
    }

    /**根据附件id下载附件
     * @param $attachmentId
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function downloadAttachment($attachmentId)
    {
        $attachment = AttachmentModel::where('id', $attachmentId)->first();
        return response()
            ->download(realpath(public_path() . $attachment->attachment_path), $attachment->origin_name);
    }

    /**
     * 通过ids来获取附件列表
     * @param string $attachment
     * @return mixed
     * @author 牛永光 <nyg199111@126.com>
     * @date 2018/11/12 9:03
     */
    static public function getAttachmentByIds(string $attachment)
    {
        return AttachmentModel::whereRaw("find_in_set(id,'{$attachment}')")->get();
    }
}
