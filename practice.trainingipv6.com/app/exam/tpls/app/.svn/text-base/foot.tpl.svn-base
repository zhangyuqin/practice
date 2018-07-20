<div class="row-fluid">
	<div class="container-fluid logfooter">
		<ul class="inline unstyled">
			<li><a href="#">网站首页</a></li>
            <li>|</li>
            <li><a href="#">用户须知</a></li>
            <li>|</li>
            <li><a href="#" target="__BLANK__">隐私协议</a></li>
            <li>|</li>
            <li><a href="http://www.miitbeian.gov.cn/"  target="__BLANK__">京ICP备09059086号-24</a></li>
		</ul>
	</div>
</div>
<script type="text/javascript">
$(function(){
	$('img').each(function(){
        var error = false;
        if (!this.complete) {
            error = true;
        }
        if (typeof this.naturalWidth != "undefined" && this.naturalWidth == 0) {
            error = true;
        }
        if(error){
            $(this).bind('error.replaceSrc',function(){
                this.src = "app/core/styles/images/icons/newcourse.jpg";

                $(this).unbind('error.replaceSrc');
            }).trigger('load');
        }
    });
	//$(".thumbnails img").bind("error",function(){$(this).attr("src","app/core/styles/images/icons/Book.png?"+Math.random());});
});
</script>