<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php echo js("jquery.cmsapi"); ?>
<?php echo js("jquery.pageDialog"); ?>
<?php echo css("help"); ?>
<?php include self::includes("index.header_top"); ?>
<script type="text/javascript">
    $.YunCmsApi.SetTopStyle({
        "Title":"结算支付",
        "Home":true,
        "Member":false,
        "Shop":true
    }); 
</script>
<section class="clearfix g-pay-lst" style="background:#fff">
    <ul>
        <?php if(is_array($shoplist)) foreach($shoplist AS $shops): ?>      
        <li>
            <a href="<?php echo WEB_PATH; ?>/cgoods/<?php echo $shops['id']; ?>" class="gray6">(第<?php echo $shops['qishu']; ?>期)<?php echo $shops['g_title']; ?></a>
            <span>
                <em class="orange arial"><?php echo $shops['cart_gorenci']; ?></em>人次/<em class="orange arial"><?php echo $shops['price']; ?> <?php echo L('cgoods.currency'); ?></em>
            </span>
        </li>   
        <?php endforeach; ?>               
    </ul>
    <p class="g-pay-Total gray9">合计：<span class="orange arial Fb F16"><?php echo $MoenyCount; ?></span> <?php echo L('cgoods.currency'); ?></p>
    <p class="g-pay-bline"></p>
</section>

<form id="form_paysubmit" action="<?php echo WEB_PATH; ?>/<?php echo ROUTE_M; ?>/<?php echo ROUTE_C; ?>/paysubmit" method="post">
<section class="clearfix g-Cart">
    <article class="clearfix m-round g-pay-ment">
        <ul id="ulPayway">      
            <li class="gray6 z-pay-ff z-pay-grayC">
             <?php if($fufen_dikou): ?>
             <i id="spPoints" class="z-pay-ment" sel="0"></i>
            <span>
            <input type="hidden" class="input_choice" id="shop_score" name="shop_score" value="1"/>
            您的<?php echo L('cgoods.credit'); ?>:<?php echo $member['score']; ?>
            </span>     
             <?php endif; ?>            
            </li>           
            <li class="gray6 z-pay-ye z-pay-grayC" >
             <input type="hidden" maxlength="8" class="pay_input_text_gray" id="shop_score_num" value="0" money="<?php echo $fufen_yuan; ?>" name="shop_score_num"/>
            </li> 
            
            <li class="gray6 z-pay-ye z-pay-grayC" >
            <i id="spBalance" class="z-pay-ment" sel="0"></i>           
                <a href="<?php echo WEB_PATH; ?>/member/account/userrecharge" class="z-pay-Recharge userrecharge" style="display:none;">去充值</a>
                <input type="hidden" name="moneycheckbox" id="MoneyCheckbox" class="input_choice" checked="">
                <span>账户余额：<?php echo $member['money']; ?> <?php echo L('cgoods.currency'); ?></span>          
            </li> 
        </ul>
    </article>

    <article id="divBankList" class="clearfix mt10 m-round g-pay-ment g-bank-ct">
        <ul id="ulBankList">
            <li class="gray6 paylistli" id="pay_click">
            <s class="z-arrow z-arrow-open"></s>
            <em>支付平台支付</em>
            <input name="money" id="pay_Money" type="hidden" value=""></li>
            <?php if($paylist): ?>
            <div id="pay_list" class="payclass" style="display:block;">
            <input type="hidden" value="<?php echo $paylist['0']['pay_id']; ?>" name="account" id="paylist_account">
            <?php if(is_array($paylist)) foreach($paylist AS $key=>$pay): ?>
            <li class="gray6" >         
            <i class="z-bank-Round <?php if($key=='0'): ?> z-bank-Roundsel <?php endif; ?>" payaccount="<?php echo $pay['pay_id']; ?>"><s></s></i><?php echo $pay['pay_name']; ?>
            </li>
            <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </ul>   
        <?php if(findconfig('base','pay_bank_type')): ?>  
        <ul id="ulBankList">
        <li class="gray6 paylistli">
        <s class="z-arrow z-arrow-close" id="paybank_click"></s>
        选择<em>银行</em>充值</li>
        <div id="paybank_list" class="payclass" style="display:none;">
        <input name="pay_bank" id="pay_bank"    type="hidden"  value="">
        <input name="account"  id="pay_bankway" type="hidden"  value="" />
        <?php if(findconfig('base','pay_bank_type')=='tenpay'): ?>
            <li class="gray9" payway="tenpay" urm="CMBCHINA-WAP"><i class="z-bank-Round"><s></s></i>招商银行            
            </li>
            <li class="gray9" payway="tenpay" urm="ICBC-WAP"><i class="z-bank-Round"><s></s></i>工商银行</li>
            <li class="gray9" payway="tenpay" urm="CCB-WAP"><i class="z-bank-Round"><s></s></i>建设银行</li>
        <?php endif; ?>
        <?php if(findconfig('base','pay_bank_type')=='yeepay'): ?>
            <li class="gray9" payway="yeepay" urm="CMBCHINA-WAP"><i class="z-bank-Round"><s></s></i>招商银行</li>
            <li class="gray9" payway="yeepay" urm="ICBC-WAP"><i class="z-bank-Round"><s></s></i>工商银行</li>
            <li class="gray9" payway="yeepay" urm="CCB-WAP"><i class="z-bank-Round"><s></s></i>建设银行</li>
        <?php endif; ?>
        <?php if(findconfig('base','pay_bank_type')=='cbpay'): ?>
            <li class="gray9" payway="cbpay" urm="cbpay1025"><i class="z-bank-Round"><s></s></i>招商银行</li>
            <li class="gray9" payway="cbpay" urm="cbpay105"><i class="z-bank-Round"><s></s></i>工商银行</li>
            <li class="gray9" payway="cbpay" urm="cbpay103"><i class="z-bank-Round"><s></s></i>建设银行</li>
        <?php endif; ?>
        </div>
        <?php endif; ?>
        </ul>
    </article>
    <div class="g-Total-bt">
        <input type="hidden" name="submitcode" value="<?php echo $submitcode; ?>">
        <input type="submit" style=" background: #db3752;border: 1px solid #db3752;" name="submit"  class="orgBtn" value="确认支付">        
    </div>
