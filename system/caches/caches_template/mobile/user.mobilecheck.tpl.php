<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php echo css("login"); ?>
<?php echo js("jquery.Validform.min"); ?>
<?php include self::includes("index.header_top"); ?>
        <section>
            <div class="registerCon">
                <ul>
                <form action="<?php echo WEB_PATH; ?>/member/user/mobilecheck/<?php echo $check_code; ?>" id="mobilecheckform" name="mobilecheckform"  method="post">
                    <li><input type="text"  id="mobileCode" name="checkcode" placeholder="请输入手机验证码" class="rText"/><s class="rs2"></s></li>
                    <input type="hidden" id="form-submit" name="submit" value="提交验证"/>
                    <li><a id="btnPostCode" class="nextBtn  orgBtn">确认，下一步</a></li>
                    <li style="font-size:12px;">如未收到验证短信，请在120秒后点击重新发送。</li>
                    <li><a id="btnGetCode" class="resendBtn grayBtn">重新发送</a></li>
                </form>  
                </ul>
            </div>
        </section>
<script type="text/javascript"> 
$(function(){
    var demo = $("#mobilecheckform").Validform({        
            tiptype:function(msg,o,cssctl){
                
            },
            ajaxPost:true,
            callback:function(data){                            
                if(data.defurl==null){
                    $.PageDialog.ok(data.string); 
                }else{
                    $.PageDialog.ok(data.string,function(){
                            location.href=data.defurl;
                    });             
                }               
            }
    }); 
}) 
$("#btnPostCode").click(function(){
    var flag=checkinputinfo();
    if(flag){       
        $("#mobilecheckform").submit();                    
    }
});
function  checkinputinfo(){
    var flag=true;
    var mobileCode= $.trim($("#mobileCode").val());
    if(mobileCode==''){
      $.PageDialog.ok("请填写验证码！"); 
        flag=false;
        return flag;
    }
        return flag;
      
} 
</script>       
<!-- footer 开始-->
<?php include self::includes("index.footer"); ?>
