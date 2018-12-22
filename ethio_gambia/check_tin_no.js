
$(document).ready(function(){
// check change event of the text field
$("#tin_no").keyup(function(){
// get text username text field value
var tin_no = $("#tin_no").val();

// check username name only if length is greater than or equal to 3
if(tin_no.length > 0)
{
$("#status").html('Checking availability...');
// check username
$.post("check_tin_no.php", {tin_no: tin_no}, function(data, status){
$("#status").html(data);
});
}
});
});




