var keyword = document.getElementById('keyword');
var tombolCari =document.getElementById('tombol-cari');
var kontainer = document.getElementById('kontainer');


keyword.addEventListener('change', function(){
    //membuat objek ajax
    var xhr = new XMLHttpRequest();
    //cek ajax ready
    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4 && xhr.status == 200){
            kontainer.innerHTML = xhr.responseText;
        }
    }
    //eksekusi ajax
    xhr.open('GET', 'getmhspkl.php?keyword'+ keyword.value, true);
    xhr.send();
});