<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <script
    src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
    </script>
    <!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
    <link rel="stylesheet" href="../library/css/style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <style>
      

      /* Float four columns side by side */
      .column {
        float: left;
        padding: 0 10px;
        margin-right: 10px;
      }

      .column2 {
        float: left;
        padding: 0 10px;
        margin-top: 60px;
        margin-right: 10px;
      }

      /* Remove extra left and right margins, due to padding */
      .row {
        margin: 0 150px;
        display: flex;
      }
      

      /* Clear floats after the columns */
      .row:after {
        content: "";
        display: table;
        clear: both;
      }
      

      /* Responsive columns */
      @media screen and (max-width: 600px) {
        .column {
          width: 100%;
          display: flex;
          margin-bottom: 20px;
        }
      }

      /* Style the counter cards */
      .card {
        box-shadow: 1px 6px 8px 0 rgba(0, 0, 0, 0.2);
        border-radius: 24px;
        text-align: center;
        height: 290px;
        width: 290px;
        padding: 20px;
        text-align: center;
        background-color: #f1f1f1;
        align-content: center;
        cursor: pointer;
        display: flexbox;
        margin-right: 90px;
        transition: all ease 0.3s;
      }

      .card:hover {
        background-color: #8974FF;
        color: white;
        transition: all ease 0.3s;
      }

      .card h3 {
        font-size: 100px;
        text-align: center;
        align-content: center;
      }

      a{
        text-decoration: none;
        color: black;
      }

      canvas{
        margin: 150px;
        margin-left: 350px;
        text-align: center;
        width:100%;
      }

      
      </style>
   
    </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
        <img src="" alt="" class="logo-undip">
        <div class="logo_name">Universitas Diponegoro</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
      
      <li>
        <a href="index.php">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">Home</span>
        </a>
         <span class="tooltip">Home</span>
      </li>
      <li>
       <a href="datamhs.php">
         <i class='bx bx-user' ></i>
         <span class="links_name">Data Mahasiswa</span>
       </a>
       <span class="tooltip">Data Mahasiswa</span>
     </li>
     <li>
       <a href="mhspkl.php">
         <i class='bx bx-chat' ></i>
         <span class="links_name">Mahasiswa PKL</span>
       </a>
       <span class="tooltip">Mahasiswa PKL</span>
     </li>
     <li>
       <a href="mhsskripsi.php">
         <i class='bx bx-pie-chart-alt-2' ></i>
         <span class="links_name">Mahasiswa Skripsi</span>
       </a>
       <span class="tooltip">Mahasiswa Skripsi</span>
     </li>
     <li>
       <a href="../logout.php">
        <i class='bx bx-log-out' id="log_out" ></i>
         <span class="links_name">Keluar</span>
       </a>
       <span class="tooltip">Keluar</span>
     </li>
     
     <li class="profile">
         <div class="profile-details">
           <!--<img src="profile.jpg" alt="profileImg">-->
           <div class="name_job">
              <div class="name">Mahasiswa</div>
              <div class="job">Informatika</div>
           </div>
         </div>
         <i class="fa fa-bars" id="bars"></i>>
     </li>
    </ul>
  </div>

  <section class="home-section">
      <div class="text">Home</div>

      <div class="row">
      <div class="column">
        <a href="../statusmhs/mhsktif.php">
        <div class="card">
        <br><p>Jumlah Mahasiswa Aktif</p><br>          
        <h3>231</h3>
        </div>
        </a>
      </div>

      <div class="column">
      <a href="../statusmhs/mhscuti.php">
        <div class="card">
        <br><p>Jumlah Mahasiswa Cuti</p><br>          
        <h3>23</h3>
        </div>
        </a>
      </div>
      
      <div class="column">
        <a href="../statusmhs/mhsmangkir.php">
          <div class="card">
          <br><p>Jumlah Mahasiswa Mangkir</p><br>          
          <h3>11</h3>
          </div>
        </a>
      </div>
          
      </div>
      
      <canvas id="myChart" style="width:100%;max-width:700px"></canvas>

      <script>
      var xValues = ["Aktif", "Cuti", "Mangkir"];
      var yValues = [231, 23, 11];
      var barColors = ["red", "green","blue"];

      new Chart("myChart", {
        type: "bar",
        data: {
          labels: xValues,
          datasets: [{
            backgroundColor: barColors,
            data: yValues
          }]
        },
        options: {
          legend: {display: false},
          title: {
            display: true,
            text: "Status Mahasiswa"
          }
        }
      });
      </script>
  </section>
  
  <script src="../library/js/script.js"> </script>

</body>
</html>
