<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php echo css("user.message"); ?>
<?php include self::includes("index.header"); ?>
<div class="clear"></div>
<!--商品 wrap 开始-->
<div class="layout980 clearfix">
    <?php include self::includes("user.left"); ?>
<div class="R-content">

<div class="prompt orange">申请分销资格，获取推广收益！<s></s></div>
<div class="info">
    <form class="registerform" method="post" action="">
        <table border="0" cellpadding="0" cellspacing="8">
            <tbody>
            <tr>
                <td>
                    <a href="<?php echo WEB_PATH; ?>/member/distributor/apply&apply=1" title="我要申请">我要申请</a>
                </td>
            </tr>
            </tbody>
        </table>
    </form> 
    </div>
</div>
</div>
<!--商品 wrap 结束-->
<div class="clear"></div>
<script type="text/javascript">
showLen(document.getElementById("qianming"));
function showLen(obj){
    if(140-obj.value.length<0){
        return; 
    }else{
        document.getElementById('shuru').innerHTML = '还能输入'+ (100-obj.value.length) +'个字符';
    }
}
</script>
<script>
    $("#nicxx").blur(function(){
        var ss= $("#nicxx").val();
        if(!ss.match(/([\u4e00-\u9fa5]{2,7})|([A-Za-z0-9 ]{2,7})/)){
          $(".Validform_checktip").css("display","block");
          $(".bluebut").attr("alt","cur");
        }else{
          $(".Validform_checktip").css("display","none");
          $(".bluebut").attr("alt","");
        }
    })
    $(".bluebut").click(function(){
        if( $(this).attr("alt")== "cur"){
          return false;
        }
    })
</script>
<?php include self::includes("index.footer"); ?>