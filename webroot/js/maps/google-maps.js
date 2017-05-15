'use strict';
/**
 * @author Batch Themes Ltd.
 */
(function() {
    $(function() {
        if (!element_exists('#maps-google-maps')) {
            return false;
        }
        var colors = bootstrap_colors();
        googleMapSimple();
        googleMapGeolocation();
        googleMapStyled(colors);
        googleMapTransit();
        googleMapBicycling();
        googleMapStreetView();
    });
})();
