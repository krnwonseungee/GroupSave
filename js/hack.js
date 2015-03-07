/** Common Functions **/
$(document).ready(function() {
	$("#loginBtn").click(function() {
		signin();
	});
});

function signin() {
	var submitData = { u: $('#lu').val(), p: $('#lp').val() };
	postJSONData('/api/h/si', submitData, function (result) {
		if (result.status == 1) {
			location.reload();			
		} else {
			alert("The username and password you entered did not match our records. Please try again.");
		}
	});
}

function postJSONData(submitURL, jsonData, callback) {
	$.post(submitURL, JSON.stringify(jsonData), function( data ) {
		//alert("JSON Response: "+data);
		callback(JSON.parse(data));
		//callback(data);
	});
}
/** Common Functions **/
function signout() {
	postJSONData('/api.php/h/so', null, function (result) {
		if (result.status == 1) {
			location.reload();			
		} else {
			alert("signout failed");
		}
	});		
};
