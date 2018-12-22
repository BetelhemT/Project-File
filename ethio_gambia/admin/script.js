$(document).ready(function(){
// check change event of the text field
$("#username").keyup(function(){
// get text username text field value
var username = $("#username").val();

// check username name only if length is greater than or equal to 3
if(username.length > 0)
{
$("#status").html('<img src="loader.gif" /> Checking availability...');
// check username
$.post("username_check.php", {username: username}, function(data, status){
$("#status").html(data);
});
}
});
});