<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php include self::includes("index.headertop"); ?>
<div class="clear"></div>
<!--商品 wrap 开始-->
<div class="shop_payment">
        <ul class="payment">
           <li class="first_step">第一步：提交订单</li>
            <li class="arrow_2"></li>
            <li class="secend_step">第二步：网银支付</li>
            <li class="arrow_1"></li>
            <li class="third_step orange_Tech">第三步：支付成功 等待揭晓</li>
            <li class="arrow_3"></li>
            <li class="fourth_step">第四步：揭晓获得者</li>
        </ul>
        <div id="divResult" class="wait_list hidden" style="display: block;">
            <div class="wait_list_tips ">
            <dl>
                <!--<dt><img src="images/login_exp04.png" border="0" alt=""></dt>-->
                <dd><h2 class="c_red Fb">恭喜您，支付成功！请等待系统为您揭晓！</h2>
                    <p>您现在可以<a href="<?php echo WEB_PATH; ?>/member/shop/userbuylist" class="blue">查看夺宝记录</a>或<a href="<?php echo WEB_PATH; ?>" class="blue">继续购物</a></p>
                    <!-- <p>总共成功参与夺宝1件商品，信息如下：</p> -->
                </dd>
            </dl>
            </div>
        </div>        
</div>
<!--商品 wrap 结束-->
<div class="clear"></div>
<?php include self::includes("index.footer"); ?>