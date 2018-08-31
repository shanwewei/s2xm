$(function(){
	$("#nav").load('head.html',function(){});
	$("#foot").load('foot.html',function(){});
})
$(function () {
		// 注意：出于性能原因，所有的tooltip组件，必须要手动初始化（ 不能等鼠标移动上去才临时初始化显示）
		$('[data-toggle="tooltip"]').tooltip();		
	})
//selImg
function selImg(imgFile) {
		// 如果文件字节大小超过100k，那么不允许上传!
		if (imgFile.files[0].size > 1024 * 100) {
			$("#imgFileError").text("文件"+Math.round(imgFile.files[0].size/1024)+"K，超过限制100K！");
			$("[class="+imgFile.id+"]").attr("src", "imgs/blank.gif");
		} else {
			$("#imgFileError").text("");
			// 预览图片
			console.log(imgFile.files[0]);
			$("[class="+imgFile.id+"]").attr("src", URL.createObjectURL(imgFile.files[0]));
			$("[class="+imgFile.id+"]").css("width","80%").css("height","100%").css("margin-left","10%");
		    $("[class="+imgFile.id+"]").parent().css("border","1px solid lightgray");
		}
	}
$(function(){
	for(var i=0;i<5;i++){
		var spanbig=$("<span class='span"+i+"'></span>");
		var input=$("<input type='file'  style='display: none' id='photo"+i+"' name='photo"+i+"' accept='.jpg, .jpeg, .png, .gif'  onchange='selImg(this)' >");
		var label=$(" <label for='photo"+i+"' class='forphoto'><img class='photo"+i+"' src='images/blank.gif'/></label>");
		// var span=$("<span id='imgFileError' class='text-dange'></span>");
		input.appendTo(spanbig);
		label.appendTo(spanbig);
		// span.appendTo(spanbig);
		spanbig.appendTo($("#photos"));
	}
})
// $(function(){
	var editor = new baidu.editor.ui.Editor({
        autoClearinitialContent:true,  
        //关闭字数统计  
        wordCount:false,  
        //关闭elementPath  
        elementPathEnabled:false,  
        //默认的编辑区域高度  
        initialFrameHeight:300 ,
        enableAutoSave: false,
        // initialFrameWidth : ,
    });
    editor.render("contents");
// })
// 没有登录过，跳转到登录页面
$(function(){
	$.ajax({
		url:"head.php",
		success:(result)=>{
			if(result=="0"){
				console.log(result);
				window.location="login.html";
			}
		}
	})
})
//used
function new1(obj){
	$("#new").html($(obj).html());
	$("#cond1")[0].value=$(obj).html();
}
function used1(obj){
	$("#new").html($(obj).html());
	$("#cond1")[0].value=$(obj).html();
}
//USD
$(function(){
	$("#curr>li>a").click(function(){
		$(".usd").html($(this).html());
		document.getElementById("curr1").value=$(this).html();
	})
})


