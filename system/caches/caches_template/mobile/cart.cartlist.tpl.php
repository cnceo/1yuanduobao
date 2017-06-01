<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php echo js("jquery.cmsapi"); ?>
<?php echo js("jquery.pageDialog"); ?>
<?php echo css("help"); ?>
<?php include self::includes("index.header_top"); ?>
<script type="text/javascript">
    $.YunCmsApi.SetTopStyle({
        "Title":"购物车",
        "Home":true,
        "Shop":true
    }); 
</script>
<section class="clearfix g-Cart">
    <?php if($shoplist): ?>
    <article class="clearfix m-round g-Cart-list">        
    <ul id="cartBody">      
        <?php if(is_array($shoplist)) foreach($shoplist AS $shops): ?>      
        <li   id="shoplist<?php echo $shops['id']; ?>">                   
            <a class="fl u-Cart-img" href="<?php echo WEB_PATH; ?>/cgoods/<?php echo $shops['id']; ?>">
                <img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $shops['g_thumb']; ?>" border="0" alt=""/>
            </a>
            <div class="u-Cart-r">
                <p class="z-Cart-tt"><a href="<?php echo WEB_PATH; ?>/cgoods/<?php echo $shops['id']; ?>" class="gray6">(第<?php echo $shops['qishu']; ?>期)<?php echo $shops['g_title']; ?></a></p>
                <ins class="z-promo gray9">剩余<em class="arial"><?php echo $shops['cart_shenyu']; ?></em>人次  </ins>
                <p class="gray9">总共<?php echo L('html.key'); ?>：
                <em class="arial cart_xiaoji"><?php echo $shops['cart_xiaoji']/$shops['price']; ?></em>
                人次/<em class="orange arial"><?php echo $shops['price']; ?> <?php echo L('cgoods.currency'); ?></em></p>
                <p class="f-Cart-Other">
                    <a href="javascript:;" class="fr z-del" name="delLink" onclick="delcartlist(<?php echo $shops['id']; ?>)"  ></a>
                    <a href="javascript:;"  val="<?php echo $shops['id']; ?>"  class="fl z-jian z-jiandis" >-</a>                 
                    <input id="txtNum17145" val="<?php echo $shops['id']; ?>" onkeyup="value=value.replace(/\D/g,'')" name="num" type="text" value="<?php echo $shops['cart_gorenci']; ?>" class="fl z-amount" />
                    <a href="javascript:;"  val="<?php echo $shops['id']; ?>"  class="fl z-jia ">+</a>
                    <input type="hidden" value="1" />
                    <input type="hidden" value="0" />
                </p>
                <p class="message"></p>             
            </div>
        </li>
        <?php endforeach; ?>                               
        </ul>       
    </article>   
    <div id="divBtmMoney" class="g-Total-bt"><p>合计金额：<span class="orange arial" id="moenyCount"><?php echo $MoenyCount; ?></span> 
    <?php echo L('cgoods.currency'); ?></p><a  href="javascript:;"  id="but_ok"  class="orgBtn">结 算</a>
    </div>
    <?php endif; ?>
    <div id="divNone" class="haveNot z-minheight" style="display:none;"><s></s><p>抱歉，您的购物车没有商品记录！</p></div>  
    <?php if(!$shoplist): ?>
    <script type="text/javascript"> 
        $('#divNone').show();
    </script>       
    <?php endif; ?> 
</section>
<script type="text/javascript"> 
var info=<?php echo $Cartshopinfo; ?>;
var numberadd=$(".z-jia");
var numbersub=$(".z-jian");
var xiaoji=$(".cart_xiaoji");
var num=$(".z-amount");
var message=$(".message");
var moenyCount=$("#moenyCount");
var cookie_pre="<?php echo GetConfig('cookie_pre'); ?>";//cookie配置前缀  
$(function(){
    $("#but_ok").click(function(){
        var countmoney=parseInt(moenyCount.text());     
        if(countmoney > 0){         
            $.cookie(cookie_pre+'Cartlist',$.toJSON(info),{expires:7,path:'/'});
            document.location.href='<?php echo WEB_PATH; ?>/member/cart/pay/'+new Date().getTime();
        }else{
            alert("购物车为空!");
        }
    });
});
function UpdataMoney(shopid,number,zindex){     
        var number = parseInt(number);
        info['MoenyCount']=info['MoenyCount']-info[shopid]['money']*info[shopid]['num']+info[shopid]['money']*number;
        info[shopid]['num']=number;
        var xjmoney=xiaoji.eq(zindex);
            xjmoney.text(number);
            moenyCount.text(info['MoenyCount']+'.00');
            $(".sumshop").text(number);
}

function delcartlist(id){
    $.PageDialog.confirm('您确定要删除吗？',function(){
        info['MoenyCount'] = info['MoenyCount']-info[id]['money']*info[id]['num'];
        $("#shoplist"+id).hide();
        $("#moenyCount").text(info['MoenyCount']+".00");
        var CartTotal=$("#sCartTotal").text();
        var DelCartTotal=parseInt(CartTotal)-1;
            if(DelCartTotal&&DelCartTotal!=0){      
                $("#sCartTotal").show();
                $("#sCartTotal").text(DelCartTotal);    
            }else{
                $("#sCartTotal").hide();
            }   
        delete info[id];
            if(info['MoenyCount']==0){
                $('#divNone').show();
                $('#divBtmMoney').hide();
            }
        $.cookie(cookie_pre+'Cartlist',$.toJSON(info),{expires:30,path:'/'});   
    
    });

}

num.keyup(function(){
    var shopid=$(this).attr("val");
    var zindex=num.index(this); 
    if($(this).val() > info[shopid]['shenyu']){
        message.eq(zindex).text("<?php echo L('html.key'); ?>次数不能超过"+info[shopid]['shenyu']+"次");      
        $(this).val(info[shopid]['shenyu']);
        UpdataMoney(shopid,$(this).val(),zindex);       
        return;
    }
    if($(this).val()<1){
        message.eq(zindex).text("<?php echo L('html.key'); ?>次数不能少于1次");
        $(this).val(1);
        UpdataMoney(shopid,$(this).val(),zindex);
        return;
    }   
    UpdataMoney(shopid,$(this).val(),zindex);   
});
numberadd.click(function(){
    var shopid=$(this).attr('val');     
    var zindex=numberadd.index(this);
    var thisnum=num.eq(zindex); 
        if(info[shopid]['num'] >= info[shopid]['shenyu']){
            message.eq(zindex).text("<?php echo L('html.key'); ?>次数不能超过"+info[shopid]['shenyu']+"次");
            return;
        }
        var number=info[shopid]['num']+1;           
            thisnum.val(number);
            UpdataMoney(shopid,number,zindex);
});
numbersub.click(function(){
    var shopid=$(this).attr('val');     
    var zindex=numbersub.index(this);
    var thisnum=num.eq(zindex); 
        if(info[shopid]['num'] <=1){
            message.eq(zindex).text("<?php echo L('html.key'); ?>次数不能少于1次");
            return;
        }
        var number=info[shopid]['num']-1;           
            thisnum.val(number);
            UpdataMoney(shopid,number,zindex);
});
</script> 
<!-- footer 开始-->
<?php include self::includes("index.footer"); ?>
