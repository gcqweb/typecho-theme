<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form)
{
    $logoUrl = new \Typecho\Widget\Helper\Form\Element\Text(
        'logoUrl',
        null,
        null,
        _t('站点 LOGO 地址'),
        _t('在这里填入一个图片 URL 地址, 以在网站标题前加上一个 LOGO')
    );

    $form->addInput($logoUrl);

    $sidebarBlock = new \Typecho\Widget\Helper\Form\Element\Checkbox(
        'sidebarBlock',
        [
            'ShowRecentPosts'    => _t('显示最新文章'),
            'ShowRecentComments' => _t('显示最近回复'),
            'ShowCategory'       => _t('显示分类'),
            'ShowArchive'        => _t('显示归档'),
            'ShowOther'          => _t('显示其它杂项')
        ],
        ['ShowRecentPosts', 'ShowRecentComments', 'ShowCategory', 'ShowArchive', 'ShowOther'],
        _t('侧边栏显示')
    );

    $form->addInput($sidebarBlock->multiMode());
}


// function themeFields($layout)
// {
//     $logoUrl = new \Typecho\Widget\Helper\Form\Element\Text(
//         'logoUrl',
//         null,
//         null,
//         _t('站点LOGO地址'),
//         _t('在这里填入一个图片URL地址, 以在网站标题前加上一个LOGO')
//     );
//     $layout->addItem($logoUrl);
// }


//获取Gravatar头像 QQ邮箱取用qq头像
function getGravatar($email, $s = 96, $d = 'mp', $r = 'g', $img = false, $atts = array())
{
preg_match_all('/((\d)*)@qq.com/', $email, $vai);
if (empty($vai['1']['0'])) {
    $url = 'https://gravatar.loli.net/avatar/';
    $url .= md5(strtolower(trim($email)));
    $url .= "?s=$s&d=$d&r=$r";
    if ($img) {
        $url = '<img src="' . $url . '"';
        foreach ($atts as $key => $val)
            $url .= ' ' . $key . '="' . $val . '"';
        $url .= ' />';
    }
}else{
    $url = 'https://q2.qlogo.cn/headimg_dl?dst_uin='.$vai['1']['0'].'&spec=100';
}
return  $url;
}



// //获取文章缩略图
// function showThumbnail($widget)
// { 
// $attach = $widget->attachments(1)->attachment;
// $pattern = '/\<img.*?src\=\"(.*?)\"[^>]*>/i'; 
// if (preg_match_all($pattern, $widget->content, $thumbUrl)) {
//      echo "<div class='post-thumb'> < img class='thumb' src='".$thumbUrl[1][0]."' /></div>";
// } elseif ($attach->isImage) {
//   echo "<div class='post-thumb'> < img class='thumb' src='".$attach->url."' /></div>";
// } 
// }

function getArticleOneImg($widget){
  $pattern = '/\<img.*?src\=\"(.*?)\"[^>]*>/i';
   if (preg_match_all($pattern, $widget->content, $thumbUrl) && strlen($thumbUrl[1][0]) > 7) {
     return $thumbUrl[1][0];
   }
}


// 多张缩略图// ?php showThumbnail($this,0); ?
function showThumbnail($widget,$imgnum){ //获取两个参数，文章的ID和需要显示的图片数量
    // 当文章无图片时的默认缩略图
    // $rand = rand(1,20); 
    // $random = $widget->widget('Widget_Options')->themeUrl . '/img/rand/' . $rand . '.jpg'; // 随机缩略图路径
    $attach = $widget->attachments(1)->attachment;
    $pattern = '/\<img.*?src\=\"(.*?)\"[^>]*>/i'; 
    $patternMD = '/\!\[.*?\]\((http(s)?:\/\/.*?(jpg|png))/i';
    $patternMDfoot = '/\[.*?\]:\s*(http(s)?:\/\/.*?(jpg|png))/i';
    //如果文章内有插图，则调用插图
    if (preg_match_all($pattern, $widget->content, $thumbUrl)) { 
        echo $thumbUrl[1][$imgnum];
    }
    //没有就调用第一个图片附件
    else if ($attach && $attach->isImage) {
        echo $attach->url; 
    } 
    //如果是内联式markdown格式的图片
    else if (preg_match_all($patternMD, $widget->content, $thumbUrl)) {
        echo $thumbUrl[1][$imgnum];
    }
    //如果是脚注式markdown格式的图片
    else if (preg_match_all($patternMDfoot, $widget->content, $thumbUrl)) {
        echo $thumbUrl[1][$imgnum];
    }
    //如果真的没有图片，就调用一张随机图片
    else{
        // echo $random;
    }
}

// 获取图片数量?php echo ''.imgNum($this->content).'' ; ?
function imgNum($content){
$output = preg_match_all('#<img(.*?) src="([^"]*/)?(([^"/]*)\.[^"]*)"(.*?)>#', $content,$s);
$cnt = count( $s[1] );
return $cnt;
}

