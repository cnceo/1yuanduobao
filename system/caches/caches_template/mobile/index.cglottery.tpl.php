<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php echo css("lottery"); ?>
<?php echo js("jquery.BusyTime"); ?>
<?php echo js("template"); ?>
<?php echo js("template.fun"); ?>
<?php echo js("jquery.cmsapi"); ?>
<?php include self::includes("index.header"); ?>
<?php include self::includes("index.navs"); ?>


<section class="revealed" style="background:#fff;">
    <div id="divLottery" class="revCon"></div>
    <div id="LoadDataA">
        <a class="loading" href="javascript:void(0)">点击加载更多</a>
        <a class="loading" href="javascript:void(0)" style="display:none;">正在加载...</a>
        <a class="loading" href="javascript:void(0)" style="display:none;">没有数据了</a>
        <a class="loading" href="javascript:void(0)" style="display:none;">已经到底了</a>
    </div>
</section>

<script id="goodsListData" type="text/html">
     {{each list as shop i}}
            <ul>
            <li class="revConL">
            <a href="<?php echo WEB_PATH; ?>/cgdataserver/{{shop.id}}" >
            <img src="<?php echo G_UPLOAD_PATH; ?>/{{shop.g_thumb}}">
            </a>
            </li>
                 <li class="revConR">
                    <dl>
                        <dd>
                        <a href="<?php echo WEB_PATH; ?>/uname/{{shop.q_user.uid | uid}}">
                        <img name="uImg" src="<?php echo G_UPLOAD_PATH; ?>/{{shop.q_user.img}}.8080.jpg">
                        </a>
                        </dd>
                        <dd><span>获得者:<a href="<?php echo WEB_PATH; ?>/uname/{{shop.q_user.uid | uid}}" class="rUserName blue">{{shop.q_user.username}}</a></span>
                                    本期<?php echo L('html.key'); ?>:<em class="orange arial">{{shop.onum}}</em>人次</dd>
                    </dl>
                    <dt>幸运<?php echo L('html.key'); ?>码：<em class="orange arial">{{shop.q_user_code}}</em><br>揭晓时间：<em class="c9 arial">{{shop.q_end_time | dateFormat:'yyyy年 MM月 dd日 hh:mm:ss'}}</em></dt>
                    <b class="fr z-arrow"></b>
                </li>
        </ul>
    {{/each}}
</script>
<script id="goodListData_list" type="text/html">
        {{each list as shop i}}
         <ul>
         <li class="revConL">
         <a href="<?php echo WEB_PATH; ?>/cgdataserver/{{shop.id}}" >
         <img src="<?php echo G_UPLOAD_PATH; ?>/{{shop.g_thumb}}">
         </a>
         </li>
         <li class="revConR">
            <dl>
                <dd>
                <a href="<?php echo WEB_PATH; ?>/uname/{{shop.q_user.uid | uid}}">
                <img name="uImg" src="<?php echo G_UPLOAD_PATH; ?>/{{shop.q_user.img}}.8080.jpg">
                </a>
                </dd>
                <dd><span>获得者:<a href="<?php echo WEB_PATH; ?>/uname/{{shop.q_user.uid | uid}}" class="rUserName blue">{{shop.q_user.username}}</a></span>
                            本期<?php echo L('html.key'); ?>:<em class="orange arial">{{shop.onum}}</em>人次</dd>
            </dl>
            <dt>幸运<?php echo L('html.key'); ?>码：<em class="orange arial">{{shop.q_user_code}}</em><br>揭晓时间：<em class="c9 arial">{{shop.q_end_time | dateFormat:'yyyy年 MM月 dd日 hh:mm:ss'}}</em></dt>
            <b class="fr z-arrow"></b>
         </li>
         </ul>
        {{/each}}
</script>

<script id="goodListData_ok" type="text/html">
         <li class="revConL">
         <a href="<?php echo WEB_PATH; ?>/cgdataserver/{{shop.id}}" >
         <img src="<?php echo G_UPLOAD_PATH; ?>/{{shop.thumb}}">
         </a>
         </li>
         <li class="revConR">
            <dl>
                <dd>
                <a href="<?php echo WEB_PATH; ?>/uname/{{shop.uid | uid}}">
                <img name="uImg" src="<?php echo G_UPLOAD_PATH; ?>/{{shop.uphoto}}.8080.jpg">
                </a>
                </dd>
                <dd><span>获得者:<a href="<?php echo WEB_PATH; ?>/uname/{{shop.uid | uid}}" class="rUserName blue">{{shop.user}}</a></span>
                    本期<?php echo L('html.key'); ?>:<em class="orange arial">{{shop.shopsum}}</em>人次</dd>
            </dl>
            <dt>幸运<?php echo L('html.key'); ?>码：<em class="orange arial">{{shop.q_user_code}}</em><br>揭晓时间：<em class="c9 arial">{{shop.times | dateFormat:'yyyy年 MM月 dd日 hh:mm:ss'}}</em></dt>
            <b class="fr z-arrow"></b>
         </li>
</script>
<script id="goodListData_showtime" type="text/html">
       <ul class="rNow rFirst">
       <li class="revConL">
       <a href="<?php echo WEB_PATH; ?>/cgdataserver/{{shop.id}}" >
       <img src="<?php echo G_UPLOAD_PATH; ?>/{{shop.thumb}}">
       </a>
       </li>
        <li class="revConR" id="timeloop{{shop.id}}">
                <a href="<?php echo WEB_PATH; ?>/cgdataserver/{{shop.id}}"><h4>(第{{shop.qishu}}期){{shop.title}}</h4></a>
                <h5>价值：{{shop.money}}</h5>
                <p name="pTime"><s></s>揭晓倒计时 <strong class="busytime" pattern="hh:mm:ss ms" time="{{shop.times}}">99 : 99 : 99</strong></p>
                <b class="fr z-arrow"></b>
         </li>
        <div class="rNowTitle">正在揭晓</div>
        </ul>
</script>


<script type="text/javascript">

var $datas = <?php echo json_encode($cglotterylist); ?>;

$("#divLottery").append(template('goodsListData', {list:$datas}))
$("#LoadDataA a").click(function(){

    $data = $("#LoadDataA a");
    $data.data("page",($data.data("page")|0) + 1)
    $data.data("page",$data.data("page")==1 ?　2 : $data.data("page"))

    if($data.data("maxpage") === undefined){
        $data.hide().eq(1).show()

        $.get(APP.WEB_PATH+'/'+APP.G_PARAM_URL+"/p"+$data.data("page"),function($datas){

                if($datas.cglotterylist.length < 12 ){
                    $data.data("maxpage",$data.data("page"))
                }

                $("#divLottery").append(template('goodListData_list', {list:$datas.cglotterylist}))
                $data.hide().eq(0).show()
        },"json")
    } else {
        $data.hide().eq(2).show()
    }
});


$.YunCmsApi.Loop({
    "timer"   : 15000,
    "callback": function($data){
            $data.times = (new Date().getTime() + ($data.times * 1000))
            $("#divLottery").prepend(template('goodListData_showtime', {shop:$data}));
            $("#timeloop"+$data.id+" .busytime").busytime({
                callback:function($dom){
                    $("#divLottery ul:first").html(template('goodListData_ok', {shop:$data}));                  
                }
            }).start();
    }
});
</script>

<!-- footer 开始-->
<?php include self::includes("index.footer"); ?>