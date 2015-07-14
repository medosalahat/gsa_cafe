<script type="text/javascript">
    $('#login_user').bootstrapValidator({
        message: 'This value is not valid', feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            email: {validators: {notEmpty: {message: ''}}},
            password: {validators: {notEmpty: {message: ''}}}
        }
    }).on('success.form.bv', function (e) {
        e.preventDefault();
        var $form = $(e.target);
        var bv = $form.data('bootstrapValidator');
        $.post($form.attr('action'), $form.serialize(), function (data) {
            var result = JSON.parse(data);

            if(result['valid']){

                setTimeout(reload_page(), 2000);

                $(document).trigger("add-alerts", [
                    {
                        'message': result['message'],
                        'priority': 'success'
                    }
                ]);

            }
            else
            {
                $(document).trigger("add-alerts", [
                    {
                        'message': result['message'],
                        'priority': 'error'
                    }
                ]);
            }
        }).fail(function () {
            alert("Erorr");
        });
    });

    function reload_page(){

        location.reload();
    }

</script>