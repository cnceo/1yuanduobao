<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><script type="text/javascript">
$(document).ready( function() {
/* 我的夺宝 指向 移除 效果 */
  $("#li_my_duobao").mouseover( function() {
    $(this).addClass( "m-toolbar-myDuobao-hover" );
  });
  $("#li_my_duobao").mouseout( function() {
    $(this).removeClass( "m-toolbar-myDuobao-hover" );
  });
});
</script>
<div class="g-header">
    <div class="m-toolbar" module="toolbar/Toolbar">
        <div class="g-wrap f-clear">
            <div class="m-toolbar-l">
                <ul id="list1" style="width:620px;">
                    <li id="summary-stock">
                        <div class="dt" id='show_area_name'></div>
                        <div class="dt">地区选择：</div>
                        <div class="dd">
                            <div id="store-selector">
                                <div class="text"><div></div><b></b></div>
                                <div onclick="$('#store-selector').removeClass('hover')" class="close"></div>
                            </div>
                            <div id="store-prompt"><strong></strong></div>
                        </div>
                    </li>
                </ul>
                <script type="text/javascript">
                    var cookie_domain = "<?php echo _cfg( 'cookie_domain' ); ?>";
                    var cookie_path   = "<?php echo _cfg( 'cookie_path' ); ?>";
                    var cookie_pre    = "<?php echo _cfg( 'cookie_pre' ); ?>";
                </script>
                <script src="<?php echo G_TEMPLATES_STYLE; ?>/js_163/location.js"></script>
            </div>
            <ul class="m-toolbar-r">
                <li class="m-toolbar-login">
                <div id="pro-view-5">
                <?php if($user=login('bool')): ?>
                    欢迎您:　<a class="m-toolbar-nickname" href="<?php echo $user['url']; ?>" title="<?php echo $user['name']; ?>">
                    <?php echo $user['name']; ?>
                    </a>
                    <a class="m-toolbar-logout-btn" href="<?php echo WEB_PATH; ?>/member/user/logout">[ 退出 ]</a>
                <?php  else: ?>
                    <a class="m-toolbar-login-btn" href="<?php echo WEB_PATH; ?>/login">请登录</a>
                    <a href="<?php echo WEB_PATH; ?>/register" target="_blank">免费注册</a>
                <?php endif; ?>
                </div>
                </li>
                <li id="li_my_duobao" class="m-toolbar-myDuobao">
                    <a class="m-toolbar-myDuobao-btn" href="/">我的购买 <i class="ico ico-arrow-gray-s ico-arrow-gray-s-down"></i></a>
                    <ul class="m-toolbar-myDuobao-menu">
                        <li><a href="<?php echo WEB_PATH; ?>/member/shop/userbuylist">购买记录</a></li>
                        <li><a href="<?php echo WEB_PATH; ?>/member/account/userrecharge">账户充值</a></li>
                    </ul>
                </li>
                <li class="m-toolbar-myBonus"><a href="<?php echo WEB_PATH; ?>/login">代理商登录</a><var>|</var></li>
                <li>
                    <a href="/" target="_blank">
                    <img width="16" height="13" style="float:left;margin:8px 3px 0 0;" src="<?php echo G_TEMPLATES_STYLE; ?>/images/icon_weibo_s.png" />官方微博</a><var>|</var>
                </li>               
            </ul>
        </div>
    </div>
    <div class="m-header">
        <div class="g-wrap f-clear">
            <div class="m-header-logo">
                <h1><a class="m-header-logo-link" href="/">一元夺宝</a></h1>
                <div class="m-header-slogan">
                    <a class="m-header-slogan-link" href="/" target="_blank">
                    <img src="<?php echo G_TEMPLATES_STYLE; ?>/images/logo_banner_v3.png">
                    </a>
                </div>
            </div>
    
            <div class="w-miniCart" module="minicart/MiniCart">
                <a class="w-miniCart-btn" href="<?php echo WEB_PATH; ?>/member/cart/cartlist" data-pro="btn">
                <i class="ico ico-miniCart"></i>购物车
                </a>
            </div>
    
            <div class="w-search" module="searchbar/SearchBar">
                <div method="get" name="searchForm" id="searchForm" class="w-search-form f-clear">
                    <div class="w-input" id="pro-view-1">
                        <input class="w-input-input" id="txtSearch" pro="input" type="text" placeholder="请输入要搜索的商品" />
                    </div>
                    <a class="w-search-btn" id="butSearch" href="javascript:void(0)"><i class="ico ico-search"></i></a>
                </div>
                <!-- <div class="w-search-recKeyWrap">
                    <a class="w-search-recKey" pro="shortcut" href="javascript:void(0);">苹果</a>
                    <a class="w-search-recKey" pro="shortcut" href="javascript:void(0);">手机</a>
                </div> -->
            </div>
        </div>
</div>