function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toGMTString();
    document.cookie = cname + "=" + cvalue;
}
function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i].trim();
        if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
    }
    return "";
}
function checkCookie() {
    var user = getCookie("userid");
    if (user != "") {
        //alert("Welcome again " + user);
        document.getElementById("userid").value = user;
    }
}
function formSetCookie() {
    document.cookie = "userid=; expires=Thu, 01 Jan 1970 00:00:00 GMT";
    setCookie("userid", document.getElementById("userid").value, 2);
    //alert(String(document.getElementById("userid")));
}
function jump(){
    self.location='index.html'
}
function jumpToRank() {
    self.location = 'ranklist.php'
}
function getInnerHTML() {
    alert(document.getElementById("userid").value);
}