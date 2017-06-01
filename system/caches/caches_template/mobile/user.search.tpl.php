<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php echo css("goods"); ?>
<?php echo js("jquery.cmsapi"); ?>
<?php echo js("template"); ?>
<?php echo js("template.fun"); ?>
<?php echo js("jquery.cartlist"); ?>
<?php include self::includes("index.header"); ?>
<!-- 栏目导航 开始-->
<!-- <?php include self::includes("index.navs"); ?> -->
<div style="width:100%;text-align: center; padding-top: 5px;">
<div style="margin:0 auto;width:100%;">
    <form style="width:100%;" action="<?php echo WEB_PATH; ?>/index/cloud_goods/search_goods" method="post">
        <input type="text" name="search_con" id="search_con" value="<?php echo $search_con;?>" style="width:80%;height: 30px;border:1px solid #ca0626" placeholder="请输入搜索内容" />
        <input type="submit" id="search_sub" name="search_sub" style="width:15%;height: 34px;border: 1px solid #ca0626;border-radius: 5px;box-shadow: 1px 1px 1px #ff7088 inset;background-color: #db3752;display: inline-block;color:white;" value="搜索"/>
    </form>
    </div>
</div>
<!-- 栏目导航 结束-->
<section class="goodsCon" style="background:#fff;">
    <!-- 列表 -->
    <div class="goodsList" id="goodsList">
        <?php if(is_array($cpgoodslist)) foreach($cpgoodslist AS $shop): ?>
        <ul>
            <li>
                <span class="z-Limg">
                    <a href="<?php echo WEB_PATH; ?>/cgoods/<?php echo $shop['id']; ?>"><img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $shop['g_thumb']; ?>"></a>
                </span>
                <div class="goodsListR">
                    <a href="<?php echo WEB_PATH; ?>/cgoods/<?php echo $shop['id']; ?>"><h2 ><?php echo $shop['g_title']; ?></h2></a>
                    <div class="pRate">
                        <div class="Progress-bar">
                            <p class="u-progress">
                                <span class="pgbar" style="width:<?php echo intval(width($shop['canyurenshu'],$shop['zongrenshu'],100)); ?>%;">
                                    <span class="pging"></span>
                                </span>
                            </p>
                            <ul class="Pro-bar-li">
                                <li class="P-bar01">
                                    <em><?php echo $shop['canyurenshu']; ?></em>已参与</li>
                                <li class="P-bar02">
                                    <em><?php echo $shop['zongrenshu']; ?></em>总需人次</li>
                                <li class="P-bar03">
                                    <em><?php echo $shop['zongrenshu']-$shop['canyurenshu']; ?></em>剩余</li>
                            </ul>
                        </div>
                        <a class="add " codeid="16901" onclick="gcartlist.gocartlist(<?php echo $shop['id']; ?>,'<?php echo WEB_PATH; ?>','<?php echo GetConfig('cookie_pre'); ?>')" href="javascript:;"><s></s></a>

                    </div>
                </div>
            </li>
        </ul>
        <?php endforeach; ?>
    </div>
        <!--  <div id="LoadDataA">
            <a class="loading" href="javascript:void(0)">点击加载更多</a>
            <a class="loading" href="javascript:void(0)" style="display:none;">正在加载...</a>
            <a class="loading" href="javascript:void(0)" style="display:none;">没有数据了</a>
            <a class="loading" href="javascript:void(0)" style="display:none;">已经到底了</a>
        </div> -->
</section>
<!-- footer 开始-->
<script id="goodsListData" type="text/html">
    {{each list as shop i}}
       <ul>
            <li>
                <span class="z-Limg">
                    <a href="<?php echo WEB_PATH; ?>/cgoods/{{shop.id}}"><img src="<?php echo G_UPLOAD_PATH; ?>/{{shop.g_thumb}}"></a>
                </span>
                <div class="goodsListR">
                    <a href="<?php echo WEB_PATH; ?>/cgoods/{{shop.id}}"><h2 >{{shop.g_title}}</h2></a>
                    <div class="pRate">
                        <div class="Progress-bar">
                            <p class="u-progress">
                                <span class="pgbar" style="width:{{null | width:shop.canyurenshu,shop.zongrenshu}};">
                                    <span class="pging"></span>
                                </span>
                            </p>
                            <ul class="Pro-bar-li">
                                <li class="P-bar01">
                                    <em>{{shop.canyurenshu}}</em>已参与</li>
                                <li class="P-bar02">
                                    <em>{{shop.zongrenshu}}</em>总需人次</li>
                                <li class="P-bar03">
                                    <em>{{shop.shenyurenshu}}</em>剩余</li>

                            </ul>
                        </div>
                       <a class="add" onclick="gcartlist.gocartlist({{shop.id}},'<?php echo WEB_PATH; ?>','<?php echo GetConfig('cookie_pre'); ?>')" href="javascript:;"><s></s></a>
                    </div>
                </div>
            </li>
        </ul>
    {{/each}}
</script>


<script type="text/javascript">
    $(document).ready(function(){

        $("#LoadDataA a").click(function(){
            $data = $("#LoadDataA a");
            $data.data("page",($data.data("page")|0) + 1)
            $data.data("page",$data.data("page")==1 ?　2 : $data.data("page"))
            if($data.data("maxpage") === undefined){
                $data.hide().eq(1).show()
                $.get(APP.G_WEB_PATH + "/index/cloud_goods/search_goods"+"/p"+$data.data("page"),function($datas){
                        //$($datas).each(function(index) {  })
                        if($datas.cpgoodslist.length < 20 ){
                            $data.data("maxpage",$data.data("page"))
                        }
                        $("#goodsList").append(template('goodsListData', {list:$datas.cpgoodslist}))
                        $data.hide().eq(0).show()
                },"json")
            } else {
                $data.hide().eq(2).show()
            }
        });


        //商品分类
        var dl=$("#divGoodsNav dl"),
                last=$("#divGoodsNav li:last"),
                first=$("#divGoodsNav dd:first");
        $("#divGoodsNav li:last a:first").click(function(){
            if(dl.css("display")=='none'){
                dl.show();
                last.addClass("gSort");
                first.addClass("sOrange");
            }else{
                dl.hide();
                last.removeClass("gSort");
                first.removeClass("sOrange");
            }
        });

    });
</script>
<?php include self::includes("index.footer"); ?>