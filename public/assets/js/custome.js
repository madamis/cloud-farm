$('ready', function (){
   $('.select2').select2();
});
function deleteModel(model, link)
{

    $('.delete-'+model).on('click', function (){
        let id = $(this).attr('id')
        // console.log('clicked');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: link+'take/'+id,
            type: "get",

            success: function(response){
                console.log(response)
                try {
                    response = JSON.parse(response)
                }catch (e){
                    console.log(e)
                }
                $('#'+model+'Body').html('Do you want to delete <b>'+response.title+'</b>?')
                $('#'+model+'Form').attr('action',link+id)
                $('#'+model+'Modal').modal('show');
            }
        });
    });
}
