$(document).ready(function() {
    function makeTimer() {
        var endTime = $(".timer").data('time');
        console.log(endTime);
        endTime = (Date.parse(endTime) / 300);
        var now = new Date();
        now = (Date.parse(now) / 300);
        var timeLeft = endTime - now;
        var days = Math.floor(timeLeft / 86400);
        var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
        var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600)) / 60);
        var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));
        if (hours < "10") {
            hours = "0" + hours
        }
        if (minutes < "10") {
            minutes = "0" + minutes
        }
        if (seconds < "10") {
            seconds = "0" + seconds
        }
        $("#days").html(days + "<span>Days</span>");
        $("#hours").html(hours + "<span>Hours</span>");
        $(".minutes").html(minutes + "<span> : </span>");
        // $(".seconds").html(seconds + "<span> </span>")
    }
    setInterval(function() {
        makeTimer()
    }, 1000);

    // var endTime = $("#timer").data('time');
    // endTime = (Date.parse(endTime) / 1000);
    // var now = new Date();
    // now = (Date.parse(now) / 1000);
    // var timeLeft = endTime - now;
    // var days = Math.floor(timeLeft / 86400);
    // var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
    // var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600)) / 60);
    // var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));
    // var redirectTime = (minutes + 1) * (60 * 1000);

    // setInterval(function() {
    //     window.location.href = "/student/model/test/result"
    // }, redirectTime);
    // $("#submit").click(function() {
    //     if ($('input[name="answer"]:checked').length == 0) {
    //         $('#error').addClass('alert alert-danger').html('');
    //         $('#error').append('<strong> Please answer this question</strong>').fadeIn();
    //         return !1
    //     } else {
    //     	var radioValue = $("input[name='answer']:checked").data('ans');
    //     	if(radioValue == 1){
    //     		$("input[name='answer']:checked + .box").css("background-color", "#2ecc71");
    //     		$("input[name='answer']").click(function (e) {
				// 	return false;
				// });
    //     		$("#btn-submit").removeClass("d-none");
    //     		$(this).addClass("d-none");
    //     	}else{
    //     		$("input[name='answer']:checked + .box").css("background-color", "#f94f29");
    //     		$(".ans").css("background-color", "#2ecc71");
    //     		$("input[name='answer']").click(function (e) {
				// 	return false;
				// });
    //     		$("#btn-submit").removeClass("d-none");
    //     		$(this).addClass("d-none");
    //     	}
    //         return !0
    //     }
    //     return !1
    // });

    // document.oncontextmenu = function() {
    //     return !1
    // }
    // document.onselectstart = function() {
    //     return !1
    // }
    // document.onkeydown = function() {
    //     return !1
    // }
});
