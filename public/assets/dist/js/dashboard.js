
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
    this.addPartner = function(){
    	$(".form-section").fadeIn(300);
    	$(".p-form").show();
    	$(".form-section").click(function(){
    		$(this).fadeOut(300);
   	 	});
   	 	$(".form-section form").click(function(e){
   	 		e.stopPropagation();
   	 	});
   	 	$(".acc-form").hide();
   	 	$(".cancel").click(function(){
   	 		$(".form-section").fadeOut(300);
   	 	});

    }

    this.nextForm = function(){
    	$(".p-form").fadeOut();
    	$(".acc-form").fadeIn(300);
    }
    this.prevForm = function(){
    	$(".acc-form").fadeOut();
    	$(".p-form").fadeIn(300);
    	
    }
    this.popup = function(title,message){
    	$(".popup-overlay").fadeIn(300);
    	$(".popup-body h2").text(title);
    	$(".popup-body").append(message);
      $(".popup-overlay").click(function(){
        $(this).fadeOut(300);
      });
    }

}


$(document).ready(function(){

	enyodashboard = new dashboard();
	//get links 
	let links=$(".links");
	enyodashboard.navHandler(links);
	//add a retailer button
	$(".add-btn").click(function(){
		enyodashboard.addPartner();
	});
	//next button
	$(".next").click(function(){
		enyodashboard.nextForm();
	});  
	$(".prev").click(function(){
		enyodashboard.prevForm();
	});
	setTimeout(function(){ 
		enyodashboard.popup("New Order","<h5 class='text-center'><strong>Name:</strong> Agunbiade adedeji</h5>"+
      "<h5 class='text-center'><strong>Product:</strong> 10L of Petrol</h5>");
	},1000);
});