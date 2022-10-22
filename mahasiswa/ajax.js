//Ajax for display irs in mahasiswa page
var keyword = document.getElementById('semester');
var content = document.getElementById('irscontent');

function getXMLHTTPRequest() {
  if (window.XMLHttpRequest) {

    return new XMLHttpRequest();
  } else {
    // code for old IE browsers
    return new ActiveXObject('Microsoft.XMLHTTP');
  } 
}

keyword.addEventListener('change', function(){
	var xmlhttp = getXMLHTTPRequest();

	xmlhttp.onreadystatechange = function () {
    	if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      		content.innerHTML = xmlhttp.responseText;
    	}
  	};

  	xmlhttp.open('GET','get_mhs_irs.php?keyword=' + keyword.value);
  	xmlhttp.send();
	
});