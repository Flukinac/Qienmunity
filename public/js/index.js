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
    }
    xhttp.open("POST","http://localhost:8000/contactMail", true);
    xhttp.send(mailjson);

backbone();

function backbone(){
    
    var Dier = Backbone.Model.extend({
        initialize:function(){
            console.log("Nieuw dier geamaakt")
        }
    });
    
    console.log("in backbone");
    
    var kip = new Dier();
    console.log(kip);
    

}