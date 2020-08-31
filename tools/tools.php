<?php
function get_post_view($archive, $r = 0)
{
    $cid    = $archive->cid;
    $db     = Typecho_Db::get();
    $prefix = $db->getPrefix();
    if (!array_key_exists('views', $db->fetchRow($db->select()->from('table.contents')))) {
        $db->query('ALTER TABLE `' . $prefix . 'contents` ADD `views` INT(10) DEFAULT 0;');
        if ($r == 0) {
            echo 1;
        }
        return;
    }
    $row = $db->fetchRow($db->select('views')->from('table.contents')->where('cid = ?', $cid));
    if ($archive->is('single')) {
        $views = Typecho_Cookie::get('extend_contents_views');
        if (empty($views)) {
            $views = array();
        } else {
            $views = explode(',', $views);
        }
        if (!in_array($cid, $views)) {
            $db->query($db->update('table.contents')->rows(array('views' => (int) $row['views'] + 1))->where('cid = ?', $cid));
            array_push($views, $cid);
            $views = implode(',', $views);
            Typecho_Cookie::set('extend_contents_views', $views);
        }
    }
    if ($r == 0) {
        echo $row['views'];
    }
}

function showThumbnail($theurl)
{
  $arr_img = ["meizi", "dongman", "fengjing", "suiji"];
   if(rand(1,100) > 100){
      echo $theurl . "/assets/img/random/" . rand(1, 25) . ".jpg";
   }else{
      /** http://api.mtyqx.cn/api/random.php **/ 
      echo "http://api.mtyqx.cn/api/random.php/" . rand(1,100);
      /** echo "https://api.btstu.cn/sjbz/api.php?lx=" . $arr_img[array_rand($arr_img,1)] . "/" . rand(1,100) ; **/
   }

}
