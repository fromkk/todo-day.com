(function() {
    $.fn.author_form = function() {
        var element = this;
        var form    = $(element).closest('form');
        
        $('[name=mode]', form).val('back');
        
        form.submit();
    }
})(jQuery);

$(function() {
    $('.back').click( function() {
        $(this).author_form();
    } );
});