/**
 * @author Batch Themes Ltd.
 */
(function() {
    'use strict';
    $(function() {
        if (!element_exists('#pages-coming-soon')) {
            return false;
        }
        var now = new Date();
        now.setDate(now.getDate() + 45);
        $('#coming-soon-counter').countdown(now).on('update.countdown', function(event) {
            $(this).html(event.strftime(
                '<div class="table-responsive"><table class="table table-unbordered"><tbody><tr>' +
                '<td><div class="circle"><span class="number">%D</span><span class="unit">days</span></div></td>' +
                '<td><span class="dots">:</span></td> ' +
                '<td><div class="circle"><span class="number">%H</span><span class="unit">hours</span></div></td>' +
                '<td><span class="dots">:</span></td> ' +
                '<td><div class="circle"><span class="number">%M</span><span class="unit">minutes</span></div></td>' +
                '<td><span class="dots">:</span></td> ' +
                '<td><div class="circle"><span class="number">%S</span><span class="unit">seconds</span></div></td>' +
                '</tr></tbody></table></div>'
            ));
        });
    });
})();
