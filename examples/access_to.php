<?php 

    $server 	= "localhost";	// Change this to correspond with your database port
    $username 	= "id17819145_viplav";			// Change if use webhost online
    $password 	= "Cvpp@12345678910";
    $DB 		= "id17819145_smartsnib";


    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Database Connection failed: " . $conn->connect_error);
    }

    $query ="SELECT lock_info.Lock_ID, Area, User_Name FROM 
    lock_info, access_id, lock_access_relation WHERE
     lock_info.Lock_ID = lock_access_relation.Lock_ID AND
      lock_access_relation.Access_ID = access_id.Access_ID ORDER BY lock_info.Lock_ID";
    $result = $conn->query($query);

echo"
<!DOCTYPE html>
<html lang='en'>

<head>
  <meta charset='utf-8' />
  <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
  <link rel='apple-touch-icon' sizes='76x76' href='../assets/img/apple-icon.png'>
  <link rel='icon' type='image/png' href='../assets/img/favicon.png'>
  <title>
    Add Lock Profile
  </title>
  <!--     Fonts and icons     -->
  <link href='https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800' rel='stylesheet' />
  <link href='https://use.fontawesome.com/releases/v5.0.6/css/all.css' rel='stylesheet'>
  <!-- Nucleo Icons -->
  <link href='../assets/css/nucleo-icons.css' rel='stylesheet' />
  <!-- CSS Files -->
  <link href='../assets/css/black-dashboard.css?v=1.0.0' rel='stylesheet' />

  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href='../assets/demo/demo.css' rel='stylesheet' />
</head>

