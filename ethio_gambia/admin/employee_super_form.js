$(document).ready(function(){
// check change event of the text field
$("#employee_occupation").keyup(function(){
// get text username text field value
var employee_occupation = $("#employee_occupation").val();

// check username name only if length is greater than or equal to 3
if(employee_occupation.length > 0)
{
$("#supform").html('<img src="loader.gif" /> Checking availability...');
// check username
$.post("employee_super_form.php", {employee_occupation: employee_occupation}, function(data, supform){
$("#supform").html(data);
});
}
});
});