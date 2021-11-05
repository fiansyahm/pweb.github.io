var xmlHttp = createXMLHttpRequestobject();
// membuat ivyek XMMLHTTPREQUEST
function createXMLHttpRequestobject() {
    var xmlHttp;
    if (window.ActiveXObject) {
        try {
            xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");

        } catch (e) {
            xmlHttp = false;
        }
    } else {
        try {
            xmlHttp = new XMLHttpRequest();
        } catch (e) {
            xmlHttp = false;
        }
    }
    // muncul pesan ababila obejel gagal dibuat
    if (!xmlHttp) {
        alert("Objek XMLHTTPREQUEST gagal dibuat");
    } else {

        return xmlHttp;
    }
}

function process() {
    if (xmlHttp.readyState == 4 || xmlHttp.readyState == 0) {
        nama = encodeURIComponent(document.getElementById("namaAnda").value);
        // xmlHttp.open("GET", "pweb-7-cek.php?nama=" + nama, true);
        xmlHttp.open("GET", "pweb-7-cek.php?nama=" + nama, true)
        xmlHttp.onreadystatechange = handleServerResponse;
        xmlHttp.send(null);

        // xmlHttp.open("GET", "pweb-7-Cek.php?nama=" + nama, false);
        // xmlHttp.send(null);
        // handleServerResponse();
    } else {
        setTimeout('process()', 1000);
    }
}

function handleServerResponse() {
    if (xmlHttp.readyState == 4) {
        if (xmlHttp.status == 200) {
            xmlResponse = xmlHttp.responseXML;
            XMLDocumentElement = xmlResponse.documentElement;
            hasil = XMLDocumentElement.firstChild.data;
            document.getElementById("respon").innerHTML = '<i>' + hasil + '</i>';
            setTimeout('process', 1000);
        } else {

            document.getElementById("respon").innerHTML = '<i>' + "gagal akses" + '</i>';
            alert("Terjadi masalah dalam mengakses server" + xmlHttp.statusText);
        }
    }
}