// 那年今日
// 全局调用?php _getHistoryToday(time()) ?
// 文章页调用?php _getHistoryToday($this->created) ?
function _getHistoryToday($created)
{
    $date = date('m/d', $created);
    $time = time();
    $db = Typecho_Db::get();
    $prefix = $db->getPrefix();
    $sql = "SELECT * FROM `{$prefix}contents` WHERE DATE_FORMAT(FROM_UNIXTIME(created), '%m/%d') = '{$date}' and created <= {$time} and created != {$created} and type = 'post' and status = 'publish' and (password is NULL or password = '') LIMIT 5";
    $result = $db->query($sql);
    if ($result instanceof Traversable) {
        foreach ($result as $item) {
            $item = Typecho_Widget::widget('Widget_Abstract_Contents')->push($item);
            $title = htmlspecialchars($item['title']);
            $permalink = $item['permalink'];
            echo "
                    <li class='item'>
                        <a class='link' href='{$permalink}' title='{$title}'>{$title}</a>
                    </li>
                ";
        }
    }
}

//获得读者墙 ?php getFriendWall(); ?
function getFriendWall()
{
    $db = Typecho_Db::get();
    $sql = $db->select('COUNT(author) AS cnt', 'author', 'url', 'mail')
              ->from('table.comments')
              ->where('status = ?', 'approved')
              ->where('type = ?', 'comment')
              ->where('authorId = ?', '0')
              ->where('mail != ?', 'admin@ben-lab.com')   //排除自己上墙
              ->group('author')
              ->order('cnt', Typecho_Db::SORT_DESC)
              ->limit('15');    //读取几位用户的信息
    $result = $db->fetchAll($sql);

    if (count($result) > 0) {
        $maxNum = $result[0]['cnt'];
        foreach ($result as $value) {
            $mostactive .= '<li><a target="_blank" rel="nofollow" href="' . $value['url'] . '"><span class="pic" style="background: url(http://1.gravatar.com/avatar/'.md5(strtolower($value['mail'])).'?s=36&d=&r=G) no-repeat; "></span><em>' . $value['author'] . '</em><strong>+' . $value['cnt'] . '</strong><br />' . $value['url'] . '</a></li>';
        }
        echo $mostactive;
    }
}

// 随机文章（手气不错）?php theme_random_posts();?
function theme_random_posts(){

$defaults = array(

'number' => 5,
'before' => '<ul class="list">',
'after' => '</ul>',

'xformat' => '<li><a href="{permalink}" title="{title}">{title}</a></li>'
);
$db = Typecho_Db::get();

$sql = $db->select()->from('table.contents')
->where('status = ?','publish')
->where('type = ?', 'post')
->where('created <= unix_timestamp(now())', 'post') //添加这一句避免未达到时间的文章提前曝光
->limit($defaults['number'])
->order('RAND()');

$result = $db->fetchAll($sql);
echo $defaults['before'];
foreach($result as $val){
$val = Typecho_Widget::widget('Widget_Abstract_Contents')->filter($val);
echo str_replace(array('{permalink}', '{title}'),array($val['permalink'], $val['title']), $defaults['xformat']);
}
echo $defaults['after'];
}

// 文章字数统计?php echo word_count($this->cid); ?
function word_count($cid){
	$db = Typecho_Db::get ();
	$rs = $db->fetchRow($db->select('table.contents.text')->from('table.contents')->where('table.contents.cid=?',$cid)->order ('table.contents.cid',Typecho_Db::SORT_ASC)->limit (1));
	return mb_strlen($rs['text'], 'UTF-8');
}

// 文章字数统计,方法2//?php art_count($this->cid); ?

function  art_count ($cid){
    $db=Typecho_Db::get ();
    $rs=$db->fetchRow ($db->select ('table.contents.text')->from ('table.contents')->where ('table.contents.cid=?',$cid)->order ('table.contents.cid',Typecho_Db::SORT_ASC)->limit (1));
    $text = preg_replace("/[^\x{4e00}-\x{9fa5}]/u", "", $rs['text']);
    echo mb_strlen($text,'UTF-8');
}

