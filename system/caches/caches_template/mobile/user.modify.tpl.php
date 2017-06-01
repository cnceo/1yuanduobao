<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php echo js("jquery.cmsapi"); ?>
<?php include self::includes("index.header_top"); ?>
<script type="text/javascript">
    $.YunCmsApi.SetTopStyle({
        "Title":"个人资料",
        "Member":true,
        "Home":true
    });
</script>

<style type="text/css">
    .m-member-nav { text-align: center;color:#999; }
    .ress_btn {
        line-height: 35px;       
        text-align: center;
        color: #fff;
        border: 1px solid #ca0626;
        display: inline-block;
        border-radius: 3px;
        box-shadow: 0 1px 2px #fff;
        background: #db3752;
        width:100%;
        font-size: 1.5em;
    }   
    .ress_btn:hover {
        color: #fff;
    }
    #ress_list li {position: relative;text-align:left;}
    #ress_list span {display: inline-block;text-indent: 10px;width: 70%}
    #ress_list li i {
        position: absolute;
        display: inline-block;
        right: 10px;
        top:8px;
        color: #fff;
        border-radius: 3px; 
        background: #ccc;
        cursor: pointer;
        text-align: center;
        line-height: 30px;
        padding: 0px 5px;
    }
    #ress_list li i.hover {
        background: #db3752;color: #fff;
    }
    #select {
        text-align: left;text-indent: 10px;
    }
    #select select {
        padding-right: 10px;
    }
    #select input,select{border-radius: 3px; padding-right: 10px;border: 1px solid #bbb;    border-radius: 3px; padding: 5px 8px;}
    .ress_new_box_btn a{ width: 48%; margin-left: 1%;}
    .ress_new_box_btn a:nth-child(1){
        background: #ccc; border: 1px solid #aaa;
    }
</style>

<section class="clearfix g-member" id="ress_new_box">
<form method="post" action="">
    <div class="m-round m-member-nav">
        <li>昵　称：<input type="text" name="username" value="<?php echo $member['username']; ?>" /></li>
    </div>
    <div class="m-round m-member-nav">
        <li>银行卡：<input type="text" name="card_no" value="<?php echo $member['card_no']; ?>" /></li>
    </div>
    <div class="m-round m-member-nav">
        <li>开户行：<input type="text" name="bank_account" value="<?php echo $member['bank_account']; ?>" /></li>
    </div>
    <br/>
    <div class="ress_new_box_btn">
        <input type="submit" name="submit" class="ress_btn" value="完成" />
    </div>
</form>
</section>
<?php include self::includes("index.footer"); ?>