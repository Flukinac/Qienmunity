function contactPost(){
    var subject = $(".subject").val();
    var text = $(".text").val();
    
    objectify(subject, text);
}

function objectify(subject, text){
    var mail = {};
    mail.subject = subject;
    mail.text = text;
    
    var mailjson = JSON.stringify(mail);
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        document.getElementById('mailSucces').innerHTML = this.responseText;
    };
    xhttp.open("POST","/contactMail", true);
    xhttp.send(mailjson);
}
    
function zoeken(){
    var data = {
    term:$(".form-control").val(),
    _token:$(".form-control").data('token')
    };
    
    var jsondata = JSON.stringify(data);
    query(jsondata);
}
    
function query(jsondata){
    var url = $(".form-control").attr("data-link");
    
    $.ajax({
        url:"/zoek",
        data: jsondata,
        datatype:"json",
        type:"POST",
        
        beforeSend: function (xhr) {
            var token = $('meta[name="csrf_token"]').attr('content');

            if (token) {
                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
        },
        
            
        
        success:function(data){ 
            //console.log(data[0]['title']);
           console.log(data);
//            $(".testdiv1").html(data[0]['title']);
//            $(".testdiv2").text(data["content"]);
//            $(".testdiv3").text(data["created_at"]);
        },error:function(){ 
            //alert("error!!!!");
        }
        
    }); 
    
}

    



    
    