<script type="text/javascript">
    $('#add_comment').bootstrapValidator({
        message: 'This value is not valid', feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            id_cafe: {validators: {notEmpty: {message: ''}}},
            comment: {validators: {notEmpty: {message: ''}}}
        }
    }).on('success.form.bv', function (e) {
        e.preventDefault();
        var $form = $(e.target);
        var bv = $form.data('bootstrapValidator');
        $.post($form.attr('action'), $form.serialize(), function (data) {
            var result = JSON.parse(data);

            if(result['valid']){

                location.reload();

            }
            else
            {
                alert(result['valid'])
            }
        }).fail(function () {
            alert("Erorr");
        });
    });
</script>