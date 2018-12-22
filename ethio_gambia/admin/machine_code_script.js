$(document).ready(function(){
// check change event of the text field
$("#machine_code").keyup(function(){
// get text username text field value
var machine_code = $("#machine_code").val();

// check username name only if length is greater than or equal to 3
if(machine_code.length > 0)
{
$("#status").html('<img src="loader.gif" /> Checking availability...');
// check username
$.post("machine_code_check.php", {machine_code: machine_code}, function(data, status){
$("#status").html(data);
});
}
});
});