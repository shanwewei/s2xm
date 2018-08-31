$(function(){
	$("#nav").load('head.html',function(){});
	$("#foot").load('foot.html',function(){});
	$.ajax({
		url:"detail1.php",
		success:(result)=>{
			console.log(JSON.parse(result));//本次发布的所有商品的imgid
			var imgs=JSON.parse(result);
			var img=$("<img src='detail2.php?imgid="+imgs[0]+"' style='width:90%;height:80%;margin:10% 5%'>");
			// console.log(img);
			img.appendTo($("#l1"));

			imgs.forEach((item)=>{
				console.log(item);
				$("#l2").append("<img src='detail3.php?imgid="+item+"' onclick='imgid("+item+")'>");
			})
		}
	})
})
//大图点击切换
function imgid(item){
	$("#l1").empty();
	$("#l1").append("<img src='detail2.php?imgid="+item+"' style='width:90%;height:80%;margin:10% 5%'>");
}

$(function(){
	//请求t_sell数据
	$.ajax({
		url:"detail4.php",
		success:(result)=>{
			var mess=JSON.parse(result);
			console.log(mess);
			$("#pay").text(mess.curr);
			$("#price").text(mess.price);
			$("#rmb").text(mess.price*10);
			$(".desc").html(mess.desc);
			$("#r1").text(mess.title);
			$("#r4").append("<span style='float:left'>"+mess.subtitle+"</span>")
			if(mess.payment=="pal"){
				$("#payimg").empty().append("<img src='images/pal.png'>");
			}else if(mess.payment=="vis"){
				$("#payimg").empty().append("<img src='images/vis.png'>");
			}
		}
	})
	//判断是否关注过
	$.ajax({
		url:"detail7.php",
		success:(result)=>{
			console.log(result);
			if(result=="0"){
				$(".watch").text("watched");
			}else if(result=="1"){
				$(".watch").text("watching");
			}
		}
	})
	// 页面初始化时的关注人数
	$.ajax({
			url:"detail6.php",
			success:(result1)=>{
			// console.log(result1);
			$(".num").text(result1);
			}
		})
})
//watch点击事件
function watching(){
			$.ajax({
				url:"detail5.php",
				success:(result)=>{
					console.log(result);
					if(result=="0"){
						$(".watch").text("watched");
					}else if(result=="1"){
						$(".watch").text("watched");
					}
				}
			})
//获取watch人数
			$.ajax({
					url:"detail6.php",
					success:(result1)=>{
					// console.log(result1);
					$(".num").text(result1);
					}
				})
}













