<?php

use Illuminate\Support\Facades\Storage;


if (!function_exists('upload_document')) {
    function upload_document($file, $store_path = '')
    {

        $path = $file->store($store_path);
        //$s3FilePath = 'document/'.$file->hashName();
        //$getFilePath = storage_path('app/public/').$path;
        //Storage::disk('s3')->put($s3FilePath, file_get_contents($getFilePath));
        $path = Storage::disk('s3')->put($store_path, $file);
        //$url = Storage::disk('s3')->temporaryUrl( $path, now()->addMinutes(5) );

        return $path;
    }
}
if (!function_exists('delete_document')) {
    function delete_document($path = null)
    {
        if (Storage::disk('s3')->exists($path)) {
            Storage::disk('s3')->delete($path);
        }
    }
}

if (!function_exists('validate_assetdetail')) {
    function validate_assetdetail($assets, $section, $field, $template_id)
    {
        $val = isset($assets[$section][$field]) ? $assets[$section][$field] : '';
        $unknown = config()->has('unknown.' . $section . '.' . $field) ? config('unknown.' . $section . '.' . $field) : '';

        if (config()->has('template.' . $section . '.' . $field)) {
            if (in_array($template_id, config('template.' . $section . '.' . $field))) {
                if (is_array($val) && !empty($val)) {
                    return true;
                } else if ((!is_array($val) && $val != "") || $unknown != "") {
                    return true;
                }
            }
        } else if ((is_array($val) && !empty($val)) || ($val == '0')) {
            return true;
        } else if ((!is_array($val) && $val != "") || $unknown != "") {
            return true;
        }

        return false;
    }
}

if (!function_exists('assetdetail_value')) {
    function assetdetail_value($assets, $section, $field, $template_id)
    {
        $value = config()->has('unknown.' . $section . '.' . $field) ? config('unknown.' . $section . '.' . $field) : null;

        if (!empty($assets[$section][$field]) && is_array($assets[$section][$field])) {
            $value = $assets[$section][$field];
        } else if ((isset($assets[$section][$field]) && !is_array($assets[$section][$field]) && $assets[$section][$field] != "") || (isset($assets[$section][$field]) && $assets[$section][$field] == '0')) {

            $value = $assets[$section][$field];
            if (config()->has('numeric_value.' . $section) && in_array($field, config('numeric_value.' . $section))) {
                $value = is_numeric($value) ? money_format("%.0n", $value) : $value;
            }
        }
        
        return $value;
    }
}
if (!function_exists('validate_compare_assetdetail')) {
    function validate_compare_assetdetail($assets,$section,$field,$template_id)
    {
        if(!empty(config('template.'.$section.'.'.$field))) {
            if( in_array($template_id, config('template.'.$section.'.'.$field)) && (isset($assets[$section][$field]) || config('unknown.'.$section.'.'.$field))){
                return true;
            }
        }
        
        if( isset($assets[$section][$field]) || config('unknown.'.$section.'.'.$field) ){
            return true;
        }

        return false;
    }
}
if (!function_exists('asset_compare_value')) {
    function asset_compare_value($assets,$section,$field)
    {
        $value = config()->has('unknown.' . $section . '.' . $field) ? config('unknown.' . $section . '.' . $field) : null;

        if (!empty($assets[$section][$field]) && is_array($assets[$section][$field])) {
            $value = $assets[$section][$field];
        } else if ((isset($assets[$section][$field]) && !is_array($assets[$section][$field]) && $assets[$section][$field] != "") || (isset($assets[$section][$field]) && $assets[$section][$field] == '0')) {

            $value = $assets[$section][$field];
            if (config()->has('numeric_value.' . $section) && in_array($field, config('numeric_value.' . $section))) {
                $value = is_numeric($value) ? money_format("%.0n", $value) : $value;
            }
        }
        
        return $value;
    }
}
/*
* This function returns the url of documents in the storeage
* @param stroreage path of offer letter as saved in the database
* @return url of stored offer letter
**/

// if (!function_exists('storage_url')) {
//     function storage_url($store_path)
//     {
//         return Storage::temporaryUrl($store_path, now()->addMinutes(5));
//     }
// }

if (!function_exists('apiExceptionResponse')) {
    function apiExceptionResponse($response)
    {
        return response($response->getResponse()->getOriginalContent(), $response->getResponse()->getStatusCode());
    }
}
if (!function_exists('getRoleName')) {
    function getRoleName()
    {
        if (!is_null(\Auth::user()))
            return \Auth::user()->getRoleNames()->first();
        return null;
    }
}
if (!function_exists('divider')) {
    function divider($number_of_digits)
    {
        $tens = "1";

        if ($number_of_digits > 8)
            return 10000000;

        while (($number_of_digits - 1) > 0) {
            $tens .= "0";
            $number_of_digits--;
        }
        return $tens;
    }
}
if (!function_exists('price_format')) {
    function price_format($number)
    {
        $num = $number;
        $ext = ""; //thousand,lac, crore
        $number_of_digits = strlen(round($num));
        if ($number_of_digits > 5) {
            if ($number_of_digits % 2 != 0)
                $divider = divider($number_of_digits - 1);
            else
                $divider = divider($number_of_digits);
        } else
            $divider = 1;
        $fraction = $num / $divider;
        $fraction = number_format($fraction, 2);
        $number_of_digits = ($number_of_digits > 9) ? 9 : $number_of_digits;
        return $fraction . " " . \Config::get('assets.price_format.' . $number_of_digits);
    }
}
