<?php
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
          <div class="user" id="user"><a href="#" class="user-link">GEO LOCATOR ADMIN PANEL</a>          </div>
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
            <li> 
				<a href="admin.php" title="Total Agents">
                <i class="fas fa-home"></i>
                <span>Total Agents</span>
              </a>
			</li>
            <li> 
				<a href="admin.php" title="Active Agents">
                <i class="fas fa-home"></i>
                <span>Active Agents</span>
              </a>
			</li>
            <li> 
				<a href="admin.php" title="Agents Location Change">
                <i class="fas fa-home"></i>
                <span>Agents Location Change</span>
              </a>
			</li>
          </ul>
        </section>
        
		  <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-person-booth"></i>
                               
                            </div>
                            <div class="card-body">
                               
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Paper title</th>
                                            <th>Paper REF</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>#</th>
                                            <th>Image</th>
                                            <th>Paper title</th>
                                            <th>Paper REF</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach($papers as $i=>$paper):{ ?>
                                        <tr>
                                            <td><?php echo $i+1 ?></td>
                                            <td><img style="width:100px"src="<?php echo '../vendor/'.$paper["NEWSPAPER_IMAGE"]?>"></td>
                                           <td> <?php echo $paper["NEWSPAPER_NAME"]?></td>
                                            <td><?php echo $paper["NEWSPAPER_REF"]?></td>
                                            <td class="text-center col-md-3">
                                            <a data-toggle="tooltip" data-placement="top" title="Edit" href="edit.php?nid=<?php echo $paper["NEWSPAPER_ID"]?>&lid=<?php echo $paper["LOCATION"]?>" class="mx-2 my-2 btn btn-outline-warning fw-bold"><i class="fas fa-edit"></i></a>    
                                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $paper["NEWSPAPER_ID"]?>">
                                            <i class="fas fa-trash"></i>
                                            </button>

                                            <!-- Modal -->
                                    <div class="modal fade" id="exampleModal<?php echo $paper["NEWSPAPER_ID"]?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete Record</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        <span class="warning">Are you sure you want to delete record</span>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <form action="delete.php" method="POST">
                                            <input type="hidden" name="id" value="<?php echo $paper["NEWSPAPER_ID"]?>"></input>
                                            <button type="submit"  class="btn btn-danger">Yes</i></button>
                                        </form>
                                        </div>
                                        </div>
                                    </div>
                                    </div>

                                        </td>
                                        </tr>
                                       <?php } endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
