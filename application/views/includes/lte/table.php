                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Employee ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Position</th>
                    <th>Account Status</th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                <?php// foreach($data->result() as $get): ?>
                  <tr>
                    <td><?php// echo $get->id ?></td>
                    <td><?php// echo $get->first_name. ' ' .$get->last_name ?></td>
                    <td><?php// echo $get->email ?></td>
                    <td><?php// echo $get->position ?></td>
                    <td><?php// echo $get->account_status ?></td>
                    <td class="d-flex justify-content-center"> 
                      <button name="view_user" id="<?php // echo $get->id ?>" class="btn bg-gradient-warning btn-sm text-white">
                        <i class="fas fa-user-edit"></i>
                      </button> 
                      &nbsp;&nbsp;
                      <button class="btn bg-gradient-danger btn-sm text-white">
                        <i class="fas fa-trash"></i>
                      </button> 
                    </td>
                  </tr>
                <?php// endforeach; ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Employee ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Position</th>
                    <th>Account Status</th>
                    <th></th>
                  </tr>
                  </tfoot>
                </table>