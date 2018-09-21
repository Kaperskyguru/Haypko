
function dashboard(){
    let url = 'http://localhost/Enyopay';
    //handle side navigation onlick
    this.navHandler = function(click_link){
    	click_link.on("click",function(){
		    		if($(this).hasClass("dash-link")){
		    		$(".sections").hide();
		    		$(".dash-section").fadeIn(1000);
		    	}else if($(this).hasClass("pat-link")){
		    		$(".sections").hide();
		    		$(".p-section").fadeIn(1000);
		    	}else if($(this).hasClass("hist-link")){
		    		$(".sections").hide();
		    		$(".h-section").fadeIn(1000);
		    	}else if($(this).hasClass("set-link")){
		    		$(".sections").hide();
		    		$(".set-section").fadeIn(1000);
		    	}
    	});
    }
    //update price
    this.updateprice = function(){
    	$(".change-overlay").fadeIn();
    	$(".change-overlay").click(function(){
    		$(this).fadeOut(300);
    	});
    	$(".change-body").click(function(e){
    		e.stopPropagation();
    	});
    }

    //handle add partner form display
    this.addPartner = function(){
    	$(".form-section").fadeIn();
    	$(".p-form").show("slide",300);
    	$(".form-section").click(function(){
    		$(this).fadeOut();
   	 	});
   	 	$(".form-section form").click(function(e){
   	 		e.stopPropagation();
   	 	});
   	 	$(".acc-form").hide();
   	 	$(".cancel").click(function(){
   	 		$(".form-section").fadeOut();
   	 	});

    }
    /// handles next button
    this.nextForm = function(){
      $(".acc-form").show();
    	$(".p-form").hide();

    }
    //handles previous button
    this.prevForm = function(){
    	$(".acc-form").fadeOut();
    	$(".p-form").show("slide");

    }
    //call this function to create pop up
    this.popup = function(id){
        $.ajax({
           type: "POST",
           url: url + "/Partners/showDetails",
           cache:false,
           data: {id:id},
           success: function(response) {
                $('#newPartner').html(response);

                $(".popup-overlay").fadeIn(300);
              $(".popup-overlay").click(function(){
                $(this).fadeOut(300);
              });
              $(".popup-body").click(function(e){
                e.stopPropagation();
              });
           }
       });

    }

    // shows a loader beside
    this.showpassLoader = function(element){
        $(".passloader").show();
        let cpassword = $('#cpassword').val();
        let npassword = $('#npassword').val();
        let conpass = $('#conpass').val();
        let id = element.attr('uid');
        alert(id);
        if (npassword !== conpass) {
            $('#e').html("Password do not match");
        } else {
            $('#e').html("");

            $.ajax({
               type: "POST",
               url: url + "/Users/updatePass/"+id,
               cache:false,
               data: {uid:id, cpassword:cpassword, npassword:npassword},
               success: function(response) {
                   alert(response);
                 $(".passloader").hide();
               }
           });
        }
    }

    this.updatePartnerPass = function(element){
      $(".passloader").show();
      let cpassword = $('#cpassword').val();
      let npassword = $('#npassword').val();
      let conpass = $('#conpass').val();
      let id = element.attr('uid');
      if (npassword !== conpass) {
          $('#e').html("Password do not match");
          $(".passloader").hide();
      } else {
          $('#e').html("");
          $.ajax({
             type: "POST",
             url: url + "/Partners/updatePass/",
             cache:false,
             data: {uid:id, cpassword:cpassword, npassword:npassword},
             success: function(response) {
                 alert(response);
               $(".passloader").hide();
             }
         });
      }
    }

    this.updatePartnerAccount = function(element){
      $(".accloader").show();
      let accnum = $('#Paccnum').val();
      let accname = $('#Paccname').val();
      let bankname = $('#Pbankname').val();
      let id = element.attr('uid');
      $.ajax({
         type: "POST",
         url: url + "/Partners/updateAccount",
         cache:false,
         data: {uid:id, bankname:bankname, accname:accname, accnum:accnum},
         success: function(response) {
             if(response == "Partner Account Updated") {
                 alert(response);
                 $(".accloader").hide();
             }

       },
       onerror: function (err) {
           alert(err);
       }
     });
    }

    this.checkAllPartners = function(element){
      elements=$(element).parents().eq(2).next().find("input[type='checkbox']");
      if($(element).prop("checked")===true){
        elements.prop("checked",true);
      }else{
        elements.prop("checked",false);
      }

    }

    this.viewPartners = function(element){

        let id  = element.attr('pid');

        $.ajax({
           type: "POST",
           url: url + "/Partners/viewPartner",
           cache:false,
           data: {id:id},
           success: function(response) {
                $('#partnerDetails').html(response);
                $(".view-overlay").fadeIn(300);
                $(".view-overlay").click(function(){
                   $(this).fadeOut(300);
                });
                $(".view-box").click(function(e){
                  e.stopPropagation();
                });
           }
       });


    }

    this.viewOrders = function(element){

        let id  = element.attr('oid');

        $.ajax({
           type: "POST",
           url: url + "/Partners/viewOrder",
           cache:false,
           data: {id:id},
           success: function(response) {
                $('#orderDetails').html(response);
                $(".view-overlay").fadeIn(300);
                $(".view-overlay").click(function(){
                   $(this).fadeOut(300);
                });
                $(".view-box").click(function(e){
                  e.stopPropagation();
                });
           }
       });


    }

    this.deleteAllpartners = function(element){
         let content = $(element).parents().eq(2).next().find("tr");
         elements=$(element).parents().eq(2).next().find("input[type='checkbox']");
         let sure = confirm("are you sure you want to delete all partners ?");
         var partners = [];
         elements.prop('checked', true);
         elements1=$(element).parents().eq(2).next().find("input:checked");
         $(elements1).each(function () {
           partners.push($(this).data('partner-id'));
         });
         if(sure===true){
             let selected_values = partners.join(",");
             $.ajax({
                type: "POST",
                url: url + "/Partners/delete",
                cache:false,
                data: 'emp_id='+selected_values,
                success: function(response) {
                    // remove deleted employee rows
                     content.fadeOut(1000).remove();
                }
            });
         }
    }
    this.deletePartners = function(element){
      //check if check box is check
      let content = $(element).parents().eq(1);
      let checkbox=$(element).parents().eq(1).find("input[type='checkbox']");
      let id = $(element).attr('pid');
      if(checkbox.prop("checked")===true){
        let sure = confirm("are you sure you want to delete all partners ?");
        if(sure===true){
            $.ajax({
               type: "POST",
               url: url + "/Partners/delete/"+id,
               cache:false,
               data: 'id='+id,
               success: function(response) {
                   // remove deleted employee rows
                    content.fadeOut().remove();
               }
           });

        }
      }else{
        alert("Pls select item to delete");
      }
    }

    this.updatePrice = function(element) {
        let petrolprice = $('#petrolprice').val();
        let dieselprice = $('#dieselprice').val();
        let gasprice = $('#gasprice').val();
        let table = "products";
        $.ajax({
           type: "POST",
           url: url + "/Products/update",
           cache:false,
           data: {petrolprice:petrolprice, dieselprice:dieselprice, gasprice:gasprice, table:table},
           success: function(response) {
               if (response == "Updated Successfully") {
                   alert(response);
               } else {
                   alert(response);
               }
           }
        });

    }

    this.createPartner = function(element){
      //fade out form section
      $(".form-section").fadeOut(300);
      // alert();
      //append to the partners table
      $(".ptable tbody:last-child").append("<tr> <td> <input class='control-label' type='checkbox' value=''>'"+
            "</td><td><span>Enyo Retail</span></td> "+
            "<td><span>Yaba</span></td>"+
            "<td><button type='button' class='btn  btn-info view'>view</button>"+
            "</td><td> "+"<button type='button' class='btn  btn-danger delete'>delete</button> "+
            "</td></tr>"
            );
      //display create ticket
     let name = $('#rname').val();
     let rcnum = $('#rcnum').val();
     let raddr = $('#raddr').val();
     let state = $('#state').val();
     let city = $('#city').val();
     let phone = $('#phone').val();
     let pemail = $('#pemail').val();
     let bname = $('#bname').val();
     let accnum = $('#accnum').val();
     let accname = $('#accname').val();
     let success = element;
        if (name == null || name.length === 0) {
            alert("Name is required");
        } else if ( rcnum == null || rcnum.length === 0) {
            alert("RC Number is required");
        } else if ( phone == null || phone.length === 0) {
            alert("Phone is required");
        } else {

         $.ajax({
            type: "POST",
            url: url + "/partners/add",
            cache:false,
            data: {name:name, rcnum:rcnum, address:raddr, state:state, city:city, phone:phone, email:pemail, bankname:bname, accnum:accnum, accname:accname},
            success: function(response) {
                let arr = response.split('/');
                if (arr[0] == "Partner Created") {
                    enyodashboard.popup(arr[1]);
                }

            }
         });
        }
    }


}

