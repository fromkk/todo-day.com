/*
 * jQuery.upload v1.0.2
 *
 * Copyright (c) 2010 lagos
 * Dual licensed under the MIT and GPL licenses.
 *
 * http://lagoscript.org
 */
(function($) {

	var uuid = 0;

	$.fn.upload = function(url, data, callback, type) {
            var file = this;
            var self = this,
                    iframeName = 'jquery_upload' + ++uuid,
                    iframe = $('<iframe name="' + iframeName + '" style="position:absolute;top:-9999px" />').appendTo('body'),
                    form = $('<form target="' + iframeName + '" method="post" enctype="multipart/form-data" />').attr('action', url).appendTo('body');

            if ($.isFunction(data)) {
                    type = callback;
                    callback = data;
                    data = {};
            }

            var parentFile = $(file).parents().get(0);
            $(form).prepend(file);

            form.submit(function() {
                iframe.load(function() {
                    var data = handleData(this, type);

                    form.after(self).remove();
                    $(parentFile).prepend( file );
                    setTimeout(function() {
                            iframe.remove();
                            if (type === 'script') {
                                    $.globalEval(data);
                            }
                            if (callback) {
                                    callback.call(self, data);
                            }
                    }, 0);
                });
            }).submit();

            return this;
	};

	function createInputs(data) {
            return $.map(param(data), function(param) {
                return '<input type="hidden" name="' + param.name + '" value="' + param.value + '"/>';
            }).join('');
	}

	function param(data) {
            if ($.isArray(data)) {
                    return data;
            }
            var params = [];

            function add(name, value) {
                    params.push({name:name, value:value});
            }

            if (typeof data === 'object') {
                    $.each(data, function(name) {
                            if ($.isArray(this)) {
                                    $.each(this, function() {
                                            add(name, this);
                                    });
                            } else {
                                    add(name, $.isFunction(this) ? this() : this);
                            }
                    });
            } else if (typeof data === 'string') {
                    $.each(data.split('&'), function() {
                            var param = $.map(this.split('='), function(v) {
                                    return decodeURIComponent(v.replace(/\+/g, ' '));
                            });

                            add(param[0], param[1]);
                    });
            }

            return params;
	}

	function handleData(iframe, type) {
            var data, contents = $(iframe).contents().get(0);

            if ($.isXMLDoc(contents) || contents.XMLDocument) {
                    return contents.XMLDocument || contents;
            }
            data = $(contents).find('body').html();

            switch (type) {
                    case 'xml':
                            data = parseXml(data);
                            break;
                    case 'json':
                            var match = data.match(/[^{]*({.*})[^}]*/);
                            data = window.eval('(' + match[1] + ')');
                            break;
            }
            return data;
	}

	function parseXml(text) {
            if (window.DOMParser) {
                    return new DOMParser().parseFromString(text, 'application/xml');
            } else {
                    var xml = new ActiveXObject('Microsoft.XMLDOM');
                    xml.async = false;
                    xml.loadXML(text);
                    return xml;
            }
	}

})(jQuery);