$(function(){
	$("#nav").load('head.html',function(){});
	// $("#nav").load('head.js',function(){});
	$("#foot").load('foot.html',function(){});
})
// $('#someTab').tab('show');
var inputs;
$(function(){
	//全选,全不选
	inputs=document.getElementsByName("inputs");
	$("#quanx").click(function(){
		if($("#quanx")[0].checked){
			for(var i=0;i<inputs.length;i++){
				inputs[i].checked=true;
			}
	 	 }else{
	 	 	for(var i=0;i<inputs.length;i++){
				inputs[i].checked=false;
			}
	 	 }
	})
})
//删除
function deleteinput(){

	for(var i=0;i<inputs.length;i++){
		if(inputs[i].checked){
			var sid1=$(inputs[i]).attr("haha");
				// console.log(sid);
				$.ajax({
					url:"watchlist3.php",
					data:{
						sid:sid1
					},
					success:(result)=>{
						// console.log(result);
						if(result==0){
							// $(inputs[i]).parent().remove();
							window.location.reload();
						}
					}
				})
		}
	}
}

//加载当前用户关注商品
$(function(){
	$.ajax({
		url:"watchlist1.php",
		dataType:"json",
		success:(result)=>{
			console.log(result);
			var data={
				source:result
			};
			console.log(data);
		$("#rbig").html(template("a", data));
		//下面所有input点击满后全选按钮选中
		for(var i=0;i<inputs.length;i++){

				inputs[i].onclick=function(){
					var count=0;
					for(var j=0;j<inputs.length;j++){
						if(inputs[j].checked){
							count++;
						}
					}
					if(count==inputs.length){
						document.getElementById("quanx").checked=true;
					}else{
						document.getElementById("quanx").checked=false;
					}
				};
			}

		}
	})
})
//点击标题进入
function titlewatch(item){
	console.log(item);//t_sell表中的sid
	$.ajax({
		url:"detail8.php",
		data:{
			sid:item
		},
		success:(result)=>{
			window.location="details.html";
		}
	})
}



















