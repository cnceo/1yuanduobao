<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php echo css("user.message"); ?>
<?php include self::includes("index.header"); ?>
<div class="clear"></div>
<!--商品 wrap 开始-->
<div class="layout980 clearfix">
<?php include self::includes("user.left"); ?>
<script>
$(function() {
    var je = $("#ulMoneyList li");
    var dx = /\D/;
    je.click(function() {
        je.removeClass("selected");
        je.find("input").removeAttr("checked");
        var radio = je.index(this);
        je.eq(radio).find("input").attr('checked','checked');
        je.eq(radio).addClass("selected");
        var valx = je.eq(radio).find("input").val();
        $("#Money").text(valx);
        $("#hidMoney").val(valx);
    });
    var tel = $("#txtOtherMoney").val();
    $("#txtOtherMoney").keyup(function() {
        if ( dx.test( $("#txtOtherMoney").val() ) )
        {
            $("#txtOtherMoney").val( tel );
        }
        else
        {
            tel = $("#txtOtherMoney").val();
        }
        $("#Money").text( tel );
        $("#hidMoney").val( tel );
    });
})
</script>
<!--个人中心中间 开始-->
<form id="toPayForm" name="toPayForm" action="<?php echo WEB_PATH; ?>/member/cart/addmoney" method="post" target="_blank">   
    <div class="R-content">
        <div class="member-t"><h2>账户充值</h2></div>
        <div class="select">
            <b class="gray01">请您选择充值金额</b>
            <ul id="ulMoneyList">
                <li class="selected" style="margin-left:0;"><input type="radio" id="rd10" name="money" value="10" checked="checked"> <label for="rd10">充值 <strong>￥</strong><b>10</b></label></li>
                <li><input type="radio" name="money" value="50" id="rd50"> <label for="rd50">充值 <strong>￥</strong><b>50</b></label></li>
                <li><input type="radio" name="money" value="100" id="rd100"> <label for="rd100">充值 <strong>￥</strong><b>100</b></label></li>
                <li><input type="radio" name="money" value="200" id="rd200"> <label for="rd200">充值 <strong>￥</strong><b>200</b></label></li>
                <li class="custom"><input type="radio" value="0" name="money" id="rdOther"> <label for="rdOther">其它金额</label><input value="" id="txtOtherMoney" type="text" class="enter" maxlength="7"></li>
            </ul>
        </div>
        <div class="charge_money_list">
            <p class="title gray01">请选择支付方式</p>
            <!-- 银行平台 start>
    <?php if(findconfig('base','pay_bank_type')): ?>
    <p class="leix">银行支付：</p>  
    <div class="pay_bankR" style="display:block;">      
    <?php if(findconfig('base','pay_bank_type')=='tenpay'): ?>
            <ul class="click_img">
                <input type="hidden" name="pay_bank" value="tenpay"  />
                <li><input type="radio" value="CMB" name="account" checked="checked" /><label for="bankType1001"><span class="zh_bank"></span></label></li>
                <li><input type="radio" value="ICBC" name="account"/><label for="bankType1002"><span class="gh_bank"></span></label></li>
                <li><input type="radio" value="CCB" name="account" /><label for="bankType1003"><span class="jh_bank"></span></label></li>
                <li><input type="radio" value="ABC" name="account" /><label for="bankType1005"><span class="nh_bank"></span></label></li>
                <li><input type="radio" value="SPDB" name="account" /><label for="bankType1004"><span class="pf_bank"></span></label></li>   
                    
                <li><input type="radio" value="SDB" name="account" /><label for="bankType1008"><span class="sf_bank"></span></label></li>
                <li><input type="radio" value="CIB" name="account" /><label for="bankType1009"><span class="xy_bank"></span></label></li>
                <li><input type="radio" value="BOB" name="account" /><label for="bankType1032"><span class="bj_bank"></span></label></li>
                <li><input type="radio" value="CEB" name="account" /><label for="bankType1022"><span class="gd_bank"></span></label></li>
                <li><input type="radio" value="CMBC" name="account" /><label for="bankType1006"><span class="ms_bank"></span></label></li>
                    
                <li><input type="radio" value="CITIC" name="account" /><label for="bankType1021"><span class="zx_bank"></span></label></li>
                <li><input type="radio" value="GDB" name="account" /><label for="bankType1027"><span class="gf_bank"></span></label></li>
                <li><input type="radio" value="PAB" name="account" /><label for="bankType1010"><span class="pa_bank"></span></label></li>
                <li><input type="radio" value="BOC" name="account" /><label for="bankType1052"><span class="zg_bank"></span></label></li>
                <li><input type="radio" value="COMM" name="account"/><label for="bankType1020"><span class="jt_bank"></span></label></li>
            </ul>           
    <?php endif; ?>
    <?php if(findconfig('base','pay_bank_type')=='yeepay'): ?>        
            <ul class="bank_logo yeepay_bank click_img">
            <input type="hidden" name="pay_bank" value="yeepay" />
            <li><input type="radio" value="ICBC-NET-B2C" name="account" checked="checked" /><label for="bankType1002"><span class="gh_bank"></span></label></li>
            <li><input type="radio" value="CCB-NET-B2C" name="account" /><label for="bankType1003"><span class="jh_bank"></span></label></li>
            <li><input type="radio" value="ABC-NET-B2C" name="account"  /><label for="bankType1005"><span class="nh_bank"></span></label></li>
            <li><input type="radio" value="CMBCHINA-NET-B2C" name="account" /><label for="bankType1005"><span class="zh_bank"></span></label></li>
            <li><input type="radio" value="BOC-NET-B2C" name="account" /><label for="bankType1052"><span class="zg_bank"></span></label></li>
            <li><input type="radio" value="BOCO-NET-B2C" name="account" /><label for="bankType1052"><span class="jt_bank"></span></label></li>
            
            
            <li><input type="radio" value="CEB-NET-B2C" name="account" /><label for="bankType1022"><span class="gd_bank"></span></label></li>
            <li><input type="radio" value="GDB-NET-B2C" name="account" /><label for="bankType1027"><span class="gf_bank"></span></label></li>
            <li><input type="radio" value="POST-NET-B2C" name="account" /><label for="bankType1027"><span class="yz_bank"></span></label></li>
            <li><input type="radio" value="CMBC-NET-B2C" name="account" /><label for="bankType1006"><span class="ms_bank"></span></label></li>
            <li><input type="radio" value="PINGANBANK-NET" name="account" /><label for="bankType1006"><span class="pa_bank_bank"></span></label></li>
            <li><input type="radio" value="BCCB-NET-B2C" name="account" /><label for="bankType1006"><span class="bj_bank"></span></label></li>
            </ul> 
    <?php endif; ?> 
    <?php if(findconfig('base','pay_bank_type')=='cbpay'): ?>
    <p >        
    <div class="tab_btn">
    <li><a id="btnCXK" class="tab_btn_hover" href="javascript:;">储蓄卡支付</a>|
    <a id="btnXYK" href="javascript:;" class="">信用卡支付</a></li>
    </div>
    </p>            
            <ul id="divbtnCXK"    style="border-bottom:1px dashed #e6e7e8;">
                <input type="hidden" name="pay_bank" value="cbpay"  />
                <li><input type="radio" value="cbpay1025" name="account" checked="checked" /><label for="bankType1002"><span class="gh_bank"></span></label></li>
                <li><input type="radio" value="cbpay105" name="account" /><label for="bankType1003"><span class="jh_bank"></span></label></li>
                <li><input type="radio" value="cbpay103" name="account"  /><label for="bankType1005"><span class="nh_bank"></span></label></li>
                <li><input type="radio" value="cbpay3080" name="account" /><label for="bankType1005"><span class="zh_bank"></span></label></li>             
                <li><input type="radio" value="cbpay104" name="account" /><label for="bankType1052"><span class="zg_bank"></span></label></li>
                <li><input type="radio" value="cbpay301" name="account" /><label for="bankType1052"><span class="jt_bank"></span></label></li>
                <li><input type="radio" value="cbpay312" name="account" /><label for="bankType1022"><span class="gd_bank"></span></label></li>
                <li><input type="radio" value="cbpay3061" name="account" /><label for="bankType1027"><span class="gf_bank"></span></label></li>                                 
                <li><input type="radio" value="cbpay3230" name="account" /><label for="bankType1027"><span class="yz_bank"></span></label></li> 
                <li><input type="radio" value="cbpay305" name="account" /><label for="bankType1006"><span class="ms_bank"></span></label></li>
                <li><input type="radio" value="cbpay307" name="account" /><label for="bankType1006"><span class="pa_bank"></span></label></li>
                <li><input type="radio" value="cbpay310" name="account" /><label for="bankType1006"><span class="bj_bank"></span></label></li>                      
                <li><input type="radio" value="cbpay309" name="account" /><label for="bankType1006"><span class="xy_bank"></span></label></li>                      
                <li><input type="radio" value="cbpay313" name="account" /><label for="bankType1006"><span class="zx_bank"></span></label></li>                      
                <li><input type="radio" value="cbpay314" name="account" /><label for="bankType1006"><span class="pf_bank"></span></label></li>                                          
            </ul> 

            <ul  id="divbtnXYK" style="border-bottom:1px dashed #e6e7e8;display:none;">
                <input type="hidden" name="pay_bank" value="cbpay"  />
                <li><input type="radio" value="cbpay106" name="account" checked="checked" /><label for="bankType1002"><span class="zg_bank"></span></label></li>
                <li><input type="radio" value="cbpay1054" name="account" /><label for="bankType1003"><span class="jh_bank"></span></label></li>
                <li><input type="radio" value="cbpay1031" name="account"  /><label for="bankType1005"><span class="nh_bank"></span></label></li>
                <li><input type="radio" value="cbpay308" name="account" /><label for="bankType1005"><span class="zh_bank"></span></label></li>                              
                <li><input type="radio" value="cbpay3231" name="account" /><label for="bankType1027"><span class="yz_bank"></span></label></li> 
                <li><input type="radio" value="cbpay3051" name="account" /><label for="bankType1006"><span class="ms_bank"></span></label></li>         
                <li><input type="radio" value="cbpay3071" name="account" /><label for="bankType1006"><span class="pa_bank"></span></label></li>         
                <li><input type="radio" value="cbpay334" name="account" /><label for="bankType1006"><span class="qd_bank"></span></label></li>              
                <li><input type="radio" value="cbpay301" name="account" /><label for="bankType1022"><span class="jt_bank"></li>
                <li><input type="radio" value="cbpay3121" name="account" /><label for="bankType1022"><span class="gd_bank"></span></label></li>
                <li><input type="radio" value="cbpay306" name="account" /><label for="bankType1027"><span class="gf_bank"></span></label></li>          
                <li><input type="radio" value="cbpay3091" name="account" /><label for="bankType1027"><span class="xy_bank"></span></label></li>         
                <li><input type="radio" value="cbpay3131" name="account" /><label for="bankType1027"><span class="zx_bank"></span></label></li>         
                <li><input type="radio" value="cbpay3141" name="account" /><label for="bankType1027"><span class="pf_bank"></span></label></li>         
                <li><input type="radio" value="cbpay3112" name="account" /><label for="bankType1027"><span class="hx_bank"></span></label></li>         
            </ul>   
    <?php endif; ?>
        </div-->
    <?php endif; ?>
    <!-- 银行平台 end -->
            <p class="leix">支付平台支付：</p>
            <ul class="payment yeepay_click">
            <?php if($paylist): ?>
            <?php if(is_array($paylist)) foreach($paylist AS $pay): ?>
                <li>
                    <input checked="checked" type="radio" value="<?php echo $pay['pay_id']; ?>" name="account">
                    <img style="border:1px solid #eee; padding:1px; margin-right:20px;" height="35px" width="100px" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $pay['pay_thumb']; ?>">
                </li>
            <?php endforeach; ?>
            <?php endif; ?>
            </ul>
            <p class="much">应付金额：<span class="yf c_red"><strong>￥</strong><span id="Money">10</span></span></p>
            <h6>            
                <input type="hidden" id="hidPayName" name="payName" value="">
                <input type="hidden" id="hidPayBank" name="payBank" value="0">
                <input type="hidden" id="hidMoney" name="money" value="10">
                <input id="submit_ok" class="bluebut imm" type="submit" name="submit" value="立即充值" title="立即充值">    
            </h6>
            </form>
            <div id="payAltBox" style="display:none;">
                <div class="prompt_box">
                    <p class="pic"><em></em>请您在新开的页面上完成支付！</p>
                    <p class="ts">付款完成之前，请不要关闭本窗口！<br>完成付款后跟据您的个人情况完成此操作！</p>
                    <ul>
                        <li><a href="" class="look" title="查看充值记录">查看充值记录 </a></li>
                        <li><a href="javascript:gotoClick();" class="look" id="btnReSelect" title="重选支付方式">重选支付方式</a></li>
                    </ul>
                </div>
            </div>
        </div>      
    </div>
    <!--个人中心中间 结束-->
</div>
<!--商品 wrap 结束-->

<div class="clear"></div>
<script>
$(document).ready(function() {
    $("#btnCXK").click(function() {
        $("#divbtnXYK").hide();
        $("#divbtnCXK").show();
        $("#btnXYK").removeClass("tab_btn_hover");
        $("#btnCXK").addClass("tab_btn_hover");
    });
    $("#btnXYK").click(function() {
        $("#divbtnCXK").hide();
        $("#divbtnXYK").show();
        $("#btnCXK").removeClass("tab_btn_hover");
        $("#btnXYK").addClass("tab_btn_hover");
    });
});
</script>
<?php include self::includes("index.footer"); ?>