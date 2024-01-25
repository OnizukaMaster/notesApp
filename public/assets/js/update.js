$(document).ready(function(){

    $("#myForm").on("keyup","#name,#desc",function(){
        title = $("#name").val();
    desc = $("#desc").val();
    id = $("#id").val();
  
    mydata = {title:title,desc:desc}

    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr("content")
        }
    })

    $.ajax({
        url:`/updatenotes/${id}`,
        method:"POST",
        data:mydata,
      
        beforeSend: function () {
            // Code to be executed before the request is sent
            $(".info").html("saving...")
        },
        success:function(e){
            
            $(".info").html("saved successfully")
            
        },
        error:function(err){
          
            $(".info").html(`<p class="text-red">Something went wrong unable to save</p>`)
           
        }
  
    })
    })
    
  })