 <?php $this->load->view('admin/header');?>
<body>
<?php $this->load->view('admin/top_header');?>
<?php $this->load->view('admin/side_header');?>

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>

        
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    
    <!-- http://bootsnipp.com/snippets/4jXW -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/styles/chat.css" />




<div id="wrapper">
<div class="main-content">

<section class="new_supplier">
 
<div class="row">
<div class="col-md-12">
<h3><?php echo $this->Admin_model->translate("messages") ?> </h3>
</div>
</div>
 
</section>


<div class="container">
    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-comment"></span> Chat
            </div>
            <div class="panel-body">
                <ul class="chat" id="received">
                    
                </ul>
            </div>
                   <?php $closeddata = $this->db->get_where('quotation_det', array('id'=>$request,'end_date >'=>date('Y-m-d'),'submit_status'=>'submit'))->row();

//echo $this->db->last_query();
if(!empty($closeddata)){


             ?>

              <style type="text/css">

.attachmentWrap
 {
border: 1px solid #ccc;
position: relative;
width: 700px;
}
.attachmentWrap img {
position: absolute ;
left: 1px;
top: 1px;
height: 50px;
width: 20px;
}
.attachmentWrap textarea {
  border: 0; 
  width: 700px;
   }
</style>



            <div class="panel-footer">
                <div class="clearfix">
                   
                    <div class="col-md-8" id="msg_block">
                        <div class="input-group">
                           
                           
    <div class="row attachmentWrap">

        <div class="col-lg-10" >
              <textarea type="text" id="message" name="firstname" placeholder="Type Here.."  style="width:100%;"></textarea>
        </div>
         <div class="col-lg-2" >
            <label for="file-input" class="pull-right   "  >
    <img src="https://image.flaticon.com/icons/svg/53/53582.svg" alt="" />
    </label>
        </div>

  
    
 

 
    </div>

        </div>
                    </div>

 <div class="col-lg-2" style="display:none">
    <div class="image-upload" id="">
      <input id="file-input" type="file" name="attachment"  class="dropify" />
    </div>
  </div> 



                    <!-- <div class="col-md-3" id="msg_block">
                        <div class="input-group">
                            

                            <span class="input-group-btn">

                                  <input type="file" name="attachment" id="attachment"  class="dropify"     >


                            </span>
                            
                        </div>
                    </div> -->


                    <div class="col-md-2" id="msg_block">
                        <div class="input-group">
                         <a><button  id="submit" class="btn btn-primary btn-sm">Send Message</button></a>

                              

 <input type="hidden" id="userid" name="" value="<?php echo $user ?>">
                            <input type="hidden" id="requestid" name="" value="<?php echo $request ?>">
                                 
                            
                        </div>
                    </div>

                     


                </div>
            </div>

        <?php } ?>
        </div>
    </div>
</div>
 </div>
</div>

  <script type="text/javascript">


 //$('#messagesection').scrollTop($('#messagesection')[0].scrollHeight);


// var sendChat = function (message, callback) {


//     var data = new FormData();
//     data.append('attachment', $('#attachment').prop('files')[0]);
//     // append other variables to data if you want: data.append('field_name_x', field_value_x);

//     $.ajax({
//         type: 'POST',               
//         processData: false, // important
//         contentType: false, // important
//         data: data + '&message='+message + '&requestid=' + $('#requestid').val() + '&userid=' + $('#userid').val(),
//         url: '<?php echo base_url(); ?>buyer/send_message',
//         dataType : 'json',  
         
//         success: function(jsonData){

//             if(jsonData==false){
//                 alert("invalid");

//             }else{
//                  callback();
//              }          
//         }
        
//     }); 




//     // $.getJSON('<?php echo base_url(); ?>buyer/send_message?message=' + message + '&requestid=' + $('#requestid').val() + '&userid=' + $('#userid').val() , function (data){
//     //     callback();
//     // });



// }



  var sendChat = function (message, callback) {

        var data = new FormData();
    //data.append('attachment', $('#attachment').prop('files'));

    var image = document.getElementById("file-input").files[0] ;



        data.append('attachment', image);

        

        data.append('message', $('#message').val());
        data.append('requestid', $('#requestid').val());
        data.append('userid', $('#userid').val());

    $.ajax({
        type: 'POST',               
        contentType: false,
        cache: false,
        processData:false,


        // data: data + '&message='+$('#message').val() + '&requestid=' + $('#requestid').val() + '&userid=' + $('#userid').val(),
        data:data,
        url: '<?php echo base_url(); ?>admin/send_message',
        dataType : 'json',  
        success:  function (data){
        callback();
    }
        
    }); 





    // $.getJSON('<?php echo base_url(); ?>buyer/send_message?message=' + message + '&requestid=' + $('#requestid').val() + '&userid=' + $('#userid').val() , function (data){
    //     callback();
    // });
}

