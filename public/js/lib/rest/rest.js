(function(global, $) {

    function rest(type, url, data, callback) {
        if (typeof data === "function") {
            callback = data;
            data = {};
        }

        var der = $.Deferred();

        var ajax = $.ajax({
            type: type,
            url: url,
            data: data,
            success: function(rs) {
                if (rs.code === 4095) {
                    if (typeof callback === 'function') {
                        callback.call(this, rs.msg, rs.data);
                    }
                    der.resolveWith(this, [rs.data, rs.msg]);
                } else {
                    der.rejectWith(this, [rs.msg] || 'response text is not valid');
                }
            },
            error: function(xhr, msg, err) {
                der.rejectWith(this, [msg, xhr, err]);
            }
        });

        return $.extend(der.promise(), {
            abort: function() {
                ajax.abort();
            }
        });
    }

    $.extend({
        restGet: function() {
            return rest.apply(this, ['GET'].concat(Array.prototype.slice.call(arguments, 0)));
        },
        restPost: function() {
            return rest.apply(this, ['POST'].concat(Array.prototype.slice.call(arguments, 0)));
        }
    });

}) (this, jQuery);