// 开启网页压缩，头部放?php ob_start(); ? 
// 页脚放?php $html_source = ob_get_contents();ob_clean(); print compressHtml($html_source); ob_end_flush(); ?
function compressHtml($html_source) {
    $chunks = preg_split('/(<!--<nocompress>-->.*?<!--<\/nocompress>-->|<nocompress>.*?<\/nocompress>|<pre.*?\/pre>|<textarea.*?\/textarea>|<script.*?\/script>)/msi', $html_source, -1, PREG_SPLIT_DELIM_CAPTURE);
    $compress = '';
    foreach ($chunks as $c) {
        if (strtolower(substr($c, 0, 19)) == '<!--<nocompress>-->') {
            $c = substr($c, 19, strlen($c) - 19 - 20);
            $compress .= $c;
            continue;
        } else if (strtolower(substr($c, 0, 12)) == '<nocompress>') {
            $c = substr($c, 12, strlen($c) - 12 - 13);
            $compress .= $c;
            continue;
        } else if (strtolower(substr($c, 0, 4)) == '<pre' || strtolower(substr($c, 0, 9)) == '<textarea') {
            $compress .= $c;
            continue;
        } else if (strtolower(substr($c, 0, 7)) == '<script' && strpos($c, '//') != false && (strpos($c, "\r") !== false || strpos($c, "\n") !== false)) {
            $tmps = preg_split('/(\r|\n)/ms', $c, -1, PREG_SPLIT_NO_EMPTY);
            $c = '';
            foreach ($tmps as $tmp) {
                if (strpos($tmp, '//') !== false) {
                    if (substr(trim($tmp), 0, 2) == '//') {
                        continue;
                    }
                    $chars = preg_split('//', $tmp, -1, PREG_SPLIT_NO_EMPTY);
                    $is_quot = $is_apos = false;
                    foreach ($chars as $key => $char) {
                        if ($char == '"' && $chars[$key - 1] != '\\' && !$is_apos) {
                            $is_quot = !$is_quot;
                        } else if ($char == '\'' && $chars[$key - 1] != '\\' && !$is_quot) {
                            $is_apos = !$is_apos;
                        } else if ($char == '/' && $chars[$key + 1] == '/' && !$is_quot && !$is_apos) {
                            $tmp = substr($tmp, 0, $key);
                            break;
                        }
                    }
                }
                $c .= $tmp;
            }
        }
        $c = preg_replace('/[\\n\\r\\t]+/', ' ', $c);
        $c = preg_replace('/\\s{2,}/', ' ', $c);
        $c = preg_replace('/>\\s</', '> <', $c);
        $c = preg_replace('/\\/\\*.*?\\*\\//i', '', $c);
        $c = preg_replace('/<!--[^!]*-->/', '', $c);
        $compress .= $c;
    }
    return $compress;
}



//总访问量?php echo theAllViews();?
function theAllViews()
{
    $db = Typecho_Db::get();
    $row = $db->fetchAll('SELECT SUM(VIEWS) FROM `typecho_contents`');
    echo number_format($row[0]['SUM(VIEWS)']);
}


//响应耗时?php echo timer_stop();?
function timer_start() {
    global $timestart;
    $mtime = explode( ' ', microtime()  );
    $timestart = $mtime[1] + $mtime[0];
    return true; 
}
timer_start();
function timer_stop( $display = 0, $precision = 3  ) {
    global $timestart, $timeend;
    $mtime = explode( ' ', microtime()  );
    $timeend = $mtime[1] + $mtime[0];
    $timetotal = number_format( $timeend - $timestart, $precision  );
    $r = $timetotal < 1 ? $timetotal * 1000 . " ms" : $timetotal . " s";
    if ( $display  ) {
        echo $r;
    }
    return $r;
}

// 评论+@内容前加?php $parentMail = get_comment_at($comments->coid)?     ?php echo $parentMail;?
//获取评论的锚点链接
function get_comment_at($coid)
{
    $db   = Typecho_Db::get();
    $prow = $db->fetchRow($db->select('parent,status')->from('table.comments')
        ->where('coid = ?', $coid));//当前评论
    $mail = "";
    $parent = @$prow['parent'];
    if ($parent != "0") {//子评论
        $arow = $db->fetchRow($db->select('author,status,mail')->from('table.comments')
            ->where('coid = ?', $parent));//查询该条评论的父评论的信息
        @$author = @$arow['author'];//作者名称
        $mail = @$arow['mail'];
        if(@$author && $arow['status'] == "approved"){//父评论作者存在且父评论已经审核通过
            if (@$prow['status'] == "waiting"){
                echo '<p class="commentReview">（评论审核中）)</p>';
            }
            echo '<a class="tell" href="#comment-' . $parent . '"> 回复 ' . $author . '</a>';
        }else{//父评论作者不存在或者父评论没有审核通过
            if (@$prow['status'] == "waiting"){
                echo '<p class="commentReview">（评论审核中）)</p>';
            }else{
                echo '';
            }
        }

    } else {//母评论，无需输出锚点链接
        if (@$prow['status'] == "waiting"){
            echo '<p class="commentReview">（评论审核中）)</p>';
        }else{
            echo '';
        }
    }
}
// 分页条数
function themeInit($archive) {
    if ($archive->is('category', 'list')) {
        $archive->parameter->pageSize = 15; // 自定义条数
    }
    if ($archive->is('category', 'app')) {
        $archive->parameter->pageSize = 15; // 自定义条数
    }
}

// // 上一篇下一篇缩略图
// function showThumbnail($widget) { 
//     $mr = '默认图片地址'; 
//     $attach = $widget->attachments(1)->attachment;
//     $pattern = '/\<img.*?src\=\"(.*?)\"[^>]*>/i'; 
// if (preg_match_all($pattern, $widget->content, $thumbUrl)) {
//          echo $thumbUrl[1][0];
//     } elseif ($attach->isImage) {
//       echo $attach->url; 
//     } else {
//         echo $mr;
//     }
// }


