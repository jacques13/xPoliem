﻿(function($){$.jqIpLocation=function(opt){var def={ip:'null',success:null};if(opt){$.extend(def,opt)}var locType="ip-city";var url='http://api.ipinfodb.com/v3/'+locType+'/?key=9730aa0c8b5c67b560947f664bf9c4f5128a3b81b0ff6f3f0f16dca1bea46fcb&ip='+def.ip+'&format=json&callback=?';$.getJSON(url,function(data){if($.isFunction(def.success))def.success.call(this,data)})}})(jQuery);