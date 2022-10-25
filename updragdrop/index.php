<!DOCTYPE html>
<html>
<head>
<title>Upload File With Drag And Drop File</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link href="style.css" rel="stylesheet">
<body>
<div id="drop_zone">
   <p>Drop file here</p>
   <p>or</p>
   <p><button type="button" id="btn_file_pick" class="btn btn-primary"><span class="glyphicon glyphicon-folder-open"></span>  Select File</button></p>
   <p id="file_info"></p>
   <p><button type="button" id="btn_upload" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-up"></span>  Upload To Server</button></p>
   <input type="file" id="selectfile">
   <p id="message_info"></p>
</div>
<script>
var fileobj;
$(document).ready(function(){
   $("#drop_zone").on("dragover", function(event) {
     event.preventDefault();  
     event.stopPropagation();
     return false;
   });
   $("#drop_zone").on("drop", function(event) {
     event.preventDefault();  
     event.stopPropagation();
     fileobj = event.originalEvent.dataTransfer.files[0];
     var fname = fileobj.name;
     var fsize = fileobj.size;
     if (fname.length > 0) {
        document.getElementById('file_info').innerHTML = "File name : " + fname +' <br>File size : ' + bytesToSize(fsize);
     }
     document.getElementById('selectfile').files[0] = fileobj;
     document.getElementById('btn_upload').style.display="inline";
   });
   $('#btn_file_pick').click(function(){
     /*normal file pick*/
     document.getElementById('selectfile').click();
     document.getElementById('selectfile').onchange = function() {
     fileobj = document.getElementById('selectfile').files[0];
     var fname  = fileobj.name;
     var fsize = fileobj.size;
     if (fname.length > 0) {
        document.getElementById('file_info').innerHTML = "File name : " + fname +' <br>File size : ' + bytesToSize(fsize);
     }
        document.getElementById('btn_upload').style.display="inline";
     };
   });
   $('#btn_upload').click(function(){
     if(fileobj=="" || fileobj==null){
        alert("Please select a file");
        return false;
     }else{
        ajax_file_upload(fileobj);
     }
   });
});
function ajax_file_upload(file_obj) {
   if(file_obj != undefined) {
     var form_data = new FormData();                  
     form_data.append('upload_file', file_obj);
     $.ajax({
        type: 'POST',
        url: 'upload.php',
        contentType: false,
        processData: false,
        data: form_data,
        beforeSend:function(response) {
          $('#message_info').html("Uploading your file, please wait...");
        },
        success:function(response) {
          $('#message_info').html(response);
          alert(response);
          $('#selectfile').val('');
        }
     });
   }
}
function bytesToSize(bytes) {
   var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
   if (bytes == 0) return '0 Byte';
   var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
   return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
}
</script>
</body>
</html>