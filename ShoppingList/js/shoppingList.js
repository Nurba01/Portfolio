$('ul').on('click', 'li', function() {
    $(this).toggleClass('done');
})

$('ul').on('click', 'span', function(event) {
    event.stopPropagation();
    $(this).parent().fadeOut(3000, function() {
        $(this).remove();
    })
})

$('input').keypress(function(event) {
    if (event.which == 13) {

        let itemText = $(this).val();
        $(this).val('');
        $('ul').append('<li>' + itemText + '<span><i class = "fas fa-backspace"></i></span>');
    }
})

$('h2 span').click(function() {
    $('input').fadeToggle();
})