$(document).ready(function(){
// check change event of the text field
$("#qty").keyup(function(){
// get text username text field value
var qty = $("#qty").val();

// check username name only if length is greater than or equal to 3
if(qty.length > 0)
{
$("#status").html('<img src="loader.gif" /> Checking availability...');
// check username
$.post("modal.php", {qty: qty}, function(data, status){
$("#status").html(data);
});
}
});
});