</section>
</form> 
<!-- footer 开始-->
<script>
$(function() {
    $(".clearfix ul .paylistli").each(function(i) {
        var dlist = $(this);
        dlist.parent(".payclass").hide();   
        dlist.click(function() {
            var fs = dlist.find("s");
            if (fs.hasClass("z-arrow-close"))
            {
                fs.removeClass("z-arrow-close");        
                fs.addClass("z-arrow-open");
                dlist.siblings(".payclass").show();
            }
            else
            {  
                fs.removeClass("z-arrow-open");     
                fs.addClass("z-arrow-close");
                dlist.siblings(".payclass").hide();                         
            }       
        });         
    });
}); 

$(".payclass > li").click(function(){
    $("li.gray9,li.gray6").find("i").removeClass("z-bank-Roundsel");
    $(this).find("i").addClass("z-bank-Roundsel");
    if ( $(this).find("i").attr("payaccount") )
    {
        $("#paylist_account").val($(this).find("i").attr("payaccount"));    
    }
    if ( $(this).attr("urm") )
    {
        $("#pay_bankway").val($(this).attr("urm")); 
        $("#pay_bank").val($(this).attr("payway")); 
    }
});

$( function() {
    var info = {'money':<?php echo $member['money']; ?>,'MoenyCount':<?php echo $MoenyCount; ?>,"shoplen":<?php echo $shoplen; ?>};
    var MoneyCheckbox = $("#MoneyCheckbox");
    var p = $("#spBalance");
    if ( info['money'] >= info['MoenyCount'] )
    {
        $("#divBankList").hide();
        $("#liPayByOther").hide();
        $("#pay_money").text(info['MoenyCount']+'.00');
        MoneyCheckbox.attr("checked","1");
        p.attr("sel","1").attr("class", "z-pay-mentsel");       
        p.click( function( y ) {
            if ( p.attr("sel") == '0' )
            {         
                MoneyCheckbox.attr("checked","1");
                $("#pay_money").text(info['money']+'.00');
                $("#pay_bankmoney").text(info['MoenyCount']-info['money']+'.00');
                $("#divBankList").hide();
                p.parent().removeClass("z-pay-grayC");
                p.attr("sel","1").attr("class", "z-pay-mentsel").next("span").html('余额支付<em class="orange">dfsdf.00</em>元（账户余额：dsfsdf 元）');
            }
            else
            {
                $("#pay_money").text('0.00');
                $("#pay_bankmoney").text(info['MoenyCount']+'.00'); 
                $("#divBankList").show();
                MoneyCheckbox.attr("checked",false);
                MoneyCheckbox.attr("disabled",true);                
                p.attr("sel","0").attr("class", "z-pay-ment").next("span").html('余额支付<em class="orange">0.00</em>元（账户余额：fhgfh元）');
            }
        });         
    }
    if ( info['money'] < info['MoenyCount'] )
    {
       if ( info['money'] == 0 )
       {
            $("#liPayByBalance").addClass("point_gray");
            MoneyCheckbox.attr("checked",false);
            MoneyCheckbox.attr("disabled",true);             
       }
       else
       {
            MoneyCheckbox.attr("checked","1");
            $("#pay_money").text(info['money']+'.00');
            $("#pay_bankmoney").text(info['MoenyCount']-info['money']+'.00');
            p.click( function( y ) {            
                if ( p.attr("sel") == '0' )
                {
                    MoneyCheckbox.attr("checked","1");
                    $("#pay_money").text(info['money']+'.00');
                    $("#pay_bankmoney").text(info['MoenyCount']-info['money']+'.00');
                    p.parent().removeClass("z-pay-grayC");
                    p.attr("sel","1").attr("class", "z-pay-mentsel").next("span").html('余额支付<em class="orange">dfsdf.00</em>元（账户余额：dsfsdf 元）');
                }
                else
                {
                    $("#pay_money").text('0.00');
                    $("#pay_bankmoney").text(info['MoenyCount']+'.00');         
                    MoneyCheckbox.attr("checked",false);
                    MoneyCheckbox.attr("disabled",true);       
                    p.attr("sel","0").attr("class", "z-pay-ment").next("span").html('余额支付<em class="orange">0.00</em>元（账户余额：fhgfh元）');
                }
            });                   
       }
    }
    
    $("#submit_ok").click( function() {
        if ( ! this.cc )
        {
            this.cc = 1;        
            return true;
        }
        else
        {      
            return false;
        }       
        return false;
    });
    
    var fufen = $("#shop_score_num");    
    fufen.keyup( function() {
        if ( fufen.val() > <?php echo $fufen_dikou; ?> )
        {
            fufen.val(<?php echo $fufen_dikou; ?>);        
        }
        if ( isNaN( fufen.val() ) )
        {
            fufen.val(0);                         
        }
        if ( fufen.val() < 0 )
        {
            fufen.val(0);       
        }
        fufen.blur( function() {
            var fufen = parseInt($(this).val());
            var money = parseInt($(this).attr("money"));
            $(this).val(Math.floor(fufen/money)*money);         
        });        
    });     
    
    $(".click_img li>img").click( function() {
        $(this).prev().attr("checked",'checked');
    }); 
});

</script>
<?php include self::includes("index.footer"); ?>