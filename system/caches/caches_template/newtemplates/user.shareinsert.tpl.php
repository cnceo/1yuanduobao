<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php echo css("user.message"); ?>
<?php include self::includes("index.header"); ?>
<div class="main-content clearfix">
<script type="text/javascript" charset="utf-8" src="<?php echo G_PLUGIN_PATH; ?>/uploadify/jquery.uploadify-3.1.min.js"></script>

<script src="<?php echo G_PLUGIN_PATH; ?>/uploadify/api-uploadify.js" type="text/javascript"></script> 
<script src="<?php echo G_GLOBAL_STYLE; ?>/global/js/jquery-1.8.3.min.js"></script>

<script type="text/javascript">
var editurl             = Array();
editurl['editurl']      = "<?php echo G_PLUGIN_PATH; ?>/ueditor/";
editurl['imageupurl']   = "<?php echo WEB_PATH; ?>/<?php echo G_ADMIN_DIR; ?>/ueditor/upimage/";
editurl['imageManager'] = "<?php echo WEB_PATH; ?>/<?php echo G_ADMIN_DIR; ?>/ueditor/imagemanager";
</script>
<script type="text/javascript" charset="utf-8" src="<?php echo G_PLUGIN_PATH; ?>/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo G_PLUGIN_PATH; ?>/ueditor/ueditor.all.min.js"></script>
<?php include self::includes("user.left"); ?>
<style>
.R-content .sd_lilie{display:block; width:780px; margin:10px 0 10px 0; float:left;}
.R-content .sd_lilie .sd_span{font-size:14px; float:left; display:block;width:70px;}
#sd_text{border:1px solid #ccc; width:594px; height:30px; padding:0 0 0 5px;}
#sd_textarea{width:500px; height:150px; border:1px solid #ccc; resize:none; padding:5px;}
#sd_file{ float:left;}
#fileQueue{display: block; margin: 30px 0 0 0;}
#fileQueue div{ margin:5px 0 0 0;}
#sd_submit{padding:5px 10px; float:right; border-right:1px solid #666; border-bottom:1px solid #666;}
.button{ margin:5px 0 0 0; float:left;padding:3px 7px; float:left; border-right:1px solid #666; border-bottom:1px solid #666;}
.fileWarp{width:710px; float:left;}
.fileWarp li{ width:102px; float:left;margin-top:5px;  margin-right:5px;}
.fileWarp input{ width:170px; float:left;}
</style>
<script>
// 显示上传的图片
function SetImgContent( data1, data2 ) {
    var sLi = "";
    for ( var i = 0; i < data2.length; i++ ) {
        sLi += '<li>';
        sLi += '<img src="' + data2[i] + '" width="100" height="100" />';
        sLi += '<input type="hidden" name="share_file[]" value="' + data1[i] + '">';
        sLi += '<a onclik="DelUploadFile()">删除</a>';
        sLi += '</li>';
    }
    $("#share_file").append(sLi);
    DelUploadFile();
}

// 删除上传元素DOM并清除目录文件
function DelUploadFile() {
    $(".fileWarp ul li").each(function(l_i){
        $(this).attr("id", "li_" + l_i);
    })
    $(".fileWarp ul li a").each(function(a_i){
        $(this).attr("rel", "li_" + a_i);
    }).click(function(){
        $.post(
            '<?php echo G_WEB_PATH; ?>/?plugin=true&api=Upload&action=del',
            {filename: $(this).prev().val()},
            function(){}
        );
        $("#" + this.rel).remove();
    })
}
</script>
<div class="R-content">
    <div class="subMenux" style="height:50px;line-height:50px;">
        <span>添加晒单</span>
        <a style="float:right;" href="<?php echo WEB_PATH; ?>/member/home/singlelist" class="blue">返回晒单</a>
    </div>
    <form  action="#" method="post">    
        <div class="sd_lilie">
            <span class="sd_span">标题：</span>
            <input id="sd_text" type="text" name="title" />
        </div>
        <div class="sd_lilie">
            <span class="sd_span">内容：</span>
            <!--textarea id="sd_textarea" name="content" ></textarea-->
            <div style="float: left;">
                <script name="content" id="myeditor" type="text/plain"></script>
                <style>
                .content_attr {
                    border: 1px solid #CCC;
                    padding: 5px 8px;
                    background: #FFC;
                    margin-top: 6px;
                    width:915px;
                }
                </style>
                <script type="text/javascript">
                //实例化编辑器
                UEDITOR_CONFIG.toolbars = [["source","fontfamily","fontsize","bold","italic","underline","backcolor","link","unlink","justifyleft","justifycenter","justifyright","justifyjustify","insertunorderedlist","insertorderedlist",]];
                UEDITOR_CONFIG.initialFrameWidth = 600;
                UEDITOR_CONFIG.initialFrameHeight = 400;
                var ue = UE.getEditor('myeditor');
                ue.addListener('ready',function(){
                    this.focus();
                });
                </script>
            </div>
        </div>
        <div class="sd_lilie">
            <span class="sd_span">晒图：</span>
            <div style="float:left; width:400px;">          
                <input type="button"  class="button" onClick="GetUploadify('<?php echo WEB_PATH; ?>','uploadify','晒图图上传','share',5,'share_file','SetImgContent')" value="上传图片" />
                <div class="fileWarp"><div id="fileQueue"></div>
                <ul id="share_file" class="fileWarp"></ul>
                </div>                 
            </div>
        </div>
        <div class="sd_lilie" style="width:580px;">
        <input id="sd_submit" name="submit" type="submit" value="确认添加" />
        </div>
    </form>
</div>
</div>
<?php include self::includes("index.footer"); ?>