$(document).ready(function(){
    let url = 'http://localhost/Enyopay';

	enyodashboard = new dashboard();
	//get links
	let links=$(".links");
	enyodashboard.navHandler(links);
	//add a retailer button
	$(".add-btn").click(function(){
		enyodashboard.addPartner();
	});
	//next retail form button
	$(".next").click(function(){
		enyodashboard.nextForm();
	});
  //prev retail form button
	$(".prev").click(function(){
		enyodashboard.prevForm();
	});
  //update password button
  $(".updatepass").click(function(){
      let element = $(this);
      enyodashboard.showpassLoader(element);
  });

  // Update Parthers Password
  $(".updatePartnerPass").click(function(){
      let element = $(this);
      enyodashboard.updatePartnerPass(element);
  });

  //update price button
  $(".updateacc").click(function(){
      enyodashboard.updateaccount(this);
  });

  // Update Partners Account details
  $(".updatePartnerAccount").click(function(){
      let element = $(this);
      enyodashboard.updatePartnerAccount(element);
  });
  //on delete clicked
  $("body").on("click",".delete",function(){
    let element = $(this);
    enyodashboard.deletePartners(element);
  });

  //on update Price clicked
  $(".form-group").on("click","#update",function(){
    let element = $(this);
    enyodashboard.updatePrice(element);
  });

  //on deleteall clicked
  $('body').on('click', ".deleteall", () => {
    enyodashboard.deleteAllpartners(this);
  });
  //on register clicked
  $("#register").click(function(){
      enyodashboard.createPartner(this);
  });
  //on select all checkbox clicked
  $(".selectall").click(function(){
    enyodashboard.checkAllPartners(this);
  });
  //on view clicked
  $("body").delegate(".view","click",function(){
      let element = $(this);
    enyodashboard.viewPartners(element);
  });

  //on view clicked
  $("body").delegate("#viewOrder","click",function(){
      let element = $(this);
    enyodashboard.viewOrders(element);
  });
  //change price on click
  $(".change").click(function(){
  	enyodashboard.updateprice();
  });

 $('body').delegate('#orderStatus', 'click', function() {
     let id = $(this).attr('oid');
     $.ajax({
        type: "POST",
        url: url + "/partners/delivered/"+id,
        cache:false,
        data: {},
        success: function(response) {
            alert(response);
        }
    });
 });

});