<body class=''>
  <div class='wrapper'>
        <div class='sidebar' style='height: 60%'>
        <div class='sidebar-wrapper'>
        <div class='logo'>
            <a href='javascript:void(0)' class='simple-text logo-mini'>
            S.S
            </a>
            <a href='javascript:void(0)' class='simple-text logo-normal'>
            Edit Access
            </a>
        </div>
        <ul class='nav'>
            <li>
            <a href='./tables.php'>
                <i class='tim-icons icon-bullet-list-67'></i>
                <p>Lock List</p>
            </a>
            </li>
            <li>
            <a href='./addLock.php'>
                <i class='tim-icons icon-single-02'></i>
                <p>Add Lock Profile</p>
            </a>
            </li>
            <li >
            <a href='./deleteLock.php'>
                <i class='tim-icons icon-scissors'></i>
                <p>Delete Lock Profile</p>
            </a>
            </li>

            <li class='active'>
            <a href='./access_to.php'>
                <i class='tim-icons icon-settings'></i>
                <p>Edit Access</p>
            </a>
            </li>

            <li>
              <a href='./notifications.php'>
                <i class='tim-icons icon-bell-55'></i>
                <p>Notifications  &nbsp 
                    <span  class='badge badge-secondary' id='demo'> loading...</span>
                </p>
              </a>
            </li>
            <li class='active-pro'>
            <p style='margin: 0 13px; font-size: 12px;'>
                <b>Project By SSGMCE, Shegaon</b>
            </p>
            </li>
        </ul>
        </div>
        </div>
  
    <div class='main-panel'>
      <!-- Navbar -->
      <nav class='navbar navbar-expand-lg navbar-absolute navbar-transparent'>
        <div class='container-fluid'>
          <div class='navbar-wrapper'>
            <div class='navbar-toggle d-inline'>
              <button type='button' class='navbar-toggler'>
                <span class='navbar-toggler-bar bar1'></span>
                <span class='navbar-toggler-bar bar2'></span>
                <span class='navbar-toggler-bar bar3'></span>
              </button>
            </div>
            <a class='navbar-brand' href='javascript:void(0)'> Smart Snib </a>
          </div>
          <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navigation' aria-expanded='false' aria-label='Toggle navigation'>
            <span class='navbar-toggler-bar navbar-kebab'></span>
            <span class='navbar-toggler-bar navbar-kebab'></span>
            <span class='navbar-toggler-bar navbar-kebab'></span>
          </button>
          <div class='collapse navbar-collapse' id='navigation'>
           
           <ul class='navbar-nav ml-auto'>
              <li class='search-bar input-group'>
                   <span class='d-lg-none d-md-block'>Search</span>
                </button>
              </li>
             
              <li class='separator d-lg-none'></li>
            </ul>
          </div>
        </div>
      </nav>
      <div class='modal modal-search fade' id='searchModal' tabindex='-1' role='dialog' aria-labelledby='searchModal' aria-hidden='true'>
        <div class='modal-dialog' role='document'>
          <div class='modal-content'>
            <div class='modal-header'>
              <input type='text' class='form-control' id='inlineFormInputGroup' placeholder='SEARCH'>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <i class='tim-icons icon-simple-remove'></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- End Navbar -->
      <div class='content'>
        <div class='row'>
          <div class='col-md-12'>
            <div class='card'>
              <div class='card-header'>
                <h5 class='title'>Edit</h5>
              </div>
              <div class='card-body'>

                <form method='POST' action='./deleteLock/deleteLockProfile.php' >
                  <div class='row'>
                    <div class='col-md-5 pr-md-1'>
                      <div class='form-group'>
                        <label>Lock Identification Number</label>
                        <input type='text' id='idNumber' name='idNumber' class='form-control' placeholder='Identification Number' >
                      </div>
                    </div>
                    <div class='col-md-3 px-md-1'>
                      <div class='form-group'>
                        <label>Access ID</label>
                        <input type='text' id='accessID' name='accessID' class='form-control' placeholder='Identification Number'>
                      </div> 
                    </div>

                    <div class='col-md-4 pl-md-1'>
                      <div class='form-group'>
                        <label> Action</label><br>
                          <select type='text' id='action' name='action' class='form-control'>
                                <option value='0' style='color: black'> Select Action </option>            
                                <option value='delete' style='color: black'> Delete User </option>
                                <option value='add' style='color: black'> Add User </option>
                            </select>
                        </div>
                    </div>
                  </div>
                  
                  <div class='card-footer'>
                <button type='submit' class='btn btn-fill btn-primary'>Proceed</button>
              </div>
                </form>
              </div>
              
            </div>
          </div>
          
        </div>
     
        <div class='row'>
            <div class='col-md-12'>
              <div class='card '>
                <div class='card-header'>
                    <h4 class='card-title'> Reference</h4>
                </div>
                <div class='card-body'>
                <div class='table-responsive'>
                    <table class='table tablesorter ' id=''>
                    <thead class=' text-primary'>
                        <tr>
                            <th>
                            Sr. No.
                            </th>
                            <th>
                            Lock ID
                            </th>
                            <th>
                            Area
                            </th>
                            <th>
                            Access To
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                     ";

                  $i=1;
                  while($row = $result->fetch_assoc()) {
                   echo "<tr>
                          <td> ".
                            $i."
                          </td>
                          <td>
                            ".$row['Lock_ID']."
                         </td>
                      <td>
                        ".$row['Area']."
                      </td>
                      <td >
                        ".$row['User_Name']."
                      </td>
                    </tr> " ;

                    $i++;

                  }


                  echo"
                  </tbody>
                </table>
              </div>
            </div>
          </div>
         </div>
        </div>
      </div>

      <footer class='footer'>
        <div class='container-fluid'>
          <ul class='nav'>
            <li class='nav-item'>
              <a href='javascript:void(0)' class='nav-link'>
                Smart Snib
              </a>
            </li>
          </ul>
          <div class='copyright'>
            ©
            2021 by
            <a href='javascript:void(0)' target='_blank'>Smart Snib</a> for a better security.
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src='../assets/js/core/jquery.min.js'></script>
  <script src='../assets/js/core/popper.min.js'></script>
  <script src='../assets/js/core/bootstrap.min.js'></script>
  <script src='../assets/js/plugins/perfect-scrollbar.jquery.min.js'></script>
  <!--  Google Maps Plugin    -->
  <!-- Place this tag in your head or just before your close body tag. -->
  <script src='https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE'></script>
  <!-- Chart JS -->
  <script src='../assets/js/plugins/chartjs.min.js'></script>
  <!--  Notifications Plugin    -->
  <script src='../assets/js/plugins/bootstrap-notify.js'></script>
  <!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
  <script src='../assets/js/black-dashboard.min.js?v=1.0.0'></script><!-- Black Dashboard DEMO methods, don't include it in your project! -->
  <script src='../assets/demo/demo.js'></script>
  <script src='https://cdn.trackjs.com/agent/v3/latest/t.js'></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: 'ee6fab19c5a04ac1a32a645abde4613a',
        application: 'black-dashboard-free'
      });
  </script>

  <script>
  function myFunction() {
     
        setInterval(function() {
          $.get('notification/newNotify.php', function(data) {
              document.getElementById('demo').innerHTML = data;                
          });
      }, 5000);
    }

    myFunction();

  </script>
</body>

</html>

";

?>