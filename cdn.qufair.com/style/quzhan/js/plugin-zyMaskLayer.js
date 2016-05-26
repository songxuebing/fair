/**
 * @name zyMaskLayer jQuery-plugin v-1.0
 * @author by hj 2013-04-13
 * @param {String} eventTarget 弹出的那个DIV
 * @param {String} eventTargetClose 关闭按钮
 * @param {String} eventType 关闭的方式
 * @param {String} eventMask 指定背景层
 * @param {String} eventBool 背景层是否可以关闭,默认false.
 */
;
(function($) {
    var methods = {
        init: function(options) {
            var opts = $.extend({}, $.fn.zyMaskLayer.defaults, options);
            return this.each(function() {
                var mask = "<div id=" + opts.eventMask + "></div>";
                var _thisTop = 0;
                var _this = $(this).find(opts.eventTarget);

                $("body").append(mask);

                var $msakLayer = $("#" + opts.eventMask);

                $msakLayer.css({
                    "height": $(document).height() + "px"
                }).show();

                if (parseInt(_this.css("height")) >= parseInt($(window).height(), 10)) {
                    _thisTop = 0;
                } else {
                    _thisTop = (parseInt($(window).height(), 10) / 2 - parseInt(_this.height(), 10) / 2 + $(window).scrollTop());
                }

                _this.css({
                    "left": "50%",
                    "margin-left": -(parseInt(_this.css("width"), 10) / 2),
                    "top": _thisTop,
                    "z-index": parseInt($msakLayer.css("z-index"), 10) + 10
                }).fadeIn(500);

                _this.find(opts.eventTargetClose).on(opts.eventType, function() {
                    _this.hide(100);
                    $msakLayer.remove();
                    return false;
                });

                if (opts.eventBool) {
                    $msakLayer.on(opts.eventType, function() {
                        _this.hide(100);
                        $msakLayer.remove();
                        return false;
                    });
                }
                return false;
            });
        },
        hide: function(options) {
            var opts = $.extend({}, $.fn.zyMaskLayer.defaults, options);
            return this.each(function() {
                var _this = $(this).find(opts.eventTarget);
                var $msakLayer = $("#" + opts.eventMask);
                _this.hide(100);
                $msakLayer.remove();
            });
        }
    };
    $.fn.zyMaskLayer = function(method) {
        if (methods[method]) {
            return methods[method].apply(this, Array.prototype.slice.call(arguments, 1));
        } else if (typeof method === "object" || !method) {
            return methods.init.apply(this, arguments);
        } else {
            $.error("Method " + method + " does not exist on jQuery.zyMaskLayer");
        }
    };
    $.fn.zyMaskLayer.defaults = {
        eventTarget: ".global-mask",
        eventTargetClose: ".global-maskClose",
        eventType: "click",
        eventMask: "global-maskLayer",
        eventBool: false
    };
})(jQuery);