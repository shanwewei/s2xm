
$(function(){
	$("#nav").load("head.html",function(){});
	$("#foot").load("foot.html",function(){});
	//canvas
	var canvas = document.getElementById("canvas");
	// 绘制上下文（笔触）
	var ctx = canvas.getContext("2d");
	var width=canvas.width;
	var height=canvas.height;
	var x;
	var y;
	var r=height/2;
	var flag=true;
	var color1="#1a9ec6";
	function c(){
	ctx.beginPath();
	ctx.fillStyle=color1;
	ctx.moveTo(width-r,height);
	ctx.lineTo(r,height)
	ctx.arc(r, r, r, 1/2*Math.PI, 3/2*Math.PI);	
	ctx.lineTo(width-r,0);
	ctx.arc(width-r,r,r,3/2*Math.PI,1/2*Math.PI);
	ctx.fill();
	}
	c();
	function a(){	
	    x=width-r;
	     y=height/2;	
	    ctx.beginPath();
		ctx.fillStyle="white";
		ctx.arc(x, y, r, 0, 2*Math.PI);
		ctx.closePath();	
		ctx.fill();
	}
	function b(){
		x=r;
	 	y=r;	
	    ctx.beginPath();
		ctx.fillStyle="white";
		ctx.arc(x, y, r, 0, 2*Math.PI);
		ctx.closePath();	
		ctx.fill();
	}
	a();
	canvas.onclick=function(){
		ctx.clearRect(0,0,120,40);
		flag=!flag;
		
		if(flag){
			color1="#1a9ec6";
			c();
		a();
	 }else{
	 	color1="gray";
	 	c();
	 	b();
	 }			
	}	

	//加载发布的所有商品
	
	page();
	$("#first").click(function(){
		page(1);
	})
	$("#second").click(function(){
		page(2);
	})
	$("#third").click(function(){
		page(3);
	})
	$("#prev").click(function(){
		page(pageresult.pageno-1);
	})
	$("#next").click(function(){
		page(pageresult.pageno+1);
	})
// console.log(pageresult);
})

//标题点击事件
function t1(item){
	$.ajax({
				url:"detail8.php",
				data:{
					sid:item
				},
				success:(result)=>{
				// console.log(result);
				window.location="details.html";
				}
			})
}

var pageresult;
function page(pageNo=1){
	$.ajax({
		url:"index-search3.php",
		data:{
			pageno:pageNo
		},
		dataType:"json",
		success:({data,pageno,pagesize,pagetotal})=>{
			// console.log(data);
			pageresult={pageno,pagesize,pagetotal};
			// console.log(pageresult);
			    var data1={
				source:data
			    };
			    // console.log(pagetotal);
			    $("#rbig").html(template("a", data1));
			   if(pageno==1){
			   	$("#prev").removeClass("disabled");
			   	$("#prev").addClass("disabled");
			   }else if(pageno==pagetotal){
			   	$("#next").removeClass("disabled");
			   	$("#next").addClass("disabled");
			   }else{
			   	$("#prev").removeClass("disabled");
			   	$("#next").removeClass("disabled");
			   }
		}
	})
}



