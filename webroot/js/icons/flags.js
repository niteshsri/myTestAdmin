'use strict';
/**
 * @author Batch Themes Ltd.
 */
(function() {
    $(function() {
        if (!element_exists('#icons-flags')) {
            return false;
        }
        search_icons('.flag-icons .icon');
    });
})();
