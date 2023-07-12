
<?php
/*
 * @Descripttion: 
 * @version: 
 * @Author: lengxiaoyu
 * @Date: 2022-05-25 18:07:26
 * @LastEditTime: 2022-06-21 17:47:59
 */
header("Content-Type: text/html;charset=utf-8");
header("Content-Type: text/json; charset=$charset");
header("Access-Control-Allow-Origin:*");
header('Access-Control-Allow-Methods:GET');
header('Access-Control-Allow-Headers:x-requested-with, content-type');
require('phpQuery/phpQuery.php');
$a = file_get_contents("https://www.zhihu.com/api/v4/columns/c_1261258401923026944/items");
$data = json_decode(Unicode($a))->{"data"};
$html = $data[0]->{"url"};
phpQuery::newDocumentFile($html);
$p = pq('p')->text();
echo ($p);

// 编码转换
function Unicode($str)
{
    return preg_replace_callback(
        "#\\\u([0-9a-f]{4})#i",
        function ($r) {
            return iconv('UCS-2BE', 'UTF-8', pack('H4', $r[1]));
        },
        $str
    );
}