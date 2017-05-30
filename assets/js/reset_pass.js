    
    $( "a" ).click(function(e) {
        console.log(e.target.id+ " "+ e.target.id.substring(3));
        if (e.target.id.startsWith("PId")) {
            e.preventDefault();
            $.post("/wgc/index.php/administrator/send_password",
                {
                    "person_id": e.target.id.substring(3),
                },
                function(data, status){
                    data = JSON.parse(data);
                    if(data.result === 'true'){
                        alert("An email with password has been sent to alumni email.");
                    } else{
                        alert("An error occurred sending the email!");
                    }
                });
        } else if (e.target.id.startsWith("resP")) {
            $('#reset-form').show();
        }
    });
