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

    $lock_id = $_GET['lock_id'] ;

    $query = "SELECT * from $lock_id ORDER BY TimeStamp DESC LIMIT 5 " ;
    $lock_data = $conn->query($query);

    $query = "SELECT * from lock_info where Lock_ID= '".$lock_id."'" ;
    $run_query =  $conn->query($query);
    $lock_info = $run_query->fetch_assoc();


    $query = "SELECT * from $lock_id ORDER BY TimeStamp DESC LIMIT 1 " ;
    $run_query =  $conn->query($query);
    $status = $run_query->fetch_assoc();

echo"
<!DOCTYPE html>
<html lang='en'>

<head>
  <meta charset='utf-8' />
  <meta http-equiv='refresh' content='120' />

  <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
  <link rel='apple-touch-icon' sizes='76x76' href='../assets/img/apple-icon.png'>
  <link rel='icon' type='image/png' href='../assets/img/favicon.png'>
  <title>
   Smart Snib
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
        Smart Snib
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
      <li>
        <a href='./deleteLock.php'>
          <i class='tim-icons icon-scissors'></i>
          <p>Delete Lock Profile</p>
        </a>
      </li>

      <li>
        <a href='./access_to.php'>
          <i class='tim-icons icon-settings'></i>
          <p>Edit Access</p>
        </a>
      </li>

      <li>
        <a href='./notifications.html'>
          <i class='tim-icons icon-bell-55'></i>
          <p>Notifications</p>
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
            <a class='navbar-brand' href='javascript:void(0)'>Lock Profile</a>
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
            
              <li class='dropdown nav-item'>
                <a href='#' class='dropdown-toggle nav-link' data-toggle='dropdown'>
                  <div class='photo'>
                    <img src='../assets/img/anime3.png' alt='Profile Photo'>
                  </div>
                  <b class='caret d-none d-lg-block d-xl-block'></b>
                  <p class='d-lg-none'>
                    Log out
                  </p>
                </a>
                <ul class='dropdown-menu dropdown-navbar'>
                  <li class='nav-link'><a href='' class='nav-item dropdown-item' data-toggle='modal' data-target='#myModal'>Edit Profile</a></li>
                </ul>
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
          <div class='col-md-8'>
            <div class='card'>
              <div class='card-header'>
                <h5 class='title'>Lock Profile</h5>
              </div>
              <div class='card-body'>
              
                <form>
                  <div class='row'>
                    <div class='col-md-5 pr-md-1'>
                      <div class='form-group'>
                        <label>Lock ID</label>
                        <input type='text' class='form-control' disabled='' placeholder='Company' 
                        value='".$lock_info['Lock_ID']."'>
                      </div>
                    </div>
                    
                    <div class='col-md-4 pl-md-1'>
                      <div class='form-group'>
                        <label for='exampleInputEmail1'>Contact Number  </label>
                        <input type='email' class='form-control' placeholder= 'Contact Number' 
                        value='".$lock_info['contact']."'>
                      </div>
                    </div>
                  </div>
                  <div class='row'>
                    <div class='col-md-6 pr-md-1'>
                      <div class='form-group'>
                        <label>Owner's First Name</label>
                        <input type='text' class='form-control' placeholder='Company' value='".$lock_info['o_fname']."'>
                      </div>
                    </div>
                    <div class='col-md-6 pl-md-1'>
                      <div class='form-group'>
                        <label>Owner's Last Name</label>
                        <input type='text' class='form-control' placeholder='Last Name' value='".$lock_info['o_lname']."'>
                      </div>
                    </div>
                  </div>
                  <div class='row'>
                    <div class='col-md-12'>
                      <div class='form-group'>
                        <label>Address</label>
                        <input type='text' class='form-control' placeholder='Home Address' value='".$lock_info['Area']."'>
                      </div>
                    </div>
                  </div>
                  <div class='row'>
                    <div class='col-md-4 pr-md-1'>
                      <div class='form-group'>
                        <label>Postal Code</label>
                        <input type='number' class='form-control' placeholder= '".$lock_info['postalCode']." '>
                      </div>
                    </div>
                  </div>
                </form>

      <div class='content'>
        <div class='row'>
          <div class='col-md-12'>
            <div class='card '>
              <div class='card-header'>
                <h4 class='card-title'> Sensor's Information</h4>
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
                         Temperature (°C)
                        </th>
                        <th>
                          Humidity (% RH)
                        </th>
                        <th>
                          Time Stamp (Time, Day, Date(D-M-Y))
                        </th>
                        <th>
                         
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                     ";

                     $i = 1;
                    while($row = $lock_data->fetch_assoc()) {

                              echo "
                                  <tr>
                                    <td> ".
                                      $i."
                                    </td>
                                    <td>
                                      ".$row['Temperature']." °C
                                    </td>
                                    <td>
                                      ".$row['Humidity']." %
                                    </td>
                                    <td >
                                      ".date('g:i A, l - d M Y', strtotime($row['TimeStamp']))."
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
              </div>         
            </div>
          </div>
          <div class='col-md-4'>
            <div class='card card-user'>
              <div class='card-body'>
                <p class='card-text'>
                  <div class='author'>
                    <div class='block block-one'></div>
                    <div class='block block-two'></div>
                    <div class='block block-three'></div>
                    <div class='block block-four'></div>
                    <a href='javascript:void(0)'>
                      " ;
                      if($status['Temperature'] < 60)
                        echo "<img class='avatar' src='../assets/img/all_right.png' alt='...'>" ;
                      else
                        echo "<img class='avatar' src='../assets/img/problem.png' alt='...'>" ;
                     
                      echo"
                      <h5 class='title'>".$lock_info['Lock_ID']."</h5>
                    </a>
                    <p class='description'>";
                      if($status['Temperature'] < 60)
                         echo "Everything is alright" ;   
                      else
                         echo "Alert! Something is wrong" ;
                     echo"</p>
                  </div>
                </p>
                <div class='card-description'>
                    Temperature : <span id = 'tempValue'> ${status['Temperature']}  </span> °C <br>
                    Humidity : ${status['Humidity']} % <br>
                    Updated at : ".date('g:i A, l - d M Y', strtotime($status['TimeStamp']))."
                </div>
              </div>
              <div class='card-footer'>
                <div class='button-container'>
                  <button href='javascript:void(0)' class='btn btn-icon btn-round btn-facebook'>
                    <i class='fab fa-facebook'></i>
                  </button>
                  <button href='javascript:void(0)' class='btn btn-icon btn-round btn-twitter'>
                    <i class='fab fa-twitter'></i>
                  </button>
                  <button href='javascript:void(0)' class='btn btn-icon btn-round btn-google'>
                    <i class='fab fa-google-plus'></i>
                  </button>
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

    <div class='modal fade' id='myModal' role='dialog' style='background-color: rgba(0,0,0, 0.8)' >
    <div class='modal-dialog modal-lg'>
      <div class='modal-content' style='background-color: #1d253b'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal'>&times;</button>
          <h4 class='modal-title' style='color: white'>Edit Lock's Profile</h4>
        </div>
        <div class='modal-body'>

 <!--------------  UPDATE SECTION           --------------!>

      <form method='POST' action='./userPhp/updateInfo.php?lock_id=$lock_id'>
        <div class='row'>
          <div class='col-md-5 pr-md-1'>
            <div class='form-group'>
              <label>Lock ID</label>
              <input type='text' name='l_id' id='l_id' class= 'form-control' disabled='' placeholder='Company' 
              value='".$lock_info['Lock_ID']."'>
            </div>
          </div>
          <div class='col-md-3 px-md-1'>
            <div class='form-group'>
              <label>Access is give to</label>
            </div>
          </div>
          <div class='col-md-4 pl-md-1'>
            <div class='form-group'>
              <label for='exampleInputEmail1'>Contact Number  </label>
              <input type='text' name='c_info' id='c_info' class='form-control' placeholder='Contact Number' value='".$lock_info['contact']."'>
            </div>
          </div>
        </div>
        <div class='row'>
          <div class='col-md-6 pr-md-1'>
            <div class='form-group'>
              <label>Owner's First Name</label>
              <input type='text' class='form-control' name = 'o_finfo' id = 'o_finfo' placeholder='Company' value='".$lock_info['o_fname']."'>
            </div>
          </div>
          <div class='col-md-6 pl-md-1'>
            <div class='form-group'>
              <label>Owner's Last Name</label>
              <input type='text' class='form-control' name='o_linfo' id='o_linfo' placeholder='Last Name' value='".$lock_info['o_lname']."'>
            </div>
          </div>
        </div>
        <div class='row'>
          <div class='col-md-12'>
            <div class='form-group'>
              <label>Address</label>
              <input type='text' class='form-control' name='area_address' id='area_address' placeholder='Home Address' value='".$lock_info['Area']."'>
            </div>
          </div>
        </div>
        <div class='row'>
          <div class='col-md-4 pr-md-1'>
            <div class='form-group'>
              <label>Postal Code</label>
              <input type='number' class='form-control' name='p_code' id='p_code' value= '".$lock_info['postalCode']."'>
            </div>
          </div>
        </div>
    
        </div>
       
        <div class='modal-footer'>
              <button type='submit' class='btn btn-fill btn-primary'>Save</button>
          
        </div>

        </form>
      </div>
    </div>
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



</body>

</html> " ;

    
?>