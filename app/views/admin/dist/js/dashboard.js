
function dashboard {
    this.navHandler = function(click_link){
    	click_link.on("click",function(){
		    		if($(this).hasClass("dash-link")){
		    		$(".section").hide();
		    		$(".dash-section").show();
		    	}else if($(this).hasClass("part-link")){
		    		$(".section").hide();
		    		$(".p-section").show();
		    	}else if($(this).hasClass("hist-link")){
		    		$(".section").hide();
		    		$(".h-section").show();
		    	}else if($(this).hasClass("set-link")){
		    		$(".section").hide();
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