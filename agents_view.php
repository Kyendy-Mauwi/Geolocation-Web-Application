<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
require_once "connection.php";
include "data/data.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/all.css" />
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <div class="container">
      <header>
        
        <nav class="carrotsuite-nav"> <span class="user"><a href="#" class="user-link">GEO LOCATOR ADMIN PANEL</a></span>

          <div class="icons right">
            <a href="#" class="nav-item"></a>
            <a href="#" class="nav-item"></a>
          </div>
          <div class="user" id="user"><a href="#" class="user-link">GEO LOCATOR ADMIN PANEL</a></div>
        </nav>
        <!-- end of feeds navigation -->
      </header>
      <main class="main">
        <section class="sidebar">
          <h3>ADMIN PANEL</h3>
          <ul class="menu">
            <li>
              <a href="admin.php" title="Home">
                <i class="fas fa-home"></i>
                <span>Home</span>
              </a>
            </li>
          </ul>
        </section>
        <section class="page-content">
          <article class="header">
            <div class="info">
            <p><span>Dashboard</span> <?php echo $_SESSION['username']; ?></p>
            </div>
            <div class="dropdown">
              <button class="dropbtn">
                Actions <i class="fas fa-caret-up"></i>
              </button>
              <div class="dropdown-content"><a href="admin_profile.php">Admin Profile</a>  <a href="logout.php">
                Log Out</a></div>
            </div>
          </article>
          <article class="board">
            <p>Clients</p>
            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            
                                        <th>ID</th>
                                            <th>Name</th>
                                            <th>Nationality</th>
                                            <th>Residence</th>
                                            <th>DOB</th>
                                            <th>Age</th>
                                            <th>Status</th>
                                            <th>Start date</th>
                                            <th>Contract</th>
                                            <th>Area</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                           
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Nationality</th>
                                            <th>Residence</th>
                                            <th>DOB</th>
                                            <th>Age</th>
                                            <th>Status</th>
                                            <th>Start date</th>
                                            <th>Contract</th>
                                            <th>Area</th>
                                           
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            
                                            <td><?php echo $nid?></td>
                                            <td><?php echo $fullname?></td>
                                            <td><?php echo $nationality?></td>                                    
                                            <td><?php echo $residence?></td>
                                            <td><?php echo $dob?></td>
                                            <td><?php echo $age?></td>
                                            <td><?php echo $marital?></td>
                                            <td><?php echo $start?></td>
                                            <td><?php echo $duration?></td>
                                            <td><?php echo $pow?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a data-toggle="tooltip" data-placement="top" title="Exit" href="clerk.php" class="btn btn-danger my-2 px-5"> <span class="fas fa-close"></span> </a>
                            </div>
            <section class="create-client"> </section>
<span class="user"></span>          </article>
        </section>
      </main>
    </div>
    <script>
      const menuLinks = document.querySelectorAll(".sidebar .menu a");

      for (const link of menuLinks) {
        link.addEventListener("mouseenter", function () {
          if (window.matchMedia("(max-width: 626px)").matches) {
            const tooltip = this.querySelector("span").textContent;
            this.setAttribute("title", tooltip);
          } else {
            this.removeAttribute("title");
          }
        });
      }
    </script>
  </body>
</html>
