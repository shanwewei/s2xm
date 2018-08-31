$(function(){
	$.ajax({
		url:"head.php",
		success:(result)=>{
			if(result==0){
				$(".lm1").css("display","block");
				$(".lm2").css("display","none");
			}else{
				$(".lm1").css("display","none");
				$(".lm2").css("display","block");
				$(".xm").html(result+"<span class='caret'></span>");
			}
		}
	})
})
function lo(){
	$.ajax({
		url:"head2.php",
		success:(result)=>{
			window.location="login.html";
		}
	})
	
}

function setting(){
	window.location="watchlist.html";
}

function search(){
	var input=document.getElementById("keyword");
	$.ajax({
		url:"head3.php",
		data:{
			keyword:input.value
		},
		success:(result)=>{
			console.log(result);
			window.location="index-search.html";
		}
	})
}

function sell(){
	$.ajax({
		url:"head.php",
		success:(result)=>{
			console.log(result);
			if(result==0){
				window.location="login.html";
			}else{
				window.location="sell.html";
			}
		}
	})
}