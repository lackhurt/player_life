<?php
/**
 * Created by PhpStorm.
 * User: lackhurt
 * Date: 15/5/17
 * Time: 下午2:14
 */

namespace App\lib\Uploader;


use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Scalar\MagicConst\File;

class UploaderProcessor
{
    const TOKEN_PREFIX = 'UPLOAD_TOKEN_';
    const FILE_UNION_ORIGINAL_NAME_SP = '___';

    public function test($file)
    {
        var_dump($file);die;
    }

    /**
     * @param $config [size, type, image: [maxWidth, minWidth, maxHeight, minHeight]]
     */
    public function generateToken($config) {
        $token = bcrypt(time());
        Session::put(self::TOKEN_PREFIX . $token, $config);
        return $token;
    }

    public function valid($token, $field) {
        $config = Session::get(self::TOKEN_PREFIX . $token);

        if (isset($config)) {
            return $this->validateFile($field, $config);
        } else {
            return false;
        }
    }

    public function saveTemporary($field) {
        $id = $this->getUnionNamePrefix($field);
        $path = $field->move(app_path() .'/../storage/app/uploads/tmp', $id . self::FILE_UNION_ORIGINAL_NAME_SP . $field->getClientOriginalName());
        return $id;
    }

    private function getUnionNamePrefix($field) {
        return md5(date('YmdHis', time()) . Session::getId() . $field->getClientOriginalName());
    }

    public function getFileFullName($id, $module = 'tmp') {
        $fileName = null;
        array_walk((new Filesystem())->files(app_path() . '/../storage/app/uploads/' . $module), function($path) use(&$fileName, $id) {
            if (strpos($path, $id) !== false) {
                $fileName = basename($path);
            }
        });

        return $fileName;
    }

    public function confirm($id, $module) {
        if (isset($module) && !empty($module)) {
            $fullName = $this->getFileFullName($id, 'tmp');
            Storage::move('uploads/tmp/' . $fullName, 'uploads/' . $module . '/' . $fullName);
            return 'uploads/' . $module . '/' . $fullName;
        }
    }

    private function save($token, $field, $path) {

    }

    private function validateFile($field, $config) {
        if (isset($config['size']) && !$this->isSizeValid($field, $config['size'])) {
            throw new FieldValidateException('上传文件大小超过限制');
        }
    }

    private function isSizeValid($field, $size) {
        return $field->getClientSize() <= $size;
    }

}