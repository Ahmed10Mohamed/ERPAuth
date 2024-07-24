<?php

use App\Models\CustomUpdate;
use App\Models\Employee;
use App\Models\Product;
use App\Models\User;

if (!function_exists('redirect_if_no_permission')) {
    function redirect_if_no_permission($permission,$custom_page=null,$page_name=null,$item_id=null)
    {
        if (!check_has_permission($permission,$custom_page,$page_name,$item_id)) {
            return redirect()->route('Not-Authorized');
        }
        return null;
    }
}

function check_has_permission($page,$custom_page=null,$page_name=null,$item_id=null){


    if(admin()->id !== 1){
        $admin_permition = admin()->permition_info;
        $id = $admin_permition->id;
        $permitions = explode(',',$admin_permition->permation);

        if (in_array($custom_page, $permitions)){

            return check_custom_update($page_name,$id,$item_id);
        }else{

            $filteredArray = array_filter($permitions, function($item) use ($page,$custom_page,$page_name,$id,$item_id) {

                return strpos($item, $page) !== false;

            });
            return !empty($filteredArray);
        }


    }else{
        // this supper admin
        return true;
    }
}


function check_custom_update($page,$id,$item_id){


    $per_emp = CustomUpdate::where(['permition_id'=>$id,'page_custom'=>$page])->first();

    if($page == 'emp'){
        $permition = Employee::query();
    }elseif($page == 'users'){
        $permition = User::query();
    }else{
        $permition = Product::query();
    }

    if($per_emp->db_type == 'string'){
        $permition = $permition->where($per_emp->col,'like','%'.$per_emp->value.'%');
    }elseif($per_emp->db_type == 'number'){
        $permition = $permition->where($per_emp->col,$per_emp->exp,$per_emp->value);
    }elseif($per_emp->db_type == 'date'){
        $permition = $permition->whereDate($per_emp->col,$per_emp->exp,$per_emp->value);

    }
    $permition = $permition->where('id',$item_id)->exists();
    return $permition;

}
function user_permission($page){
    $admin_permition = admin()->permition_info;
    $permitions = explode(',',$admin_permition->permation);

    $filteredArray = array_filter($permitions, function($item) use ($page) {
        return strpos($item, $page) !== false;
    });

    return $filteredArray;
}
if(!function_exists('admin')){
    function admin(){
        return auth()->guard('admin')->user();
    }

}
function remove_invalid_charcaters($str)
    {
        return str_ireplace(['\'', '"', ',', ';', '<', '>', '?'], ' ', $str);
    }

function url_beautify ($title)
{
    $url = str_replace(' ', '-', $title);
    $url = str_replace('/', '-', $url);
    $url = str_replace('?', '', $url);
    $url = str_replace('#', '', $url);
    $url = str_replace('.', '-', $url);
    $url = str_replace('/', '', $url);
    $url = str_replace('\\', '', $url);
    $url = str_replace(',', '', $url);
    $url = str_replace('--', '-', $url);

    return $url;
}
if (!function_exists('video_iframe'))
{
    function video_iframe ($url)
    {
        $parse = parse_url($url);
        $domain = $parse['host'];
        if($domain == "www.youtube.com" || $domain == "youtube.com")
        {
            $step1 = explode('v=', $url);
            if(count($step1) > 1)
            {
                $step2 = explode('&',$step1[1]);
                $video_id = $step2[0];
                ?>
            <iframe src="https://www.youtube.com/embed/<?php echo $video_id; ?>" width="640" height="360" frameborder="0"
                webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
            <?php
            }
            else
            {
                echo "<a href='".$url."' target='_blank' class='btn btn-success'>فيديو</a>";
            }
        }
        elseif($domain == "www.youtu.be" || $domain == "youtu.be")
        {
            $step1 = explode('youtu.be/', $url);
            if(count($step1) > 1)
            {
                $video_id = $step1[1];
                ?>
            <iframe src="https://www.youtube.com/embed/<?php echo $video_id; ?>" width="640" height="360" frameborder="0"
                webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
            <?php
                        }
                        else
                        {
                            echo "<a href='".$url."' target='_blank' class='btn btn-success'>فيديو</a>";
                        }
                    }
                    else if($domain == 'www.vimeo.com' || $domain == 'vimeo.com')
                    {
                        $video_id = explode('/', $url);
                        ?>
            <iframe src="https://player.vimeo.com/video/<?php echo $video_id[count($video_id) - 1]; ?>?" width="640" height="360"
                frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen frameborder="0" webkitallowfullscreen
                mozallowfullscreen allowfullscreen></iframe>
            <script src="https://player.vimeo.com/api/player.js"></script>
            <?php
        }
        else
        {
            echo "<a href='".$url."' target='_blank' class='btn btn-success'>فيديو</a>";
        }
    }
}

if (!function_exists('successResponseData')) {
    function successResponseData($data, $message = 'Success', $status = 200)
    {
        return response()->json([
            'statusType' => true,
            'status'     => $status,
            'message'    => $message,
            'data'       => $data,
        ], $status);
    }
}
if (!function_exists('successResponseDataPage')) {
    function successResponseDataPage($data,$pages, $message = 'Success', $status = 200)
    {
        return response()->json([
            'statusType' => true,
            'status'     => $status,
            'message'    => $message,
            'data'       => $data,
            'pages'      => $pages
        ], $status);
    }
}
if (!function_exists('successResponseDataWithLink')) {
    function successResponseDataWithLink($data, $url,$message = 'Success', $status = 200)
    {
        return response()->json([
            'statusType' => true,
            'status'     => $status,
            'message'    => $message,
            'data'       => $data,
            'url'        => $url
        ], $status);
    }
}
if (!function_exists('successResponseMessage')) {
    function successResponseMessage($message = 'Success', $status = 200)
    {
        return response()->json([
            'statusType' => true,
            'status'     => $status,
            'message'    => $message,
        ], $status);
    }
}
if (!function_exists('errorResponseMessage')) {
    function errorResponseMessage($error, $status = 400)
    {
        return response()->json([
            'statusType' => false,
            'status'     => $status,
            'error'      => $error,
        ], $status);
    }
}
if (!function_exists('lang')) {

    function lang($model , $col)
    {
        if(request()->header('Content-Language') == 'en' ){
            $l='en_'.$col;
            return $model?->$l;
        }else{
            $l='ar_'.$col;
            return $model?->$l;
        }
    }
}

if (!function_exists('jslang')) {

    function jslang($col)
    {
        if(request()->header('Content-Language') == 'en' ){
            $l='en_'.$col;
            return  $l;
        }else{
            $l='ar_'.$col;
            return $l;
        }
    }
}




?>
