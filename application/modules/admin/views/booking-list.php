<div class="portlet box green">
   <?php if($this->session->flashdata('error')){?>
                                            <div class="note note-warning">
                                                <h3>Error!</h3>
                                                <button class="close" data-close="alert"></button> <?php  echo $this->session->flashdata('error'); ?></div>
                                           <?php }?>
                                            <?php if($this->session->flashdata('success')){?>
                                            
                                            <div class="note note-success "><h3>Success!</h3><button class="close" data-close="alert"></button>  <?php echo $this->session->flashdata('success')?></div>
                                            <?php }?>
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-globe"></i>Booking Listing
                                    </div>
                                 <!--    <a href="<?=base_url()?>admin/cms/add" class="btn btn-danger pull-right">Add New</a> -->
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover" id="sample_2">
                                        <thead>
                                            <tr>
                                                <th>Name </th>
                                                <th>Email</th>
                                                <th>Mobile</th>                                                
                                                <th>Appointment Date</th>
                                                <th>Department</th>
                                                <th>Doctor</th>
                                                <th> Action </th>
                                                 <th> Status </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php foreach($result as $res){ ?>
                                                <tr>
                                                    <td> <?=$res['name']?> </td>
                                                    <td> <?=$res['email']?></td>
                                                    <td> <?=$res['mobile']?></td>                                                    
                                                    <td> <?=date('d M, Y',strtotime($res['appointment_date']))?></td>
                                                    <td> <?=$res['department']?></td>
                                                    <td> <?=$res['doctor']?></td>
                                                    <td>  <a  data-toggle="modal" class="btn delete_list_item btn-danger"  data-id="<?=$res['id']?>" data-module="booking"> Delete </a> </td>
                                                        <td><button type="button" class="change_status_btn btn <?=($res['status'] == 'New')?'btn-success':'btn-danger'?>" data-id="<?=$res['id']?>" data-module="booking"><?=$res['status']?></button> </td>
                                                </tr>
                                                 
                                           <?php } ?>
                                          
                                               
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                          