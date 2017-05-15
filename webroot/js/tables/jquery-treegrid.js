'use strict';
/**
 * @author Batch Themes Ltd.
 * @url http://maxazan.github.io/jquery-treegrid/
 */
$.extend($.fn.treegrid.defaults, {
    expanderExpandedClass: 'fa fa-angle-down',
    expanderCollapsedClass: 'fa fa-angle-right'
});
(function() {
    $(function() {
        if (!element_exists('#tables-jquery-treegrid')) {
            return false;
        }
        $('.treegrid').treegrid();
        var count_root_elements = 10;
        var count_deep = 5;
        for (var i = 0; i < count_root_elements; i++) {
            $('<tr></tr>').addClass('treegrid-' + i + '-0').appendTo($('.large-treegrid')).html('<td>Root node ' + i + '</td><td>More info</td>');
            for (var j = 1; j < count_deep; j++) {
                $('<tr></tr>').addClass('treegrid-' + i + '-' + j).addClass('treegrid-parent-' + i + '-' + (j - 1)).appendTo($('.large-treegrid')).html('<td>Child node ' + i + '-' + j + '</td><td>More info</td>');
            }
        }
        $('.large-treegrid').treegrid({
            initialState: 'collapsed'
        });
    });
})();