var append_chat_data = function (chat_data) {
    chat_data.forEach(function (data) {

        var is_me = data.a_to_b ;







        if(is_me=="b"){
            var html = '<li class="left clearfix messages">';
            html += '   <span class="chat-img pull-left">';
            html += '       <img src="http://placehold.it/50/55C1E7/fff&text=' + data.nickname.slice(0,2) + '" alt="User Avatar" class="img-circle" />';
            html += '   </span>';

            if(data.attachment != ""){

                html += '   <div class="chat-body clearfix pull-right">';
                html += '<img src="<?php echo base_url()?>uploads/images/' + data.attachment + '" alt="Attachment" class="img-thumb" style="height:200px !important;width:200px !important;" /> <a href="<?php echo site_url()?>download?type=images&filename='+data.attachment+'">Download</a>' ;

                 html += '   </div>';

            }


            html += '   <div class="chat-body clearfix">';
              html += '       <p  >' + data.message + '</p> ';
            html += '       <small>';
            
            html +=   parseTimestamp(data.timestamp) ;
            
            html += '       </small>';
          
            html += '   </div>';
            html += '</li>';
        }else if(is_me=="a"){

             var html = '<li class="right clearfix messages">';
            html += '   <span class="chat-img pull-right">';
            html += '<img src="http://placehold.it/50/FA6F57/fff&text=' + data.nickname.slice(0,2) + '" alt="User Avatar" class="img-circle" />';
            html += '   </span>';

            if(data.attachment != ""){

                html += '   <div class="chat-body clearfix pull-left">';
                html += '<img src="<?php echo base_url()?>uploads/images/' + data.attachment + '" alt="Attachment" class="img-thumb" style="height:200px !important;width:200px !important;" /> <a href="<?php echo site_url()?>download?type=images&filename='+data.attachment+'">Download</a>' ;

                 html += '   </div>';

            }


            html += '   <div class="chat-body clearfix pull-right">';
             html += '       <p   >' + data.message + '</p> ';
            html += '       <small  > ' + parseTimestamp(data.timestamp)  ;
            
             
            
            html += '       </span> ';
           
            html += '   </div>';
            html += '</li>';

        }

            
       
        $("#received").html( $("#received").html() + html);
    });
  
    $('#received').animate({ scrollTop: $('#received').height()}, 1000);
}

var update_chats = function () {
    if(typeof(request_timestamp) == 'undefined' || request_timestamp == 0){
        var offset = 60*15; // 15min
        request_timestamp = parseInt( Date.now() / 1000 - offset );
    }
    $.getJSON('<?php echo base_url(); ?>admin/get_messages?timestamp=' + request_timestamp + '&requestid=' + $('#requestid').val() + '&userid=' + $('#userid').val(), function (data){



var count = 0;

$('.messages').each(function(){
count = count + 1;
});




var datalen  = data.length ;

 

if(datalen>count){

var i = datalen-count ;

   append_chat_data(data.slice(-i));  
}

       






        var newIndex = data.length-1;
        if(typeof(data[newIndex]) != 'undefined'){
            request_timestamp = data[newIndex].timestamp;
        }
    });      
}

$('#submit').click(function (e) {
    e.preventDefault();
    
    var $field = $('#message');
if($('#message').val()=="" && $('#file-input').val()=="" ){
    alert("enter message to send");
    return  false   ;
} else{

     

     var message = $field.val();

    $field.addClass('disabled').attr('disabled', 'disabled');
    sendChat(message, function (){
        $field.val('').removeClass('disabled').removeAttr('disabled');
         $('.dropify-clear').click();
    });






}

   
});

$('#message').keyup(function (e) {
    if (e.which == 13) {
        $('#submit').trigger('click');
    }
});

setInterval(function (){
    update_chats();
}, 1500);



 

// https://gist.github.com/kmaida/6045266
var parseTimestamp = function(timestamp) {
    var d = new Date( timestamp * 1000 ), // milliseconds
        yyyy = d.getFullYear(),
        mm = ('0' + (d.getMonth() + 1)).slice(-2),  // Months are zero based. Add leading 0.
        dd = ('0' + d.getDate()).slice(-2),         // Add leading 0.
        hh = d.getHours(),
        h = hh,
        min = ('0' + d.getMinutes()).slice(-2),     // Add leading 0.
        ampm = 'AM',
        timeString;
            
    if (hh >= 12) {
        
    } else if (hh === 12) {
        h = 12;
        ampm = 'PM';
    } else if (hh == 0) {
        h = 12;
    }

    timeString = yyyy + '-' + mm + '-' + dd + ', ' + h + ':' + min + ' ' + ampm;
        
    return timeString;
}


</script>

 
 <?php $this->load->view('admin/footer');?>
 
</body>
</html>