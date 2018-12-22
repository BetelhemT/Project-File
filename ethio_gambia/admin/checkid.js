$(document).ready(function(){
// check change event of the text field
$("#employee_id").keyup(function(){
// get text username text field value
var employee_id = $("#employee_id").val();

// check username name only if length is greater than or equal to 3
if(employee_id.length > 0)
{
$("#status").html('<img src="loader.gif" /> Checking availability...');
// check username
$.post("employee_id_check.php", {employee_id: employee_id}, function(data, status){
$("#status").html(data);
});
}
});
});