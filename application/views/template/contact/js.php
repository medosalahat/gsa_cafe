<script type="text/javascript">
    $('#contact_form').bootstrapValidator({
        message: 'This value is not valid', feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            name: {validators: {notEmpty: {message: ''}}},
            mobile: {validators: {notEmpty: {message: ''}}},
            email: {validators: {notEmpty: {message: ''}}},
            message: {validators: {notEmpty: {message: ''}}}
        }
    }).on('success.form.bv', function (e) {
        e.preventDefault();
        var $form = $(e.target);
        var bv = $form.data('bootstrapValidator');
        $.post($form.attr('action'), $form.serialize(), function (data) {
            var result = JSON.parse(data);
            if(result['valid']){location.reload();}
            else {alert(result['valid'])}
        }).fail(function () {
            alert("Erorr");
        });
    });
</script>