'use strict';
/**
 * @author Batch Themes Ltd.
 */
(function() {
    $(function() {
        if (!element_exists('#charts-easy-pie-chart')) {
            return false;
        }
        var colors = bootstrap_colors();
        var palette = get_palette();
        //primary
        easyPieChart('.easy-pie-chart-primary-xs', colors.primary, palette['border-color'], 100);
        easyPieChart('.easy-pie-chart-primary-md', colors.primary, palette['border-color'], 150);
        easyPieChart('.easy-pie-chart-primary-lg', colors.primary, palette['border-color'], 200);
        //secondary
        easyPieChart('.easy-pie-chart-secondary-xs', colors.secondary, palette['border-color'], 100);
        easyPieChart('.easy-pie-chart-secondary-md', colors.secondary, palette['border-color'], 150);
        easyPieChart('.easy-pie-chart-secondary-lg', colors.secondary, palette['border-color'], 200);
        //info
        easyPieChart('.easy-pie-chart-info-xs', colors.info, palette['border-color'], 100);
        easyPieChart('.easy-pie-chart-info-md', colors.info, palette['border-color'], 150);
        easyPieChart('.easy-pie-chart-info-lg', colors.info, palette['border-color'], 200);
        //success
        easyPieChart('.easy-pie-chart-success-xs', colors.success, palette['border-color'], 100);
        easyPieChart('.easy-pie-chart-success-md', colors.success, palette['border-color'], 150);
        easyPieChart('.easy-pie-chart-success-lg', colors.success, palette['border-color'], 200);
        //warning
        easyPieChart('.easy-pie-chart-warning-xs', colors.warning, palette['border-color'], 100);
        easyPieChart('.easy-pie-chart-warning-md', colors.warning, palette['border-color'], 150);
        easyPieChart('.easy-pie-chart-warning-lg', colors.warning, palette['border-color'], 200);
        //danger
        easyPieChart('.easy-pie-chart-danger-xs', colors.danger, palette['border-color'], 100);
        easyPieChart('.easy-pie-chart-danger-md', colors.danger, palette['border-color'], 150);
        easyPieChart('.easy-pie-chart-danger-lg', colors.danger, palette['border-color'], 200);
    });
})();
