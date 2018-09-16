$(function(){
    $('#link').css('visibility','hidden');

    $('#form-convert').on('submit', function(e){

        var formData = new FormData($('#form-convert')[0]);
        e.preventDefault();

        $('#link').css('visibility','hidden');

        $.ajax({
            type: 'POST',
            url: '/convert',
            data: formData,
            processData: false,
            contentType: false,
            dataType:'json',
            success: function(result){
                if(result.error){
                    alert(result.error);
                }
                else
                {
                    alert('Конвертация прошла успешно. Можете скачать файл.');
                    $('#link a').attr('href',result.success);
                    $('#link').css('visibility','visible');
                }
            }
        });
    });
});