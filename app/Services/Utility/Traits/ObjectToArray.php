<?php namespace App\Services\Utility\Traits;
trait ObjectToArray {
    function toArray() {
        $_arr = is_object($this) ? get_object_vars($this) : $this;
        foreach ($_arr as $key => $val) {
            $val = (is_array($val)) || is_object($val) ? $val->toArray(): $val;
            $arr[$key] = $val;
        }
        return $arr;
    }
}