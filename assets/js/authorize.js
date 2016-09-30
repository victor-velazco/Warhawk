$("#authorize_btn").click (function(event) {
	 $("input[name=authorize]:hidden").val('1');
	 $("#frm_authorize")[0].submit();
});

$("#deny_btn").click (function(event) {
	 $("input[name=authorize]:hidden").val('0');
	 var reason = prompt("Please enter the reason for the deny.", "No reason");
	 $("input[name=reason]:hidden").val(reason);
	 $("#frm_authorize")[0].submit();
});