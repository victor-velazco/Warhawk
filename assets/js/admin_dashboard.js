$(function() {
    $("button").click(function() {
        var real_id = this.id.substring(5);
        $.post(url_administrator + "feature/" + real_id,
            function(data, status){
                // Session destroyd.
                location.reload();
            });
    });

});
