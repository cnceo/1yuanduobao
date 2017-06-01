<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php echo js("jquery.cmsapi"); ?>
<?php echo js("template"); ?>
<?php echo js("template.fun"); ?>
<?php include self::includes("index.header_top"); ?>
<script type="text/javascript">
    $.YunCmsApi.SetTopStyle({
        "Title":  '我的下级',
        "Member": true,
        "Home":   true
    });
</script>

<div id="navBox" class="g-snav m_listNav">
    <div class="gray9 g-snav-lst z-sgl-crt" state="-1"><a href="javascript:;">全部下级(<?php echo $num; ?>)人</a><b></b></div>
</div>
<section class="clearfix g-Record-lst" style="display:block">
    <ul class="z-minheight" id="userrecord">
        <?php if ( is_array( $list ) ) foreach ( $list as $at ): ?>
        <li>
            <div class="u-sgl-l">
                <p class="z-sgl-tt">UID：<?php echo $at['uid']; ?></p>
                <p><em class="blue">用户名：<?php echo $at['username']; ?></em></a></p>
                <p><em class="blue">佣金金额：<?php echo $at['dis_money']; ?></em></a></p>
                <p class="z-sgl-tt">加入时间：<?php echo date( 'Y-m-d H:i:s', $at['add_time'] ); ?></p>
            </div>
            <a href="<?php echo WEB_PATH; ?>/member/distributor/my_child&parent_id=<?php echo $at['uid']; ?>"><b class="z-arrow"></b></a>
        </li>
        <?php endforeach; ?>
    </ul>
    <div id="LoadDataA">
        <a class="loading" href="javascript:void(0)">点击加载更多</a>
        <a class="loading" href="javascript:void(0)" style="display:none;">正在加载...</a>
        <a class="loading" href="javascript:void(0)" style="display:none;">没有数据了</a>
        <a class="loading" href="javascript:void(0)" style="display:none;">已经到底了</a>
    </div>
</section>

<!--script type="text/javascript">
var $datas = <?php echo json_encode( $record ); ?>;
$("#userrecord").append( template( 'userrecord_all', {list:$datas} ) );
$datas = null;

$( "#LoadDataA a" ).click( function() {
    $data = $("#LoadDataA a");
    $data.data( "page", ($data.data("page")|0) + 1 );
    $data.data( "page", $data.data("page") == 1 ? 2 : $data.data("page") );
    if ( $data.data( "maxpage" ) === undefined )
    {
        $data.hide().eq(1).show()
        $.get( APP.WEB_PATH + '/' + APP.G_PARAM_URL + "/p" + $data.data("page"), function( $datas ) {
            if ( $datas.record.length < 20 )
            {
                $data.data( "maxpage", $data.data("page") );
            }
            $("#userrecord").append( template('userrecord_all', {list:$datas.record}) );
            $data.hide().eq(0).show()
        },"json")
    }
    else
    {
        $.get( APP.WEB_PATH + '/' + APP.G_PARAM_URL + "/p" + $data.data("page"), function( $datas ) {
            console.log( $datas.record.length );
            if ( $datas.record.length == 0 )
            {
                $data.hide().eq(2).show();
            }
            else
            {
                $data.data( "maxpage", $data.data("page") );
            }
            $("#userrecord").append( template('userrecord_all', {list:$datas.record}) );
        }, "json" );
    }
});
</script-->

<?php include self::includes("index.footer"); ?>