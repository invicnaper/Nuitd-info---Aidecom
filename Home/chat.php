
<div class="box box-success">
                                <div class="box-header">
                                    <h3 class="box-title"><i class="fa fa-comments-o"></i> Chat</h3>
                                    <div class="box-tools pull-right" data-toggle="tooltip" title="Status">
                                        <div class="btn-group" data-toggle="btn-toggle" >
                                            <button type="button" class="btn btn-default btn-sm active"><i class="fa fa-square text-green"></i></button>                                            
                                            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-square text-red"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-body chat" id="chat-box">
                                    <!-- chat item -->
                                    <div id ="all_msg" class="item">
                                        <div class="callout callout-warning">
                                            <h4>Attention !</h4>
                                            <p>Aucun contenu</p>
                                        </div>
                                    </div><!-- /.item -->
                                    <!-- chat item -->
                                    
                                </div>  
                                <div class="box-footer">
                                    <div class="input-group">
                                        <input id="msg" class="form-control" placeholder="Type message..."/>
                                        <div class="input-group-btn">
                                            <button id="btmsg" class="btn btn-success" onclick="send_message(this)"><i class="fa fa-plus"></i></button>
                                        </div>
                                        <div id="s_file"></div>
                                    </div>
                                </div>
</div>
<script>
    function load_conversation(){
        /*  it will load the conversation form convo.php?cid=xxxxxxx  */
        $.ajax({
            url: "convo.php",
            cache: false,
            success: function(html){
                $("#all_msg").html(html);
            }
        });

    }
</script>
<script>
    setInterval(load_conversation, 1000);
</script>
<script>
    function check_enter(e){
        if(e.keyCode == 13){
            send_message(e);
        }
    }
    function send_message(message){

    /*  send a XHR  */
    var xhr = new XMLHttpRequest();

    xhr.open('POST', 'send.php');

    xhr.upload.onprogress = function(e) {
        document.getElementById("msg").value = "";
    };

    xhr.onload = function() {
        /* draw form succes */
        
        };
    var form = new FormData();
    form.append('form_type', 'smsg');
    form.append('sender_id', "<?php echo $get_info->return_id($get_info); ?>");
    form.append('message',document.getElementById("msg").value);

    xhr.send(form);
    }

</script>
<b id="id_user" style="visibility:hidden"><?php echo $get_info->return_id($get_info); ?></b>