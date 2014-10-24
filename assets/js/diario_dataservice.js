// Retorna o c�digo-fonte da p�gina passada como url
var getPageResponse = function(url) {
	var getRequest = function(url, success, error) {
		var req = false;
		try{
			// most browsers
			req = new XMLHttpRequest();
		} catch (e){
			// IE
			try{
				req = new ActiveXObject("Msxml2.XMLHTTP");
			} catch (e) {
				// try an older version
				try{
					req = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (e){
					return false;
				}
			}
		}
		if (!req) return false;
		if (typeof success != 'function') success = function () {};
		if (typeof error!= 'function') error = function () {};
		req.onreadystatechange = function(){
			if(req .readyState == 4){
				return req.status === 200 ? 
					success(req.responseText) : error(req.status)
				;
			}
		}
		req.open("GET", url, true);
		req.send(null);
		return req;
	}
	
	var content = '';
	
	getRequest(url,
		function(response) {
			content = response;
		},
		function(error) {
			throw error;
		});
	
	return content;
};

var getPageData = function(url) {
	return JSON.decode(getPageResponse(url));
}