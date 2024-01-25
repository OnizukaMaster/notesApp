$(document).ready(function(){

    $(".display-card").on("click",".delete",function(){
        let obj = this;
        let id = $(this).attr("data-id");
        console.log("Hello");
        console.log(obj);
        $(obj).parent().parent().parent().fadeOut()

    })
})