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

function add_irs(kode_mk){
	console.log(kode_mk)
	var xmlhttp = getXMLHTTPRequest();
	console.log(kode_mk);
	xmlhttp.open('GET','add_irs.php?kode_mk=' + kode_mk);

	xmlhttp.onreadystatechange = function () {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById(kode_mk).innerHTML = xmlhttp.responseText;
		}
  	};

  	
  	xmlhttp.send();
}

// delete irs
function delete_irs(kode_mk,semester){
	var xmlhttp = getXMLHTTPRequest();
	var url = 'delete_irs.php?kode_mk=' + kode_mk + '&semester='+ semester
	console.log(url);
	xmlhttp.open('GET',url, true);

	xmlhttp.onreadystatechange = function () {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
	  		document.getElementById(kode_mk).innerHTML = xmlhttp.responseText;
		}
  	};
  	xmlhttp.send();
}

//function get khs
function get_khs($smt){
	var xmlhttp = getXMLHTTPRequest();
	var url = 'get_khs.php?semester=' + $smt;
	console.log(url);
	xmlhttp.open('GET',url, true);

	xmlhttp.onreadystatechange = function () {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
	  		document.getElementById('khscontent').innerHTML = xmlhttp.responseText;
		}
  	};
  	xmlhttp.send();
}

