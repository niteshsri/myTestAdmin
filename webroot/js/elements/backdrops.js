'use strict';
/**
 * @author Batch Themes Ltd.
 */
(function() {
    $(function() {
        $('.left-sidebar-backdrop').on('click', function() {
            $(this).removeClass('fade');
            $(this).removeClass('in');
            $('body').toggleClass('layout-collapsed');
        });
        $('.right-sidebar-backdrop').on('click', function() {
            $(this).removeClass('fade');
            $(this).removeClass('in');
            $('.right-sidebar-outer').removeClass('show-from-right');
        });
        $('.theme-config-backdrop').on('click', function() {
            $(this).removeClass('fade');
            $(this).removeClass('in');
            $('.theme-config-outer').removeClass('show-from-bottom');
        });
    });
})();
