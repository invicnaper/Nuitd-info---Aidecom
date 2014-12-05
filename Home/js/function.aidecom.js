/*
 * Aidecome open source plateforme developed for The nuit d'info
 * it helps you to create your own communication plateforme (web site)
 * 
 */

/*  for email  */
 function check_email(email){
 	var mydiv = document.getElementById("div_email");
 	if(email.value == ""){
 		/*  no mail */
 		mydiv.className = "form-group has-error";
 	}else {
 		mydiv.className = "form-group has-success";
 	}
 }
 function check_password(pass){
 	var mydiv = document.getElementById("div_pass");
 	if(pass.value == ""){
 		/*  no mail */
 		mydiv.className = "form-group has-error";
 	}else {
 		mydiv.className = "form-group has-success";
 	}
 }
 function check_pays(pays){
 	var mydiv = document.getElementById("div_pays");
 	if(pays.value == ""){
 		/*  no mail */
        mydiv.className = "form-group has-error";
 	}else {
 		mydiv.className = "form-group has-success";
 	}
 }
 function check_city(city){
 	var mydiv = document.getElementById("div_ville");
 	if(city.value == ""){
 		/*  no mail */
 		mydiv.className = "form-group has-error";
 	}else {
 		mydiv.className = "form-group has-success";
 	}
 }
 function check_lname(lname){
 	var mydiv = document.getElementById("div_lname");
 	if(lname.value == ""){
 		/*  no mail */
        mydiv.className = "form-group has-error";
 	}else {
 		mydiv.className = "form-group has-success";
 	}
 }
  function check_fname(fname){
 	var mydiv = document.getElementById("div_fname");
 	if(fname.value == ""){
 		/*  no mail */
 		mydiv.className = "form-group has-error";
 	}else {
 		mydiv.className = "form-group has-success";
 	}
 }
 /*  to manage the organismes mails  */

 function draw_email(organisme){
 	
 	var orga = document.getElementById("select_organisme"),
 		orga_id = orga.options[orga.selectedIndex].id;
 	$.get("get.php?type=mailorga&q=" + orga_id, function(data){
 					$('#email_orga').empty();
                    $("#email_orga").html('<input type="email" class="form-control" name="emailto" placeholder="Email to:" value="'+ data +'"/>');
                });
 }
 function test_h(me){
 	$('#mail_form').empty();
 }

 function send_mail(button){

 	var orga = document.getElementById("select_organisme"),
 		orga_id = orga.options[orga.selectedIndex].id;
    button.className = "pull-right btn btn-default disabled";

    /*  send a XHR  */
    var xhr = new XMLHttpRequest();

    xhr.open('POST', 'send.php');

    xhr.upload.onprogress = function(e) {

    };

    xhr.onload = function() {
        /* draw form succes */
        $('#mail_form').empty();
        $('#div_btn_send').empty();
        $('#mail_form').html('<div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Votre email est envoyé.</div>');
    };
    var form = new FormData();
    form.append('form_type', 'smail');
    form.append('orga_id', document.getElementById("email_orga").value);
    form.append('subject',document.getElementById("subject").value);
   	form.append('message',document.getElementById("dmessage").value);
    form.append('sender_id',$('#id_user').text());

    xhr.send(form);
 }
 
