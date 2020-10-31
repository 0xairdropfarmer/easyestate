   jQuery(document).ready(function($) {
	   
	function change_widget() {
        var loanamount_total = $("#loanamount_widget").val();
        var loanintrest = $("#loanintrest_widget").val();
        var period = $("#period_widget").val();
        var downpayment_percent = $("#downpayment_widget").val();
        var downpayment = (Number(downpayment_percent) * Number(loanamount_total)) / 100;

        var loanamount = Number(loanamount_total) - Number(downpayment);
        var intrest = (loanintrest / 100) / 12;
		
	
		
        var permonth = calculate(loanamount , Number(period) * 12 , intrest);
		var total_amount = permonth * Number(period) * 12;
        
		var total_intrest =  total_amount - loanamount;
        
        $("#permonth_widget").text("$" + permonth);
        $("#downpament_a_widget").text("$" + downpayment.toFixed(2));
        $("#total_interest_widget").text("$" + total_intrest.toFixed(2));
        $("#total_amount_widget").text("$" + total_amount.toFixed(2));
    }
	
	

    $("body").on("keyup", "#downpayment_widget , #loanintrest_widget , #loanamount_widget , #period_widget", function () {
        change_widget();
    });

    $(function () {
        change_widget();
    });
	
	
		function calculate(amount , term , loanintrest)
		{
			var P = amount;
			var i = loanintrest;
			var n = term;
			var x = Math.pow((1 + i ), n);
			var M = ( P * ((i * x) / (x - 1)) ).toFixed(2);
			return M;
		}
	

});