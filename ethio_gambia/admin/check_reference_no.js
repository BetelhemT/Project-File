$(document).ready(function(){
// check change event of the text field
$("#refrence_no").keyup(function(){
// get text username text field value
var refrence_no = $("#refrence_no").val();

// check username name only if length is greater than or equal to 3
if(refrence_no.length > 0)
{
$("#status").html('<img src="loader.gif" /> Checking availability...');
// check username
$.post("reference_no_check.php", {refrence_no: refrence_no}, function(data, status){
$("#status").html(data);
});
}
});
});
