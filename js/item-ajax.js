$( document ).ready(function() {
/* Create new Item */
$(".crud-submit").click(function(e){
    e.preventDefault();
    var form_action = $("#create-item").find("form").attr("action");
    var name = $("#create-item").find("input[name='name']").val();
    var email = $("#create-item").find("input[name='email']").val();
    var body = $("#create-item").find("textarea[name='body']").val();
    var filedoc = $("#create-item").find("file[name='filedoc']").val();

    if(name != '' && email != ''&& body != ''&& filedoc != ''){
        $.ajax({
            dataType: 'json',
            type:'POST',
            url: url + form_action,
            data:{name:name, email:email, body:body, filedoc:filedoc}
        }).done(function(data){
            $("#create-item").find("input[name='name']").val('');
            $("#create-item").find("input[name='email']").val('');
             $("#create-item").find("textarea[name='body']").val('');
            $("#create-item").find("file[name='filedoc']").val('');
            getPageData();
            $(".modal").modal('hide');
            toastr.success('Item Created Successfully.', 'Success Alert', {timeOut: 5000});
        });
    }else{
        alert('You are missing title or description.')
    }
});

});