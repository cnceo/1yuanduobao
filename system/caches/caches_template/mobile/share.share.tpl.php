<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php echo js("jquery.cmsapi"); ?>
<?php echo js("template"); ?>
<?php echo js("template.fun"); ?>

<?php echo css("lottery"); ?>
<?php include self::includes("index.header"); ?>
<?php include self::includes("index.navs"); ?>

<!-- 栏目导航 结束-->
<!--
<div id="navBox" class="g-snav m_listNav">
    <div class="g-snav-lst z-sgl-crt"><a href="javascript:;" class="gray9">最新晒单</a><b></b></div>
    <div class="g-snav-lst"><a href="javascript:;" class="gray9">人气晒单</a><b></b></div>
    <div class="g-snav-lst"><a href="javascript:;" class="gray9">评论最多</a></div>
</div>
-->

<section>
    <div class="cSingleCon" id="loadingPicBlock">
        <div id="postBox10" class="cSingleCon2"></div>
    </div>
    <div id="LoadDataA">
        <a class="loading" href="javascript:void(0)">点击加载更多</a>
        <a class="loading" href="javascript:void(0)" style="display:none;">正在加载...</a>
        <a class="loading" href="javascript:void(0)" style="display:none;">没有数据了</a>
        <a class="loading" href="javascript:void(0)" style="display:none;">已经到底了</a>
    </div>
</section>

<script id="postBox10_tem" type="text/html">
    {{each list as sd i}}
        <div class="cSingleInfo">
            <dl class="fl"><a href="<?php echo WEB_PATH; ?>/uname/{{sd.sd_userid | uid}}">
            <img   src="<?php echo G_UPLOAD_PATH; ?>/{{sd.sd_userthumbs}}" />
            <b></b></a>
            </dl>
            <div class="cSingleR m-round">
                <ul>
                    <li><a href="<?php echo WEB_PATH; ?>/uname/{{sd.sd_userid | uid}}" ><em class="blue">{{sd.sd_username}}</em></a>
                    <span><strong class="c9">：</strong><a href="<?php echo WEB_PATH; ?>/index/share/detail/{{sd.sd_id}}">{{sd.sd_title}}</a></span> <h5>{{sd.sd_time | dateFormat:'yyyy-MM-dd  hh:mm:ss'}}</h5></li>
                    <li>
                    <a href="<?php echo WEB_PATH; ?>/index/share/detail/{{sd.sd_id}}">
                    {{sd.sd_content}}
                    </a>
                    </li>
                    <li class="maxImg">
                    <a href="<?php echo WEB_PATH; ?>/index/share/detail/{{sd.sd_id}}">
                        <img src="<?php echo G_UPLOAD_PATH; ?>/{{sd.sd_thumbs}}">
                    </a>    
                    </li>
                    <li><dd><s></s><strong>{{sd.sd_zhan}}</strong>人羡慕嫉妒</dd><dd><i></i><strong>{{sd.sd_ping}}</strong>条评论</dd></li>
                </ul>
                <b class="z-arrow"></b>
            </div>
        </div>
    {{/each}}
</script>
<script type="text/javascript">
var $datas = <?php echo json_encode($shaidan); ?>;
$("#postBox10").append( template('postBox10_tem', {list:$datas}) );
$("#LoadDataA a").click( function() {
    $data = $("#LoadDataA a");
    $data.data("page",($data.data("page")|0) + 1);
    $data.data("page",$data.data("page")==1 ?　2 : $data.data("page"));

    if ( $data.data("maxpage") === undefined )
    {
        $data.hide().eq(1).show();
        $.get( APP.WEB_PATH+'/'+APP.G_PARAM_URL+"/p"+$data.data("page"), function( $datas ) {
            if ( $datas.shaidan.length < 20 )
            {
                $data.data("maxpage",$data.data("page"));
            }
            $("#postBox10").append(template('postBox10_tem', {list:$datas.shaidan}))
            $data.hide().eq(0).show();
        },"json")
    }
    else
    {
        $data.hide().eq(2).show();
    }
});
</script>
<!-- footer 开始-->
<?php include self::includes("index.footer"); ?>