<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php echo js("jquery.cmsapi"); ?>
<?php echo js("template"); ?>
<?php echo js("template.fun"); ?>
<?php include self::includes("index.header_top"); ?>
<section>
    <div class="mainCon">
        <div class="mBanner">
            <ul>
                <li class="mUserHead"><img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo Getuserimg($member['uid']); ?>"></li>
                <li class="mUserInfo"><p><?php echo get_user_name($member,'username'); ?></p>
                <br/>总共<?php echo L('html.key'); ?>次数：<?php echo $retotal; ?>
                <br/>总共中奖次数：<?php echo $hdtotal; ?></li>
            </ul>   
        </div>
        <div id="navBox" class="g-snav m_listNav">
            <div class="g-snav-lst z-sgl-crt" state="-1"><a href="javascript:;" class="gray9"><?php echo L('html.key'); ?>记录</a><b></b></div>

        </div>
        <input name="hdUserID" type="hidden" id="hdUserID" value="14004" />
        <!--夺宝记录-->
        <div id="divBuyRecord" class="mBuyRecord">
            <div class="haveNot z-minheight" style="display:none"><s></s><p>暂无记录</p></div>
            <div id="raffle_record" style="background:#fff;overflow:hidden;display:block"><!-- 有记录 -->
            
            </div>
        </div>      
        <div id="LoadDataA">
            <a class="loading" href="javascript:void(0)">点击加载更多</a>
            <a class="loading" href="javascript:void(0)" style="display:none;">正在加载...</a>
            <a class="loading" href="javascript:void(0)" style="display:none;">没有数据了</a>
            <a class="loading" href="javascript:void(0)" style="display:none;">已经到底了</a>
        </div>  
    </div>  
</section>
<script id="raffle_tem" type="text/html">       
    {{each list as rt i}}
        <a href="<?php echo WEB_PATH; ?>/cgoods/{{rt.ogid}}">
        <ul>
        <li class="mBuyRecordL"><img src="<?php echo G_UPLOAD_PATH; ?>/{{rt.g_thumb}}"></li>
        <li class="mBuyRecordR">(第({{rt.oqishu}})期){{rt.g_title}}
        {{if rt.q_uid}}
        <p class="mValue">价值：{{rt.g_money}}  <?php echo L('cgoods.currency'); ?></p>
        <span>获得者：<a style="color: #22AAff" href="<?php echo WEB_PATH; ?>/uname/{{rt.q_uid | uid}}">{{rt.g_username}}</a>
        <br>幸运<?php echo L('html.key'); ?>码：<em class="orange">{{rt.q_user_code}}</em></span>
        </li>
        {{else}}
        <p class="mValue">价值：{{rt.q_money}} <?php echo L('cgoods.currency'); ?></p>
        <p class="gray02">购买时间：{{rt.otime |dateFormat:'yyyy-MM-dd  hh:mm:ss'}}</p>
        </li>   
        {{/if}}     
        </ul>   
        </a>    
    {{/each}}   
    
</script>   
<script type="text/javascript">
var $datas = <?php echo json_encode($record); ?>;
$("#raffle_record").append(template('raffle_tem', {list:$datas}))
$("#LoadDataA a").click(function(){
    $data = $("#LoadDataA a");
    $data.data("page",($data.data("page")|0) + 1)
    $data.data("page",$data.data("page")==1 ?　2 : $data.data("page"))
    
    if($data.data("maxpage") === undefined){
        $data.hide().eq(1).show()

        $.get(APP.WEB_PATH+'/'+APP.G_PARAM_URL+"/p"+$data.data("page"),function($datas){
                if($datas.record.length < 20 ){
                    $data.data("maxpage",$data.data("page"));
                }
                $("#raffle_record").append(template('raffle_tem', {list:$datas.record}))
                $data.hide().eq(0).show()
        },"json")
    } else {
        $data.hide().eq(2).show()
    }
});
</script>
<?php include self::includes("index.footer"); ?>
