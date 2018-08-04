
function dashboard(){

    this.navHandler = function(click_link){
    	click_link.on("click",function(){
		    		if($(this).hasClass("dash-link")){
		    		$(".sections").hide();
		    		$(".dash-section").show();
		    	}else if($(this).hasClass("pat-link")){
		    		$(".sections").hide();
		    		$(".p-section").show();
		    	}else if($(this).hasClass("hist-link")){
		    		$(".sections").hide();
		    		$(".h-section").show();
		    	}else if($(this).hasClass("set-link")){
		    		$(".sections").hide();
		    		$(".set-section").show();
		    	}
    	});
    }

}




$(document).ready(function(){

	enyodashboard = new dashboard();
	//get links 
	let links=$(".links");
	enyodashboard.navHandler(links);
});