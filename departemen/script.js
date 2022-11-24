var keyword = document.getElementById('keyword')
var tombolCari =document.getElementById('tombol-cari');
var container = document.getElementById('container');

keyword.addEventListener('keyup', function(){
    //membuat objek ajax
    var xhr = new XMLHttpRequest();
    //cek ajax ready
    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4 && xhr.status == 200){
            container.innerHTML = xhr.responseText;
        }
    }
    //eksekusi ajax
    xhr.open('GET', 'getmhs.php?keyword=' + keyword +'', 'true');
    xhr.send();
});
