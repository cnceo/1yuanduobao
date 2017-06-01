<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php echo css("login"); ?>
<?php echo js("jquery.Validform.min"); ?>
<?php echo js("jquery.pageDialog"); ?>
<?php include self::includes("index.header_top"); ?>
<section>
<div class="login_layout">
    <div class="login_title">
        <h2>设置密码</h2>
    </div>
    <div class="registerCon">
    <form class="registerform" id="registerform" method="post" action="<?php echo WEB_PATH; ?>/member/finduser/resetpassword">
        <ul>
            <input name="ok" type="hidden" id="ok" value="ok">
        <input name="hidKey" type="hidden" id="hidKey" value="<?php echo $key; ?>">
        <p class="Ptxt_F14">请重新设置您的登录密码，您的帐号是：<span class="orange Fb"><?php echo $checkcode['0']; ?></span></p>
        <li>
            <dt>输入密码：<input name="userpassword" plugin="passwordStrength" datatype="*6-20" nullmsg="密码不能为空！" errormsg="密码范围在6~20位之间！"  type="password" class="lPwd" maxlength="20"></dt>

        </li>

        <li>
            <dt>确认密码：<input name="userpassword2" recheck="userpassword" sucmsg=" " datatype="*6-20" nullmsg="请再输入一次密码！" errormsg="您两次输入的账号密码不一致！" id="NewPassAgain" type="password" class="lPwd" maxlength="20"></dt>

        </li>
        <li>
            <a  id="btnLogin"  class="nextBtn orgBtn" >确认修改</a>
        </li>
        </ul>
    </form>
    </div>
</div>
</section>
<script type="text/javascript">
$(function(){       

    $("#btnLogin").click(function(){

        $("#registerform").submit();
    });
})

</script>

<!-- footer 开始-->
<?php include self::includes("index.footer"); ?>