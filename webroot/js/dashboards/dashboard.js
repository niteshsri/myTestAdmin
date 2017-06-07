'use strict';
/**
 * @author Batch Themes Ltd.
 */
(function() {
    $(function() {
        if (!element_exists('#dashboards-dashboard')) {
            return false;
        }
        function peityArea1(element, height, color) {
            $(element).peity('line', {
                height: height,
                width: '100%',
                stroke: color,
                fill: color
            });
        }
        function peityBar1(element, height, color) {
            $(element).peity('bar', {
                height: height,
                width: '100%',
                fill: [color]
            });
        }
        var colors = bootstrap_colors();
        peityBar1('.bar-chart-1', 75, colors.success);
        peityBar1('.bar-chart-2', 75, colors.danger);
        peityArea1('.area-chart-1', 75, colors.warning);
        peityArea1('.area-chart-2', 75, colors.info);
        morrisBar('bar-chart-3', colors);
        morrisLine('line-chart-1', colors);
        //redraw components after window resize. this can be removed in production
        function onResizeEnd() {
            peityBar1('.bar-chart-1', 75, colors.success);
            peityBar1('.bar-chart-2', 75, colors.danger);
            peityArea1('.area-chart-1', 75, colors.warning);
            peityArea1('.area-chart-2', 75, colors.info);
            $('body').trigger('changed:background');
        }
        var resizeTimeout;
        $(window).on('resize', function() {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(onResizeEnd, 500);
        });
        $('body').on('toggle:collapsed', function() {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(onResizeEnd, 500);
        })
        setTimeout(function() {
            $('.progress-bar').each(function() {
                var value = $(this).attr('data-value');
                $(this).animate({
                    width: value + '%'
                }, 1000);
            });
        }, 1000);
    });
})();
