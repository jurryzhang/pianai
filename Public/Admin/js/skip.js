//自动跳转...
function skip(url){
	setInterval(function(){
		var no = $('#skip .jump').html();
		no = no-1;
		if(no<1){
			window.location.href= url;
		}else{
			$('#skip .jump').html(no);
		}
	},1000);
}
