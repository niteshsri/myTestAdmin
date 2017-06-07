'use strict';
/**
 * @author Batch Themes Ltd.
 */
(function() {
    $(function() {
        if (!element_exists('#charts-chartist')) {
            return false;
        }
        chartistBar1('#bar-chart-1');
        chartistBar2('#bar-chart-2');
        chartistBar3('#bar-chart-3');
        chartistBar4('#bar-chart-4');
        chartistLine1('#line-chart-1');
        chartistLine2('#line-chart-2');
        chartistDonut1('#donut-chart-1');
        chartistDonut2('#donut-chart-2');
        chartistPie1('#pie-chart-1');
        chartistPie2('#pie-chart-2');
        chartistScatter1('#scatter-chart-1');
    });
})();
