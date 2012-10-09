<?php

function objectsIntoArray($arrObjData, $arrSkipIndices = array()) {
    $arrData = array();

    // if input is object, convert into array
    if (is_object($arrObjData)) {
        $arrObjData = get_object_vars($arrObjData);
    }

    if (is_array($arrObjData)) {
        foreach ($arrObjData as $index => $value) {
            if (is_object($value) || is_array($value)) {
                $value = objectsIntoArray($value, $arrSkipIndices); // recursive call
            }
            if (in_array($index, $arrSkipIndices)) {
                continue;
            }
            $arrData[$index] = $value;
        }
    }
    return $arrData;
}

function set_config($type, $id, $access_token, $data_directory) {
    //保存下来用户的access_token
    $user_file_name = $data_directory . $id . "." . $type . ".config";
    return file_put_contents($user_file_name, serialize($access_token));
}

function get_config($type, $id, $data_directory) {
    $Str = array();
    //保存下来用户的access_token
    $user_file_name = $data_directory . $id . "." . $type . ".config";
    if (file_exists($user_file_name)) {
        $Str = file_get_contents($user_file_name);
        $Str = unserialize($Str);
    }
    return $Str;
}

function set_log($type, $id, $data_directory) {
    $user_file_name = $data_directory . $id . "." . $type . ".log";
    return file_put_contents($user_file_name, serialize($douban_str));
}

function get_log($type, $id, $data_directory) {
    $Str = array();
    $user_file_name = $data_directory . $id . "." . $type . ".log";
    if (file_exists($user_file_name)) {
        $Str = file_get_contents($user_file_name);
        $Str = unserialize($Str);
    }
    return $Str;
}