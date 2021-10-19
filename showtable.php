<table class="table table-hover mr-12" border=2>
              <tr>
                <td colspan="10" align="center" id="a" class="table-success" style="font-size:30px; font-weight:bold;color:brown">EMPLOYEES DETAILS</td>
              </tr>
              <tr>
                <td colspan="10" align="center" class="table-danger">
                  <a href="Register.php" id="a"style="font-size :25px;">Add Details</a>
                </td>
              </tr>
              <tr>
                <th class="table-success">S.no</th>
                <th class="table-warning">Email</th>
                <th class="table-primary">Uname</th>
                <th class="table-secondary">Name</th>
                <th class="table-warning">Password</th>
                <th class="table-info">Age</th>
                <th class="table-success">City</th>
                <th class="table-warning">Gender</th>
                <th class="table-success">Image</th>
                <th class="table-secondary">Action</th>
              </tr>
              <?php
              $sel = mysqli_query($conn, "select * from users order by id desc");
              if (mysqli_num_rows($sel) > 0) {
                $sn = 1;
                while ($arr = mysqli_fetch_assoc($sel)) {
              ?>
                  <tr>
                    <td class="table-success"><?php echo $sn; ?></td>
                    <td class="table-warning"><?php echo $arr['email']; ?></td>
                    <td class="table-primary"><?php echo  $arr['uname']; ?></td>
                    <td class="table-secondary"><?php echo  $arr['name']; ?></td>
                    <td class="table-warning"><?php echo  $arr['password']; ?></td>
                    <td class="table-info"><?php echo  $arr['age']; ?></td>
                    <td class="table-success"><?php echo  $arr['city']; ?></td>
                    <td class="table-warning"><?php echo  $arr['gender']; ?></td>
                    <td class="table-success"><?php echo  $arr['image']; ?></td>
                    <td class="table-secondary">
                      <a href="?del=<?php echo $arr['id']; ?>">Delete</a>
                    </td>
                  </tr>
                <?php
                  $sn++;
                }
              } else {
                ?>
                <tr>
                  <td colspan="6" align="center">No record found</td>
                </tr>
              <?php
              }
              ?>
            </table>