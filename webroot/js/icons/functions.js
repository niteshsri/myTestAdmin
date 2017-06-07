'use strict';
function search_icons(selector) {
    var icons = [];
    $(selector).each(function() {
        icons.push($(this).data('icon'));
    });
    icons = _.uniq(icons);
    $('#search-icons').on('keyup', function() {
        var val = $(this).val();
        var results = icons.filter(function(value) {
            console.log(value, val);
            return value.match(val);
        });
        $(selector).each(function() {
            var icon = $(this).data('icon');
            if (results.indexOf(icon) === -1) {
                $(this).addClass('hidden');
            } else {
                $(this).removeClass('hidden');
            }
        });
    });
}
