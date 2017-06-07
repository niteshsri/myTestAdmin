'use strict';
/**
 * @author Batch Themes Ltd.
 */
(function() {
    $(function() {
        if (!element_exists('#icons-font-awesome')) {
            return false;
        }
        search_icons('.font-awesome-icons .icon');
    });
})();
