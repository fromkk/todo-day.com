(function() {
    $.fn.validate = function( val )
    {
        var defaults = {
            DELIMITER_OR : '|'
          , DELIMITER_AND: '&'
        };
        
        var funcs         = {};

        /**
         *
         */
        funcs.mail = function(val) {
            if ( null != val.match(/^[a-zA-Z0-9\-_\.!\"#\$%&'\(\)\=\^\|\[\]\{\}\?<>\+]+@([a-zA-Z0-9\-_\.]+\.[a-zA-Z0-9\-_\.]+)$/) ) {
                return true;
            }

            return false;
        }

        /**
         *
         */
        funcs.url = function(val) {
            if ( null != val.match(/(?:https?|ftp):\/\/[a-zA-Z0-9\-_\.\?&=%~]+/) ) {
                return true;
            }

            return false;
        }

        /**
         *
         */
        funcs.zip = function(val) {
            if ( null != val.match(/^[0-9]{3}\-[0-9]{4}$/) ) {
                return true;
            }

            return false;
        }

        /**
         *
         */
        funcs.digit = function(val) {
            if ( null != val.match(/^[0-9]+$/) ) {
                return true;
            }

            return false;
        }

        /**
         *
         */
        funcs.num = function(val) {
            if ( null != val.match(/^[\-]?[0-9,\.]+$/) ) {
                return true;
            }

            return false;
        }

        /**
         *
         */
        funcs.notnull = function(val) {
            if ( 0 != val.length ) {
                return true;
            }

            return false;
        }
        
        funcs.isnull = function(val) {
            return 0 == val.length;
        }

        /**
         *
         */
        funcs.alnum = function(val) {
            if ( null != val.match(/^[0-9a-zA-Z]+$/) ) {
                return true;
            }

            return false;
        }

        /**
         *
         */
        funcs.alp = function(val) {
            if ( null != val.match(/^[a-zA-Z]+$/) ) {
                return true;
            }

            return false;
        }
        
        funcs.kana = function(val) {
            if ( null != val.match(/^[ァ-ヶー　 ]+$/) ) {
                return true;
            }
            
            return false;
        }
        
        funcs._checkdate = function( year, month, day ) {
            var dt = new Date(year, month - 1, day);
            if(dt == null || dt.getFullYear() != year || dt.getMonth() + 1 != month || dt.getDate() != day) {
                return false;
            }
            return true;
        }
        
        funcs.date = function( val ) {
            var matches = val.match(/^([0-9]{4})[\-\/]{1}([0-9]{1,2})[\-\/]{1}([0-9]{1,2})/);
            
            if ( null != matches ) {
                return funcs._checkdate( Number(matches[1]), Number(matches[2]), Number(matches[3]) );
            }
            
            return false;
        }

        funcs.maxlength = function( val, maxlength ) {
            if ( maxlength >= val.length ) {
                return true;
            }

            return false;
        }

        funcs.minlength = function(val, minlength) {
            if ( minlength <= val.length ) {
                return true;
            }

            return false;
        }

        /**
         * 
         */
        var execute = function( options ) {
            if (options instanceof Array) {
                var cntOptions = options.length;

                var aryResult  = new Array();
                for (var i = 0; i < cntOptions; i++) {
                    aryResult[i] = execute( options[i] );
                }

                return aryResult;
            } else if ('object' == typeof(options) ) {
                var currentValue;
                var currentFunc = options.type;
                var checked;

                if( undefined != options.id) {
                    currentValue = $('#' + options.id).val();
                } else if ( undefined != options.name ) {
                    if ( "check" == options.mode ) {
                        checked = 0;
                        
                        $(":input[name=" + options.name + "]:checked").each( function() {
                            checked++;
                        } );
                        
                        if ( 0 != checked ) {
                            return true;
                        } else {
                            return false;
                        }
                    } else if ( "radio" == options.mode ) {
                        if ( undefined != $(':input[name=' + options.name + ']:checked').val() ) {
                            return true;
                        } else {
                            return false;
                        }
                    } else {
                        currentValue = $(':input[name=' + options.name + ']').val();
                    }
                } else {
                    return false;
                }

                if ( undefined == currentValue ) {
                    return false;
                }

                //max length
                if ( undefined != options.maxlength && 'number' == typeof (options.maxlength) ) {
                    if ( false === funcs.maxlength( currentValue , options.maxlength) ) {
                        return false;
                    }
                }

                //min length
                if ( undefined != options.minlength && 'number' == typeof (options.minlength) ) {
                    if ( false === funcs.minlength( currentValue , options.minlength) ) {
                        return false;
                    }
                }
                
                if ( undefined != currentFunc ) {
                    var listFuncs, cntError, j;
                    if ( -1 != currentFunc.indexOf(defaults.DELIMITER_OR) ) {
                        listFuncs = currentFunc.split(defaults.DELIMITER_OR);

                        cntCheck  = listFuncs.length;
                        cntError  = 0;

                        for ( j = 0; j < cntCheck; j++ ) {
                            if ( true == $.isFunction( funcs[ listFuncs[j] ] ) ) {
                                if ( false == funcs[ listFuncs[j] ]( currentValue )) {
                                    cntError++;
                                }
                            } else {
                                cntError++;
                            }
                        }

                        return cntError !== cntCheck ? true : false;
                    } else if ( -1 != currentFunc.indexOf(defaults.DELIMITER_AND) ) {
                        listFuncs = currentFunc.split(defaults.DELIMITER_AND);

                        cntCheck  = listFuncs.length;
                        cntError  = 0;

                        for ( j = 0; j < cntCheck; j++ ) {
                            if ( true == $.isFunction( funcs[ listFuncs[j] ] ) ) {
                                if ( false == funcs[ listFuncs[j] ]( currentValue )) {
                                    cntError++;
                                }
                            } else {
                                cntError++;
                            }
                        }

                        return 0 == cntError ? true : false;
                    } else if ( true == $.isFunction( funcs[ currentFunc ] ) ) {
                        return funcs[ currentFunc ]( currentValue );
                    } else {
                        return false;
                    }
                } else {
                    return true;
                }
            }

            return false;
        }

        return execute( val );
    }
})(jQuery);