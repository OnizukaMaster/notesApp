// js function to remove limit characters
function trim(text, maxLength) {
    return text.length > maxLength ? text.slice(0, maxLength - 3) + '...' : text;

}

// captalize first letter of username
function toCaptalize(name){
    var cap =  name.slice(0,1).toUpperCase()
    var remaining = name.slice(1,name.length)
    return cap+remaining;
}


function remove() {
    $(".dis-btn").removeAttr("disabled")
    $(".head").text("Update ")

}


$(document).ready(function () {
    function showAdd() {
        let output = ""

        $.ajax({
            method: "GET",
            dataType: "json",
            url: "/getData",
            success: function (data) {
                if (data) {
                    if(data.data.length>0){
                    console.log(data);
                    for (i = 0; i < data.data.length; i++) {
                        output += `
                 <div  class="col-md-3 mb-4">
                <div  class="card" style="min-height: 190px">
                    <div class="card-body">
                        <h5 class="card-title">${trim(data.data[i].title, 20)}</h5>
                        <p class="card-text">${trim(data.data[i].description, 125)}</p> 
                    </div>
                    <div  class=" d-flex justify-content-end mx-3 mb-1 gap-2">
                    <a  href="/update/${data.data[i].id}" class="cta card-link"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001"/>
                  </svg></a>
                    <a   data-id="${data.data[i].id}" class="cta delete" href="javascript:void(0)" class="card-link"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                  </svg></a>
                    </div>
                </div>
            </div> 
                `
                    }
                }
                else{
                    output+=`
                    <div class="container   text-center" style="height:40vh">

                   
                        <img src="/assets/images/empty.png" class="animate-empty" width="150px" height="150px" alt="empty box">
                        <h3 class="mb-3">Feels So Empty</h3>
                        <a href="/notes" class="btn btn-dark rounded-pill"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
                      </svg> Add Notes</a>
                 
                    </div>`
                }

                    $("#display-card").html(output)
                    $(".username").html(toCaptalize(data.users.name))
                }
            },

            error: function (err) {
                console.log("something went wrong" + err);
            }
        })

    }

    showAdd()

    //ajax to delete cards
    $("#display-card").on("click", ".delete", function () {
        let obj = this;
        let id = $(this).attr("data-id");
        $.ajax({
            url: `/delete/${id}`,
            method: "GET",
            success: function (data) {
                $(obj).parent().parent().parent().fadeOut()
                showAdd()
            }
        })

    })

    // ajax code to update notes
    $("#myForm").on("keyup", "#name,#desc", function () {
        title = $("#name").val();
        desc = $("#desc").val();
        id = $("#id").val();

        mydata = { title: title, desc: desc }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content")
            }
        })

        $.ajax({
            url: `/updatenotes/${id}`,
            method: "POST",
            data: mydata,

            beforeSend: function () {
                // Code to be executed before the request is sent
                $(".info").html("saving...")
            },
            success: function (e) {

                $(".info").html("saved successfully")

            },
            error: function (err) {

                $(".info").html(`<p class="text-red">Something went wrong unable to save</p>`)

            }

        })
    })

})