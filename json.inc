<?php
class JSON {
    //To store array of JSON values
    var $array;

    function putKeyValuePair($key, $value) {
        $this->array[$key] = $value;
    }

    function putArray($key, $arr) {
        $this->array[$key] = $arr;
    }

    function output() {
        return json_encode($this->array);
    }
}