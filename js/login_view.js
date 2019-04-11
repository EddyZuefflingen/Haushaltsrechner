window.onload = function () 
{
    var CookieValue = getCookie("KeepUsername");
    if (CookieValue != "")
    {
        document.getElementById("Username").value = getCookie("KeepUsername");
        document.getElementById("KeepUsername").checked = true;
    }
}

function getCookie(cname) 
{
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) 
    {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
        c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
        }
    }
    return "";
} 

function KeepUsernameOnchange()
{
    if (document.getElementById("KeepUsername").checked)
    {
        document.cookie = "KeepUsername = " + document.getElementById("Username").value;
    }
    else
    {
        document.cookie = "KeepUsername=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
    }
}