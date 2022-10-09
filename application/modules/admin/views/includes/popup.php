<?php if(isset($show_delete)&& $show_delete==true) {?>
                                                <div class="modal fade bs-modal-sm" id="delete" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                            <h4 class="modal-title">DELETE</h4>
                                                        </div>
                                                        <div class="modal-body"> Are you sure you want to delete? </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger btn-outline" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                                                            <button type="button" class="btn green delete_popup" data-module="<?=$module?>" data-id="<?=$id?>"><i class="fa fa-save"></i> Save changes</button>
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                                </div>
                                          <?php } if(isset($show_status)&& $show_status==true) {?>
                                                <div class="modal fade bs-modal-sm" id="status" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                            <h4 class="modal-title">Change Status</h4>
                                                        </div>
                                                        <div class="modal-body"> Are you sure you want to change the status? </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger btn-outline" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                                                            <button type="button" class="btn green change_status" data-module="<?=$module?>" data-id="<?=$id?>"><i class="fa fa-save"></i> Save changes</button>
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                                </div>
                                          <?php } if(isset($show_approve)&& $show_approve==true) {?>
                                          <div class="modal fade bs-modal-sm" id="approve" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                            <h4 class="modal-title">Approve</h4>
                                                        </div>
                                                        <div class="modal-body"> Are you sure you want to approve the request? </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger btn-outline" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                                                            <button type="button" class="btn green approve_request" data-module="<?=$module?>" data-id="<?=$id?>"><i class="fa fa-save"></i> Save changes</button>
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                                </div>
                                         <?php } if(isset($show_reject)&& $show_reject==true) {?>
    <div class="modal fade bs-modal-sm" id="reject" tabindex="-1" role="dialog" aria-hidden="true">
                                                  <div class="modal-dialog modal-sm">
                                                      <div class="modal-content">
                                                          <div class="modal-header">
                                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                              <h4 class="modal-title">Reject</h4>
                                                          </div>
                                                          <div class="modal-body"> Are you sure you want to reject the request? </div>
                                                          <div class="modal-footer">
                                                              <button type="button" class="btn btn-danger btn-outline" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                                                              <button type="button" class="btn green reject_request" data-module="<?=$module?>" data-id="<?=$id?>"><i class="fa fa-save"></i> Save changes</button>
                                                          </div>
                                                      </div>
                                                      <!-- /.modal-content -->
                                                  </div>
                                                  <!-- /.modal-dialog -->
                                                  </div>

                                         <?php } if(isset($show_view_uploads)&& $show_view_uploads==true) {?>
    <div class="modal fade " id="show_view_uploads" tabindex="-1" role="dialog" aria-hidden="true">
                                                  <div class="modal-dialog ">
                                                      <div class="modal-content">
                                                          <div class="modal-header">
                                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                              <h4 class="modal-title">Uploads From <?=$loyalty['first_name'].' '.$loyalty['last_name'] ?></h4>
                                                          </div>
                                                          <div class="cbp-caption-defaultWrap">
                                                             <h3>Uploaded Image</h3>
                                                             <img src="<?=base_url()?>uploads/rewards_request/image/<?=$loyalty['uploaded_image']?>" alt=""> </div>
                                                         <div class="cbp-caption-defaultWrap">
                                                             <h3>Uploaded Video</h3>
                        <video width="320" height="240" controls>
                                <source src="<?=site_url()?>uploads/rewards_request/video/<?=$loyalty['uploaded_video']?>" type="video/mp4">
                                <source src="<?=site_url()?>uploads/rewards_request/video/<?=$loyalty['uploaded_video']?>" type="video/webm">

                                <source src="<?=site_url()?>uploads/rewards_request/video/<?=$loyalty['uploaded_video']?>" type="video/ogg">
                                <source src="<?=site_url()?>uploads/rewards_request/video/<?=$loyalty['uploaded_video']?>" type="video/mov">
                                Your browser does not support the video tag.
                       </video>
                   
                                                             </div>
                                                          <div class="modal-footer">
                                                              <button type="button" class="btn btn-danger btn-outline" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                                                           </div>
                                                      <!-- /.modal-content -->
                                                  </div>
                                                  <!-- /.modal-dialog -->
                                                  </div>

                                         <?php } ?>
