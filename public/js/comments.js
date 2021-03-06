$(document).ready(function(){
    $(".confirm_edit_comment").hide();
	
    $(".edit_comment").click(function(){
        console.log(1);
        var id = $(this).attr("id").substring(4);
        $("#content"+id).hide();
        $("#input"+id).show();
        $(this).hide();
        $("#confirm"+id).show();
    })

    $(".confirm_edit_comment").click(function(){
        var id = $(this).attr("id").substring(7);
        var comment = $("#input"+id).val();
       
       $.ajax({
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/edit_comment',
            data: {
                'user_id':user_id,
                'comment_id':id,
                'comment':comment
            },
            success: function(data){
                console.log(data);
                 
                 $("#content"+id).html("<p id='content"+id+"'>"+comment+"</p>");
                 $("#content"+id).show();
                 
                 $("#input"+id).hide();
                 
                 $(".confirm_edit_comment").hide();
                 
                 $("#edit"+id).show();
               
            }
        }); 
        
    });

    $("#new_comment_btn").click(function(){
        var comment = $("#new_comment_text").val();
        if(!comment)
            alert("Seems an Empty Comment");
        else
        {
        $(this).hide();
            $("#new_comment_text").val('');
            $.ajax({
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/add_comment',
                data: {
                    'user_id':user_id,
                    'article_id':article_id,
                    'comment':comment                    
                },
                success: function(data){
                    if(data=="success")
                    {

                        location.reload();
//                        $("#comment_insert").html('<hr> <h4 >'+username+'</h4> <input type="text" class="edit_box" id="input{{$comment->comment_id}}" value="'+comment+'" hidden></input>            <p id="content{{$comment->comment_id}}">'+comment+'</p>            <span>Now</span>');
                       // $(this).show();
                    }
                }
           });
        }
    });
});