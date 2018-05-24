function HttpRequest(sUrl, fpCallback) 
{
    this.url = sUrl;
    this.callBack = fpCallback;
    this.async = true;
    this.request = this.createXmlHttpRequest();
}

HttpRequest.prototype.createXmlHttpRequest = function () {
    if (window.XMLHttpRequest) {

        var oHttp = new XMLHttpRequest();
        return oHttp;

    } else if (window.ActiveXObject) {

        var versions = 
        [
            "MSXML2.XmlHttp.6.0",
            "MSXML2.XmlHttp.3.0"
        ];

        for (var i = 0; i < versions.length; i++) 
        {
            try 
            {
                oHttp = new ActiveXObject(versions[i]);
                return oHttp;
            } 
            catch (error) 
            {
              //do nothing here
            }
        }
    }
    return null;
}

HttpRequest.prototype.send = function() 
{
    this.request.open("GET", this.url, this.async);
    
    if (this.async) {
        var tempRequest = this.request;
        var fpCallback = this.callBack;
        
        function request_readystatechange() 
        {
            if (tempRequest.readyState == 4) 
            {
                if (tempRequest.status == 200) 
                {
                    fpCallback(tempRequest.responseText);
                } 
                else 
                {
                    alert("An error occurred while attempting to contact the server.");
                }
            }
        }
        
        this.request.onreadystatechange = request_readystatechange;
    }
    
    this.request.send(null);
    
    if (!this.async) 
    {
        this.callBack(this.request.responseText);
    }
}