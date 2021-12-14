



//add cart button 
$(
	function(){
		$(".price_button").click(
			function(){
				alert('New Item added to the Cart');
			}
		);
	}
)

//----------------------------------------

$(
	function(){
		$(".useravator").click(
			function(){
				$(".logout").show();
			}
		);
	}
)



$(document).ready(
function(){
	$(".menu").click(
	function(){
		$(".dropdown_content").show();
	}
	);
}

);

$(document).ready(
function(){
	$(".cancel-manu").click(
	function(){
		$(".dropdown_content").hide();
	}
	);
}

);

$(document).ready(
function(){
	$("window").click(
	function(){
		$(".dropdown_content").hide();
	}
	);
}

);




function seach(){

var x = document.getElementById("search").value;

if (x==""){
            alert("Search box cannot be empty!!!");
        }	

else{
	
alert("No matching word found");
}

}	


// Creating add cart button with ajax


function add_botton(item_num,item_p,item_n){

$.ajax({
type: "GET",
url:  "stock.php",
data: "item_p="+ item_p+"&stock=1&item=" + item_num+"&item_n="+item_n,
success:function(result){
	$("#items_stock").html(result);
	

}

	});
	
}

//Remove item button ajax with php

function remove_botton(item_num){
	
alert("You have removed one Item from Your Cart");
	$.ajax({
	type: "GET",
	url:  "stock.php",
	data: "remove=1&item=" + item_num,
	success:function(msg){
		//$("#items_stock").html(result);
	
		
	 
	}
	
		});
		setInterval(loading,500);
	
		
	}

	function loading(){

		location.reload();
	}

// datepicker--------------------------------------------




//-------------------------------------------------------
	


  
  //Creating ajax for like
  
  function payment(p) {
     
	  var xmlhttp = new XMLHttpRequest(p);
	  xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
		  document.getElementById("payment_response").innerHTML = this.responseText;
		}
	  };
  
	  
	  xmlhttp.open("GET", "payment.php?q="  + p, true);
	  xmlhttp.send();
  
	  
  
  }

  



