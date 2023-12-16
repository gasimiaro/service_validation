<?php
    $user = $this->session->userdata('user');
    extract($user);
    if (!$user) {
        
        redirect('/');
    }
?>
    
    <div class="row">
            <div class="col-sm-12">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">User List</h4>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <div class="table-responsive">
                           <div class="row justify-content-between">
                              <div class="col-sm-12 col-md-6">
                                 <div id="user_list_datatable_info" class="dataTables_filter">
                                    <form class="mr-3 position-relative">
                                       <div class="form-group mb-0">
                                          <input type="search" class="form-control" id="exampleInputSearch" placeholder="Search" aria-controls="user-list-table">
                                       </div>
                                    </form>
                                 </div>
                              </div>
                              <div class="col-sm-12 col-md-6">
                                 <div class="user-list-files d-flex float-right">
                                    <a class="iq-bg-primary" href="javascript:void();" >
                                       Print
                                     </a>
                                    <a class="iq-bg-primary" href="javascript:void();">
                                       Excel
                                     </a>
                                     <a class="iq-bg-primary" href="javascript:void();">
                                       Pdf
                                     </a>
                                   </div>
                              </div>
                           </div>
                           <table id="user-list-table" class="table table-striped table-bordered mt-4" role="grid" aria-describedby="user-list-page-info">
                             <thead>
                                 <tr>
                                    <th>Immatricule</th>
                                    <th>Nom</th>
                                 </tr>
                             </thead>
                             <tbody>
                              <?php foreach ($validationData as $validation) {
                                $chapitre = $validation->chapitre;
                                $design = $validation->Designation;
                                
                                
                              ?>
                                 <tr>
                                    <td class="text-center"><?php echo $chapitre; ?></td>
                                    <td><?php echo $design; ?></td>
                                    
                                 </tr>
                                <?php 
                              } ?> 
                             </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
            </div>
         </div>