'use strict';
function chartJsLine(element, colors) {
    var ctx = document.getElementById(element);
    var data = {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [{
            label: 'Evolution',
            fill: false,
            lineTension: 0.1,
            backgroundColor: hexToRgbA(colors.success, 0.5),
            borderColor: hexToRgbA(colors.success, 1),
            borderCapStyle: 'butt',
            borderDash: [],
            borderDashOffset: 0.0,
            borderJoinStyle: 'miter',
            pointBorderColor: hexToRgbA(colors.success, 1),
            pointBackgroundColor: colors.white,
            pointBorderWidth: 1,
            pointHoverRadius: 5,
            pointHoverBackgroundColor: hexToRgbA(colors.success, 1),
            pointHoverBorderColor: hexToRgbA(colors.success, 1),
            pointHoverBorderWidth: 2,
            pointRadius: 1,
            pointHitRadius: 10,
            data: [
                random(20, 80),
                random(20, 80),
                random(20, 80),
                random(20, 80),
                random(20, 80),
                random(20, 80),
                random(20, 80)
            ],
        }]
    };
    new Chart(ctx, {
        type: 'line',
        data: data,
        options: {}
    });
}
function chartJsArea(element, colors) {
    var ctx = document.getElementById(element);
    var data = {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [{
            label: 'Evolution',
            fill: true,
            lineTension: 0.1,
            backgroundColor: hexToRgbA(colors.danger, 0.5),
            borderColor: hexToRgbA(colors.danger, 1),
            borderCapStyle: 'butt',
            borderDash: [],
            borderDashOffset: 0.0,
            borderJoinStyle: 'miter',
            pointBorderColor: hexToRgbA(colors.danger, 1),
            pointBackgroundColor: colors.white,
            pointBorderWidth: 3,
            pointHoverRadius: 5,
            pointHoverBackgroundColor: hexToRgbA(colors.danger, 1),
            pointHoverBorderColor: hexToRgbA(colors.danger, 1),
            pointHoverBorderWidth: 3,
            pointRadius: 2,
            pointHitRadius: 10,
            data: [65, 59, 80, 81, 56, 55, 40],
        }]
    };
    new Chart(ctx, {
        type: 'line',
        data: data,
        options: {}
    });
}
function chartJsBar(element, colors) {
    var ctx = document.getElementById(element);
    var data = {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [{
            label: 'Evolution',
            backgroundColor: hexToRgbA(colors.primary, 0.5),
            borderColor: hexToRgbA(colors.primary, 1),
            borderWidth: 2,
            hoverBackgroundColor: hexToRgbA(colors.primary, 0.5),
            hoverBorderColor: hexToRgbA(colors.primary, 1),
            data: [35, 49, 60, 41, 66, 65, 45],
        }, {
            label: 'Growth',
            backgroundColor: hexToRgbA(colors.success, 0.5),
            borderColor: hexToRgbA(colors.success, 1),
            borderWidth: 2,
            hoverBackgroundColor: hexToRgbA(colors.success, 0.5),
            hoverBorderColor: hexToRgbA(colors.success, 1),
            data: [65, 59, 80, 81, 56, 55, 40],
        }]
    };
    new Chart(ctx, {
        type: 'bar',
        data: data,
        options: {}
    });
}
function chartJsHorizontalBar(element, colors) {
    var ctx = document.getElementById(element);
    var data = {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [{
            label: 'Evolution',
            backgroundColor: hexToRgbA(colors.primary, 0.5),
            borderColor: hexToRgbA(colors.primary, 1),
            borderWidth: 2,
            hoverBackgroundColor: hexToRgbA(colors.primary, 0.5),
            hoverBorderColor: hexToRgbA(colors.primary, 1),
            data: [35, 49, 60, 41, 66, 65, 45],
        }, {
            label: 'Growth',
            backgroundColor: hexToRgbA(colors.success, 0.5),
            borderColor: hexToRgbA(colors.success, 1),
            borderWidth: 2,
            hoverBackgroundColor: hexToRgbA(colors.success, 0.5),
            hoverBorderColor: hexToRgbA(colors.success, 1),
            data: [65, 59, 80, 81, 56, 55, 40],
        }]
    };
    new Chart(ctx, {
        type: 'horizontalBar',
        data: data,
        options: {}
    });
}
function chartJsRadar(element, colors) {
    var ctx = document.getElementById(element);
    var pointBorderColor = hexToRgbA(colors.white);
    var data = {
        labels: ['Eating', 'Drinking', 'Sleeping', 'Designing', 'Coding', 'Cycling', 'Running'],
        datasets: [{
            label: 'Evolution',
            backgroundColor: hexToRgbA(colors.warning, 0.5),
            borderColor: hexToRgbA(colors.warning, 1),
            pointBackgroundColor: hexToRgbA(colors.warning, 1),
            pointBorderColor: pointBorderColor,
            pointHoverBackgroundColor: pointBorderColor,
            pointHoverBorderColor: hexToRgbA(colors.warning, 1),
            data: [65, 59, 90, 81, 56, 55, 40]
        }, {
            label: 'Growth',
            backgroundColor: hexToRgbA(colors.danger, 0.5),
            borderColor: hexToRgbA(colors.danger, 1),
            pointBackgroundColor: hexToRgbA(colors.danger, 1),
            pointBorderColor: pointBorderColor,
            pointHoverBackgroundColor: pointBorderColor,
            pointHoverBorderColor: hexToRgbA(colors.danger, 1),
            data: [28, 48, 40, 19, 96, 27, 100]
        }]
    };
    new Chart(ctx, {
        type: 'radar',
        data: data,
        options: {}
    });
}
function chartJsPolarArea(element, colors) {
    var ctx = document.getElementById(element);
    var data = {
        datasets: [{
            data: [
                11,
                16,
                7,
                3,
                14
            ],
            backgroundColor: [
                hexToRgbA(colors.success, 0.5),
                hexToRgbA(colors.warning, 0.5),
                hexToRgbA(colors.danger, 0.5),
                hexToRgbA(colors.info, 0.5),
                hexToRgbA(colors.primary, 0.5)
            ],
            hoverBackgroundColor: [
                hexToRgbA(darken(colors.success, 10), 0.5),
                hexToRgbA(darken(colors.warning, 10), 0.5),
                hexToRgbA(darken(colors.danger, 10), 0.5),
                hexToRgbA(darken(colors.info, 10), 0.5),
                hexToRgbA(darken(colors.primary, 10), 0.5)
            ],
            borderColor: [
                hexToRgbA(colors.success, 0.5),
                hexToRgbA(colors.warning, 0.5),
                hexToRgbA(colors.danger, 0.5),
                hexToRgbA(colors.info, 0.5),
                hexToRgbA(colors.primary, 0.5)
            ],
            hoverBorderColor: [
                hexToRgbA(darken(colors.success, 10), 0.5),
                hexToRgbA(darken(colors.warning, 10), 0.5),
                hexToRgbA(darken(colors.danger, 10), 0.5),
                hexToRgbA(darken(colors.info, 10), 0.5),
                hexToRgbA(darken(colors.primary, 10), 0.5)
            ],
            label: 'My dataset' // for legend
        }],
        labels: [
            'Green',
            'Yellow',
            'Red',
            'Info',
            'Primary'
        ]
    };
    new Chart(ctx, {
        type: 'polarArea',
        data: data,
        options: {}
    });
}
function chartJsPie(element, colors) {
    var ctx = document.getElementById(element);
    var data = {
        labels: [
            'Green',
            'Yellow',
            'Red'
        ],
        datasets: [{
            data: [300, 50, 100],
            backgroundColor: [
                colors.success,
                colors.warning,
                colors.danger
            ],
            hoverBackgroundColor: [
                darken(colors.success, 10),
                darken(colors.warning, 10),
                darken(colors.danger, 10)
            ],
            borderColor: [
                darken(colors.success, 0),
                darken(colors.warning, 0),
                darken(colors.danger, 0)
            ],
            hoverBorderColor: [
                darken(colors.success, 10),
                darken(colors.warning, 10),
                darken(colors.danger, 10)
            ],
        }]
    };
    new Chart(ctx, {
        type: 'pie',
        data: data,
        options: {}
    });
}
function chartJsDoughnut(element, colors) {
    var ctx = document.getElementById(element);
    var data = {
        labels: [
            'Green',
            'Yellow',
            'Red'
        ],
        datasets: [{
            data: [300, 50, 100],
            backgroundColor: [
                colors.success,
                colors.warning,
                colors.danger
            ],
            hoverBackgroundColor: [
                darken(colors.success, 10),
                darken(colors.warning, 10),
                darken(colors.danger, 10)
            ],
            borderColor: [
                darken(colors.success, 0),
                darken(colors.warning, 0),
                darken(colors.danger, 0)
            ],
            hoverBorderColor: [
                darken(colors.success, 10),
                darken(colors.warning, 10),
                darken(colors.danger, 10)
            ],
        }]
    };
    new Chart(ctx, {
        type: 'doughnut',
        data: data,
        options: {}
    });
}
function peityDonut(element, radius, colors) {
    return $(element).peity('donut', {
        width: radius,
        radius: radius,
        fill: colors
    });
}
function peityPie(element, radius, colors) {
    return $(element).peity('pie', {
        height: radius,
        width: radius,
        radius: radius,
        fill: colors
    });
}
function peityBar(element, height, width, color) {
    return $(element).peity('bar', {
        height: height,
        width: width,
        fill: [color]
    });
}
function peityLine(element, height, width, stroke) {
    return $(element).peity('line', {
        height: height,
        width: width,
        stroke: stroke,
        fill: 'transparent'
    });
}
function peityArea(element, height, width, color) {
    return $(element).peity('line', {
        height: height,
        width: width,
        stroke: color,
        fill: color
    });
}
function chartistPie1(element) {
    var data = {
        labels: ['Bananas', 'Apples', 'Grapes'],
        series: [20, 15, 40]
    };
    var options = {
        labelInterpolationFnc: function(value) {
            return value[0];
        }
    };
    var responsiveOptions = [
        ['screen and (min-width: 640px)', {
            chartPadding: 30,
            labelOffset: 100,
            labelDirection: 'explode',
            labelInterpolationFnc: function(value) {
                return value;
            }
        }],
        ['screen and (min-width: 1024px)', {
            labelOffset: 80,
            chartPadding: 20
        }]
    ];
    new Chartist.Pie(element, data, options, responsiveOptions);
}
function chartistDonut2(element) {
    var data = {
        series: [20, 10, 30, 40]
    };
    var options = {
        donut: true,
        donutWidth: 60,
        startAngle: 270,
        total: 200,
        showLabel: false
    };
    new Chartist.Pie(element, data, options);
}
function chartistLine1(element) {
    var data = {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
        series: [
            [1000, 1200, 1300, 1200, 1440, 1800, 1500],
            [1600, 1550, 1497, 1440, 1200, 1000, 1400],
        ]
    };
    var options = {
        fullWidth: true,
        showArea: false
    };
    new Chartist.Line(element, data, options);
}
function chartistPie2(element) {
    var data = {
        series: [20, 10, 30, 40]
    };
    new Chartist.Pie(element, data);
}
function chartistDonut1(element) {
    var data = {
        series: [20, 10, 30, 40]
    };
    var options = {
        donut: true
    };
    new Chartist.Pie(element, data, options);
}
function chartistScatter1(element) {
    var times = function(n) {
        return Array.apply(null, new Array(n));
    };
    var data = times(52).map(Math.random).reduce(function(data, rnd, index) {
        data.labels.push(index + 1);
        data.series.forEach(function(series) {
            series.push(Math.random() * 100);
        });
        return data;
    }, {
        labels: [],
        series: times(4).map(function() {
            return [];
        })
    });
    var options = {
        showLine: false,
        axisX: {
            labelInterpolationFnc: function(value, index) {
                return index % 13 === 0 ? 'W' + value : null;
            }
        }
    };
    var responsiveOptions = [
        ['screen and (min-width: 640px)', {
            axisX: {
                labelInterpolationFnc: function(value, index) {
                    return index % 4 === 0 ? 'W' + value : null;
                }
            }
        }]
    ];
    new Chartist.Line(element, data, options, responsiveOptions);
}
function chartistLine2(element) {
    var data = {
        labels: [1, 2, 3, 4, 5, 6, 7, 8],
        series: [
            [1, 2, 3, 1, -2, 0, 1, 0],
            [-2, -1, -2, -1, -2.5, -1, -2, -1],
            [0, 0, 0, 1, 2, 2.5, 2, 1],
            [2.5, 2, 1, 0.5, 1, 0.5, -1, -2.5]
        ]
    };
    var options = {
        high: 3,
        low: -3,
        showArea: true,
        showLine: false,
        showPoint: false,
        fullWidth: true,
        axisX: {
            showLabel: false,
            showGrid: false
        }
    };
    new Chartist.Line(element, data, options);
}
function chartistBar4(element) {
    var data = {
        labels: ['W1', 'W2', 'W3', 'W4', 'W5', 'W6', 'W7', 'W8', 'W9', 'W10'],
        series: [
            [1, 2, 4, 8, 6, -2, -1, -4, -6, -2]
        ]
    };
    var options = {
        high: 10,
        low: -10,
        axisX: {
            labelInterpolationFnc: function(value, index) {
                return index % 2 === 0 ? value : null;
            }
        }
    };
    new Chartist.Bar(element, data, options);
}
function chartistBar3(element) {
    var data = {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mai', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        series: [
            [5, 4, 3, 7, 5, 10, 3, 4, 8, 10, 6, 8],
            [3, 2, 9, 5, 4, 6, 4, 6, 7, 8, 7, 4]
        ]
    };
    var options = {
        seriesBarDistance: 10
    };
    var responsiveOptions = [
        ['screen and (max-width: 640px)', {
            seriesBarDistance: 5,
            axisX: {
                labelInterpolationFnc: function(value) {
                    return value[0];
                }
            }
        }]
    ];
    new Chartist.Bar(element, data, options, responsiveOptions);
}
function chartistBar1(element) {
    var data = {
        labels: ['Q1', 'Q2', 'Q3', 'Q4'],
        series: [
            [800000, 1200000, 1400000, 1300000],
            [200000, 400000, 500000, 300000],
            [100000, 200000, 400000, 600000]
        ]
    };
    var options = {
        stackBars: true,
        axisY: {
            labelInterpolationFnc: function(value) {
                return (value / 1000) + 'k';
            }
        }
    };
    var chart = Chartist.Bar(element, data, options);
    chart.on('draw', function(data) {
        if (data.type === 'bar') {
            data.element.attr({
                style: 'stroke-width: 40px'
            });
        }
    });
}
function chartistBar2(element) {
    var data = {
        labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
        series: [
            [5, 4, 3, 7, 5, 10, 3],
            [3, 2, 9, 5, 4, 6, 4]
        ]
    };
    var options = {
        seriesBarDistance: 10,
        reverseData: true,
        horizontalBars: true,
        axisY: {
            offset: 70
        }
    };
    new Chartist.Bar(element, data, options);
}
function easyPieChart(element, barColor, trackColor, size) {
    $(element).easyPieChart({
        barColor: barColor,
        size: size,
        trackColor: trackColor,
        scaleColor: false,
        animate: true,
        lineWidth: 10,
        lineCap: 'square',
        animate: 1000
    });
}
function echartsHorizontalBar1(element, colors, palette) {
    var chart = echarts.init(document.getElementById(element));
    var options = {
        color: [colors.success, colors.danger],
        title: {
            text: null,
            subtext: null
        },
        tooltip: {
            trigger: 'axis',
            axisPointer: {
                type: 'shadow'
            }
        },
        legend: {
            data: ['2015', '2016'],
            textStyle: {
                color: palette.color
            }
        },
        grid: {
            left: '3%',
            right: '4%',
            bottom: '3%',
            containLabel: true,
        },
        xAxis: {
            type: 'value',
            boundaryGap: [0, 0.01],
            axisLine: {
                lineStyle: {
                    color: palette.color
                }
            },
        },
        yAxis: {
            type: 'category',
            data: ['USA', 'Saudi Arabia', 'Russia', 'China', 'Canada', 'UAE'],
            axisLine: {
                lineStyle: {
                    color: palette.color
                }
            },
        },
        series: [{
            name: '2015',
            type: 'bar',
            data: [13379, 11429, 10351, 4271, 3984, 3273]
        }, {
            name: '2016',
            type: 'bar',
            data: [13973, 11624, 10853, 4572, 4383, 3471]
        }]
    };
    chart.setOption(options);
}
function echartsBar1(element, colors, palette) {
    var chart = echarts.init(document.getElementById('echart-bar-chart-1'));
    var options = {
        color: [colors.primary, colors.secondary],
        title: {
            text: null,
            subtext: null
        },
        grid: {
            borderColor: palette.borderColor
        },
        tooltip: {
            trigger: 'axis'
        },
        legend: {
            data: ['one', 'two'],
            textStyle: {
                color: palette.color
            }
        },
        toolbox: {
            show: false,
            feature: {
                dataView: {
                    show: true,
                    readOnly: false
                },
                magicType: {
                    show: true,
                    type: ['line', 'bar']
                },
                restore: {
                    show: true
                },
                saveAsImage: {
                    show: true
                }
            }
        },
        calculable: true,
        xAxis: [{
            type: 'category',
            data: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'],
            axisLine: {
                lineStyle: {
                    color: palette.color
                }
            },
        }],
        yAxis: [{
            type: 'value',
            axisLine: {
                lineStyle: {
                    color: palette.color
                }
            },
        }],
        series: [{
            name: 'Serie 1',
            type: 'bar',
            data: [2.0, 4.9, 7.0, 23.2, 25.6, 76.7, 135.6, 162.2, 32.6, 20.0, 6.4, 3.3],
            markPoint: {
                data: [{
                    type: 'max',
                    name: 'Max'
                }, {
                    type: 'min',
                    name: 'Min'
                }]
            },
            markLine: {
                data: [{
                    type: 'average',
                    name: 'Avg'
                }]
            }
        }, {
            name: 'Serie 2',
            type: 'bar',
            data: [2.6, 5.9, 9.0, 26.4, 28.7, 70.7, 175.6, 182.2, 48.7, 18.8, 6.0, 2.3],
            markPoint: {
                data: [{
                    name: 'one',
                    value: 182.2,
                    xAxis: 7,
                    yAxis: 183
                }, {
                    name: 'two',
                    value: 2.3,
                    xAxis: 11,
                    yAxis: 3
                }]
            },
            markLine: {
                data: [{
                    type: 'average',
                    name: 'avg'
                }]
            }
        }]
    };
    chart.setOption(options);
}
function echartsBar2(element, colors, palette) {
    var chart = echarts.init(document.getElementById(element));
    var options = {
        color: [colors.primary, colors.secondary, colors.info, colors.success, colors.warning, colors.danger],
        tooltip: {
            trigger: 'axis',
            axisPointer: {
                type: 'shadow' // line' | 'shadow'
            }
        },
        legend: {
            data: ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I'],
            textStyle: {
                color: palette.color
            }
        },
        grid: {
            left: '3%',
            right: '4%',
            bottom: '3%',
            containLabel: true,
        },
        xAxis: [{
            type: 'category',
            data: ['1', '2', '3', '4', '5', '6', '7'],
            axisLine: {
                lineStyle: {
                    color: palette.color
                }
            },
        }],
        yAxis: [{
            type: 'value',
            axisLine: {
                lineStyle: {
                    color: palette.color
                }
            },
        }],
        series: [{
            name: 'Serie A',
            type: 'bar',
            data: [320, 332, 301, 334, 390, 330, 320]
        }, {
            name: 'Serie B',
            type: 'bar',
            stack: 'serie b',
            data: [120, 132, 101, 134, 90, 230, 210]
        }, {
            name: 'Serie C',
            type: 'bar',
            stack: 'serie c',
            data: [220, 182, 191, 234, 290, 330, 310]
        }, {
            name: 'Serie D',
            type: 'bar',
            stack: 'serie d',
            data: [150, 232, 201, 154, 190, 330, 410]
        }, {
            name: 'Serie E',
            type: 'bar',
            data: [862, 1018, 964, 1026, 1679, 1600, 1570],
            markLine: {
                lineStyle: {
                    normal: {
                        type: 'dashed'
                    }
                },
                data: [
                    [{
                        type: 'min'
                    }, {
                        type: 'max'
                    }]
                ]
            }
        }, {
            name: 'Serie F',
            type: 'bar',
            barWidth: 5,
            stack: 'serie f',
            data: [620, 732, 701, 734, 1090, 1130, 1120]
        }, {
            name: 'Serie G',
            type: 'bar',
            stack: 'serie g',
            data: [120, 132, 101, 134, 290, 230, 220]
        }, {
            name: 'Serie H',
            type: 'bar',
            stack: 'serie h',
            data: [60, 72, 71, 74, 190, 130, 110]
        }, {
            name: 'Serie I',
            type: 'bar',
            stack: 'serie i',
            data: [62, 82, 91, 84, 109, 110, 120]
        }]
    };
    chart.setOption(options);
}
function echartsLine1(element, colors, palette) {
    var chart = echarts.init(document.getElementById(element));
    var randomData = function() {
        now = new Date(+now + oneDay);
        value = value + Math.random() * 21 - 10;
        return {
            name: now.toString(),
            value: [
                [now.getFullYear(), now.getMonth() + 1, now.getDate()].join('-'),
                Math.round(value)
            ]
        };
    };
    var data = [];
    var now = new Date(2010, 9, 3);
    var oneDay = 24 * 3600 * 1000;
    var value = Math.random() * 1000;
    for (var i = 0; i < 1000; i++) {
        data.push(randomData());
    }
    var options = {
        color: [colors.primary],
        title: {
            text: null
        },
        tooltip: {
            trigger: 'axis',
            formatter: function(params) {
                params = params[0];
                var date = new Date(params.name);
                return date.getDate() + '/' + (date.getMonth() + 1) + '/' + date.getFullYear() + ' : ' + params.value[1];
            },
            axisPointer: {
                animation: false
            }
        },
        xAxis: {
            type: 'time',
            axisLine: {
                lineStyle: {
                    color: palette.color
                }
            },
            splitLine: {
                show: false
            }
        },
        yAxis: {
            type: 'value',
            axisLine: {
                lineStyle: {
                    color: palette.color
                }
            },
            boundaryGap: [0, '100%'],
            splitLine: {
                show: false
            }
        },
        series: [{
            name: 'Serie A',
            type: 'line',
            showSymbol: false,
            hoverAnimation: false,
            data: data
        }]
    };
    chart.setOption(options);
    setInterval(function() {
        for (var i = 0; i < 5; i++) {
            data.shift();
            data.push(randomData());
        }
        chart.setOption({
            series: [{
                data: data
            }]
        });
    }, 1000);
}
function echartsLine2(element, colors, palette) {
    var chart = echarts.init(document.getElementById(element));
    var options = {
        color: [colors.primary, colors.secondary, colors.info, colors.success, colors.warning, colors.danger],
        title: {
            text: null,
            left: 'center'
        },
        tooltip: {
            trigger: 'item',
            formatter: '{a} <br/>{b} : {c}'
        },
        legend: {
            left: 'left',
            data: ['A', 'B'],
            textStyle: {
                color: palette.color
            }
        },
        xAxis: {
            type: 'category',
            name: 'x',
            axisLine: {
                lineStyle: {
                    color: palette.color
                }
            },
            splitLine: {
                show: false
            },
            data: ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I']
        },
        grid: {
            left: '3%',
            right: '4%',
            bottom: '3%',
            containLabel: true,
            borderColor: palette.borderColor
        },
        yAxis: {
            type: 'log',
            axisLine: {
                lineStyle: {
                    color: palette.color
                }
            },
            name: 'y'
        },
        series: [{
            name: 'Serie A',
            type: 'line',
            data: [1, 3, 9, 27, 81, 247, 741, 2223, 6669]
        }, {
            name: 'Serie B',
            type: 'line',
            data: [1, 2, 4, 8, 16, 32, 64, 128, 256]
        }, {
            name: 'Serie C',
            type: 'line',
            data: [1 / 2, 1 / 4, 1 / 8, 1 / 16, 1 / 32, 1 / 64, 1 / 128, 1 / 256, 1 / 512]
        }]
    };
    chart.setOption(options);
}
function echartsArea1(element, colors, palette) {
    var chart = echarts.init(document.getElementById(element));
    var options = {
        color: [colors.primary, colors.secondary, colors.info, colors.success, colors.warning, colors.danger],
        title: {
            text: null
        },
        tooltip: {
            trigger: 'axis'
        },
        legend: {
            data: ['one', 'two', 'three', 'four', 'five'],
            textStyle: {
                color: palette.color
            }
        },
        grid: {
            left: '3%',
            right: '4%',
            bottom: '3%',
            containLabel: true,
            borderColor: palette.borderColor
        },
        axisLabel: {
            textStyle: {
                color: palette.color
            }
        },
        xAxis: [{
            type: 'category',
            boundaryGap: false,
            data: ['one', 'two', 'three', 'four', 'five', 'six', 'seven'],
            axisLine: {
                lineStyle: {
                    color: palette.color
                }
            },
        }],
        yAxis: [{
            type: 'value',
            axisLine: {
                lineStyle: {
                    color: palette.color
                }
            },
        }],
        series: [{
            name: 'serie 1',
            type: 'line',
            stack: 'one',
            areaStyle: {
                normal: {}
            },
            data: [120, 132, 101, 134, 90, 230, 210]
        }, {
            name: 'serie 2',
            type: 'line',
            stack: 'two',
            areaStyle: {
                normal: {}
            },
            data: [220, 182, 191, 234, 290, 330, 310]
        }, {
            name: 'serie 3',
            type: 'line',
            stack: 'three',
            areaStyle: {
                normal: {}
            },
            data: [150, 232, 201, 154, 190, 330, 410]
        }, {
            name: 'serie 4',
            type: 'line',
            stack: 'four',
            areaStyle: {
                normal: {}
            },
            data: [320, 332, 301, 334, 390, 330, 320]
        }, {
            name: 'serie 5',
            type: 'line',
            stack: 'five',
            label: {
                normal: {
                    show: true,
                    position: 'top'
                }
            },
            areaStyle: {
                normal: {}
            },
            data: [820, 932, 901, 934, 1290, 1330, 1320]
        }]
    };
    chart.setOption(options);
}
function echartsDonut1(element, colors, palette) {
    var chart = echarts.init(document.getElementById(element));
    var options = {
        color: [colors.primary, colors.secondary, colors.info, colors.success, colors.warning, colors.danger],
        tooltip: {
            trigger: 'item',
            formatter: '{a} <br/>{b}: {c} ({d}%)'
        },
        legend: {
            orient: 'vertical',
            x: 'left',
            data: ['one', 'two', 'three', 'four', 'five'],
            textStyle: {
                color: palette.color
            }
        },
        series: [{
            name: 'serie 1',
            type: 'pie',
            radius: ['50%', '70%'],
            avoidLabelOverlap: false,
            label: {
                normal: {
                    show: false,
                    position: 'center'
                },
                emphasis: {
                    show: true,
                    textStyle: {
                        fontSize: '30',
                        fontWeight: 'bold'
                    }
                }
            },
            labelLine: {
                normal: {
                    show: false
                }
            },
            data: [{
                value: 335,
                name: 'one'
            }, {
                value: 310,
                name: 'two'
            }, {
                value: 234,
                name: 'three'
            }, {
                value: 135,
                name: 'four'
            }, {
                value: 1548,
                name: 'five'
            }]
        }]
    };
    chart.setOption(options);
}
function echartsPie1(element, colors, palette) {
    var chart = echarts.init(document.getElementById(element));
    var options = {
        color: [colors.primary, colors.secondary, colors.info, colors.success, colors.warning, colors.danger],
        title: {
            text: null,
            subtext: null,
            x: 'center'
        },
        tooltip: {
            trigger: 'item',
            formatter: '{a} <br/>{b} : {c} ({d}%)'
        },
        legend: {
            orient: 'vertical',
            left: 'left',
            data: ['USA', 'Saudi Arabia', 'Russia', 'China', 'Canada', 'Others'],
            textStyle: {
                color: palette.color
            }
        },
        series: [{
            name: 'Oil production',
            type: 'pie',
            radius: '55%',
            center: ['50%', '60%'],
            data: [{
                value: 13,
                name: 'USA'
            }, {
                value: 11,
                name: 'Saudi Arabia'
            }, {
                value: 10,
                name: 'Russia'
            }, {
                value: 4,
                name: 'Canada'
            }, {
                value: 40,
                name: 'Others'
            }],
            itemStyle: {
                emphasis: {
                    shadowBlur: 10,
                    shadowOffsetX: 0,
                    shadowColor: 'rgba(0, 0, 0, 0.5)'
                }
            }
        }]
    };
    chart.setOption(options);
}
function echartsPie2(element, colors, palette) {
    var chart = echarts.init(document.getElementById(element));
    var options = {
        color: [colors.primary, colors.secondary, colors.info, colors.success, colors.warning, colors.danger],
        backgroundColor: colors.grey900,
        title: {
            text: null,
            left: 'center',
            top: 20,
            textStyle: {
                color: colors.grey300
            }
        },
        tooltip: {
            trigger: 'item',
            formatter: '{a} <br/>{b} : {c} ({d}%)'
        },
        visualMap: {
            show: false,
            min: 80,
            max: 600,
            inRange: {
                colorLightness: [0, 1]
            }
        },
        series: [{
            name: 'serie 1',
            type: 'pie',
            radius: '55%',
            center: ['50%', '50%'],
            data: [{
                value: 335,
                name: 'one'
            }, {
                value: 310,
                name: 'two'
            }, {
                value: 274,
                name: 'three'
            }, {
                value: 235,
                name: 'four'
            }, {
                value: 400,
                name: 'five'
            }].sort(function(a, b) {
                return a.value - b.value;
            }),
            roseType: 'angle',
            label: {
                normal: {
                    textStyle: {
                        color: 'rgba(255, 255, 255, 0.3)'
                    }
                }
            },
            labelLine: {
                normal: {
                    lineStyle: {
                        color: 'rgba(255, 255, 255, 0.3)'
                    },
                    smooth: 0.2,
                    length: 10,
                    length2: 20
                }
            },
            itemStyle: {
                normal: {
                    color: '#c23531',
                    shadowBlur: 200,
                    shadowColor: 'rgba(0, 0, 0, 0.5)'
                }
            }
        }]
    };
    chart.setOption(options);
}
function echartsFunnel1(element, colors, palette) {
    var chart = echarts.init(document.getElementById(element));
    var options = {
        color: [colors.primary, colors.secondary, colors.info, colors.success, colors.warning, colors.danger],
        title: {
            text: null,
            subtext: null
        },
        tooltip: {
            trigger: 'item',
            formatter: '{a} <br/>{b} : {c}%'
        },
        legend: {
            data: ['one', 'two', 'three', 'four', 'five'],
            textStyle: {
                color: palette.color
            }
        },
        calculable: true,
        series: [{
            name: 'serie 1',
            type: 'funnel',
            left: '10%',
            top: 60,
            //x2: 80,
            bottom: 60,
            width: '80%',
            // height: {totalHeight} - y - y2,
            min: 0,
            max: 100,
            minSize: '0%',
            maxSize: '100%',
            sort: 'descending',
            gap: 2,
            label: {
                normal: {
                    show: true,
                    position: 'inside'
                },
                emphasis: {
                    textStyle: {
                        fontSize: 20
                    }
                }
            },
            labelLine: {
                normal: {
                    length: 10,
                    lineStyle: {
                        width: 1,
                        type: 'solid'
                    }
                }
            },
            itemStyle: {
                normal: {
                    borderColor: '#fff',
                    borderWidth: 1
                }
            },
            data: [{
                value: 60,
                name: 'one'
            }, {
                value: 40,
                name: 'two'
            }, {
                value: 20,
                name: 'three'
            }, {
                value: 80,
                name: 'four'
            }, {
                value: 100,
                name: 'five'
            }]
        }]
    };
    chart.setOption(options);
}
function morrisArea(element, colors) {
    var chart = Morris.Area({
        element: element,
        data: [{
            y: '2006',
            a: 100,
            b: 90
        }, {
            y: '2007',
            a: 75,
            b: 65
        }, {
            y: '2008',
            a: 50,
            b: 40
        }, {
            y: '2009',
            a: 75,
            b: 65
        }, {
            y: '2010',
            a: 50,
            b: 40
        }, {
            y: '2011',
            a: 75,
            b: 65
        }, {
            y: '2012',
            a: 100,
            b: 90
        }],
        xkey: 'y',
        ykeys: ['a', 'b'],
        //behaveLikeLine: true,
        labels: ['Series A', 'Series B'],
        lineColors: [colors.danger, colors.warning],
        lineWidth: 2,
        pointSize: 4,
        pointFillColors: [colors.danger, colors.warning],
        pointStrokeColors: [colors.danger, colors.warning],
    });
    $(window).resize(function() {
        chart.redraw();
    });
    $('body').on('toggle:collapsed', function() {
        chart.redraw();
    })
}
function morrisLine(element, colors) {
    var chart = Morris.Line({
        element: element,
        data: [{
            y: '2006',
            a: 100,
            b: 90
        }, {
            y: '2007',
            a: 75,
            b: 65
        }, {
            y: '2008',
            a: 50,
            b: 40
        }, {
            y: '2009',
            a: 75,
            b: 65
        }, {
            y: '2010',
            a: 50,
            b: 40
        }, {
            y: '2011',
            a: 75,
            b: 65
        }, {
            y: '2012',
            a: 100,
            b: 90
        }],
        xkey: 'y',
        ykeys: ['a', 'b'],
        labels: ['Series A', 'Series B'],
        lineColors: [colors.danger, colors.warning],
        lineWidth: 2
    });
    $(window).resize(function() {
        chart.redraw();
    });
    $('body').on('toggle:collapsed', function() {
        chart.redraw();
    })
}
function morrisDonut(element, colors) {
    var chart = Morris.Donut({
        element: element,
        colors: [colors.info, colors.success],
        data: [{
            label: 'A',
            value: 12
        }, {
            label: 'B',
            value: 30
        }, {
            label: 'C',
            value: 20
        }]
    });
    $(window).resize(function() {
        chart.redraw();
    });
    $('body').on('toggle:collapsed', function() {
        chart.redraw();
    })
}
function morrisBar(element, colors) {
    var chart = Morris.Bar({
        element: element,
        data: [{
            y: '2006',
            a: 100,
            b: 90
        }, {
            y: '2007',
            a: 75,
            b: 65
        }, {
            y: '2008',
            a: 50,
            b: 40
        }, {
            y: '2009',
            a: 75,
            b: 65
        }, {
            y: '2010',
            a: 50,
            b: 40
        }, {
            y: '2011',
            a: 75,
            b: 65
        }, {
            y: '2012',
            a: 100,
            b: 90
        }],
        xkey: 'y',
        ykeys: ['a', 'b'],
        labels: ['Series A', 'Series B'],
        barColors: [colors.info, colors.success],
    });
    $(window).resize(function() {
        chart.redraw();
    });
    $('body').on('toggle:collapsed', function() {
        chart.redraw();
    })
}
function nvd3Bar1(element, colors) {
    var data = [
        generateBarChartData('Stream #0', 20),
        generateBarChartData('Stream #1', 20),
        generateBarChartData('Stream #2', 20)
    ];
    nv.addGraph(function() {
        var chart = nv.models.multiBarChart()
            .reduceXTicks(true)
            .rotateLabels(0)
            .showControls(false)
            .groupSpacing(0)
            .color([colors.primary, colors.secondary, colors.info]);
        chart.xAxis
            .tickFormat(d3.format(',f'));
        chart.yAxis
            .tickFormat(d3.format(',.1f'));
        d3.select(element)
            .datum(data)
            .call(chart);
        nv.utils.windowResize(chart.update);
        return chart;
    });
}
function nvd3Bar2(element, colors) {
    var data = [
        generateBarChartData('Stream #0', 40),
        generateBarChartData('Stream #1', 40),
        generateBarChartData('Stream #2', 40)
    ];
    nv.addGraph(function() {
        var chart = nv.models.multiBarChart()
            .reduceXTicks(true)
            .rotateLabels(0)
            .showControls(false)
            .groupSpacing(0.1)
            .stacked(true)
            .color([colors.danger, colors.warning, colors.success]);
        chart.xAxis
            .tickFormat(d3.format(',f'));
        chart.yAxis
            .tickFormat(d3.format(',.1f'));
        d3.select(element)
            .datum(data)
            .call(chart);
        nv.utils.windowResize(chart.update);
        return chart;
    });
}
function nvd3Pie1(element, colors) {
    var data = [
        generatePieChartData('A', 30, colors.danger),
        generatePieChartData('B', 45, colors.success),
        generatePieChartData('C', 20, colors.warning)
    ]
    nv.addGraph(function() {
        var chart = nv.models.pieChart()
            .x(function(d) {
                return d.label;
            })
            .y(function(d) {
                return d.value;
            })
            .showLegend(false)
            .showLabels(true);
        d3.select(element)
            .datum(data)
            .transition()
            .duration(350)
            .call(chart);
        return chart;
    });
}
function nvd3Donut1(element, colors) {
    var data = [
        generatePieChartData('A', 20, colors.primary),
        generatePieChartData('B', 35, colors.warning),
        generatePieChartData('C', 40, colors.info),
        generatePieChartData('D', 10, colors.success)
    ]
    nv.addGraph(function() {
        var chart = nv.models.pieChart()
            .x(function(d) {
                return d.label;
            })
            .y(function(d) {
                return d.value;
            })
            .showLabels(true)
            .showLegend(false)
            .labelThreshold(0.05)
            .labelType('percent')
            .donut(true)
            .donutRatio(0.35);
        d3.select(element)
            .datum(data)
            .transition()
            .duration(350)
            .call(chart);
        return chart;
    });
}
function nvd3HorizontalBar1(element, colors) {
    var data = [
        generateMultiBarHorizontalChartData1('Series 1', colors.success, 10),
        generateMultiBarHorizontalChartData1('Series 2', colors.danger, 10)
    ]
    nv.addGraph(function() {
        var chart = nv.models.multiBarHorizontalChart()
            .x(function(d) {
                return d.label;
            })
            .y(function(d) {
                return d.value;
            })
            .margin({
                top: 30,
                right: 20,
                bottom: 50,
                left: 175
            })
            .showValues(true)
            .showControls(true);
        chart.yAxis
            .tickFormat(d3.format(',.2f'));
        d3.select(element)
            .datum(data)
            .call(chart);
        nv.utils.windowResize(chart.update);
        return chart;
    });
}
function nvd3HorizontalBar2(element, colors) {
    var data = [
        generateMultiBarHorizontalChartData2('Series 1', colors.primary, 10),
        generateMultiBarHorizontalChartData2('Series 2', colors.secondary, 10)
    ]
    nv.addGraph(function() {
        var chart = nv.models.multiBarHorizontalChart()
            .x(function(d) {
                return d.label;
            })
            .y(function(d) {
                return d.value;
            })
            .margin({
                top: 30,
                right: 20,
                bottom: 50,
                left: 175
            })
            .stacked(true)
            .showValues(true)
            .showControls(true);
        chart.yAxis
            .tickFormat(d3.format(',.2f'));
        d3.select(element)
            .datum(data)
            .call(chart);
        nv.utils.windowResize(chart.update);
        return chart;
    });
}
function nvd3Line1(element, colors) {
    var data = [
        generateLineChartData('Series 1', 40, false),
        generateLineChartData('Series 2', 40, false),
    ]
    nv.addGraph(function() {
        var chart = nv.models.lineChart()
            .useInteractiveGuideline(true)
            .showLegend(false)
            .color([colors.primary, colors.secondary])
            //.forceY([0, 1])
            .showYAxis(true)
            .showXAxis(true);
        chart.xAxis
            .axisLabel('Time (ms)')
            .tickFormat(d3.format(',r'));
        chart.yAxis
            .axisLabel('Voltage (v)')
            .tickFormat(d3.format('.02f'));
        d3.select(element)
            .datum(data)
            .call(chart);
        nv.utils.windowResize(function() {
            chart.update();
        });
        return chart;
    });
}
function nvd3Line2(element, colors) {
    var data = [
        generateLineChartData('Series 1', 40, true),
        generateLineChartData('Series 2', 40, true),
    ]
    nv.addGraph(function() {
        var chart = nv.models.lineChart()
            .useInteractiveGuideline(true)
            .showLegend(true)
            .showYAxis(true)
            //.forceY([-1.5, 1.5])
            .color([colors.warning, colors.danger])
            .showXAxis(true);
        chart.xAxis
            .axisLabel('Time (ms)')
            .tickFormat(d3.format(',r'));
        chart.yAxis
            .axisLabel('Voltage (v)')
            .tickFormat(d3.format('.02f'));
        d3.select(element)
            .datum(data)
            .call(chart);
        nv.utils.windowResize(function() {
            chart.update();
        });
        return chart;
    });
}
function nvd3Scatter1(element, colors) {
    var data = [
        generateScatterChartData('Series 1', 40)
    ]
    nv.addGraph(function() {
        var chart = nv.models.scatterChart()
            .showDistX(false)
            .showDistY(false)
            .showLegend(false)
            .color([colors.primary]);
        chart.xAxis.tickFormat(d3.format('.01f'));
        chart.yAxis.tickFormat(d3.format('.01f'));
        d3.select(element)
            .datum(data)
            .call(chart);
        nv.utils.windowResize(chart.update);
        return chart;
    });
}
