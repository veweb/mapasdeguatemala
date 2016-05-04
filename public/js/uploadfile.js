$("#imagen").click(function(event){

	$.post("upload/",function(response,data)){

		console.log(response);
	};
});