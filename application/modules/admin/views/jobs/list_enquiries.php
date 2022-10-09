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
                                        <i class="fa fa-globe"></i>Enquiries
                                    </div>
                              <!-- <a href="<?=base_url()?>admin/jobs/add" class="btn btn-danger pull-right">Add New</a>  -->
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover" id="sample_2">
                                        <thead>
                                            <tr>
                                                <th># </th>
                                                <th>Date </th>
                                                <th>Name </th>
                                                <th>Email </th>
                                                  
                                                <th>Mobile</th>
                                                <th> Attachment </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php foreach($result as $key => $res){

                                            ?>
                                                <tr>
                                                    <td><?=($key+1)?></td>
                                                    <td> <?=($res['date'] == '0000-00-00')?'Nil':date('d M, Y',strtotime($res['date']))?> </td>
                                                    <td> <?=$res['name']?> </td>
                                                    <td> <?=$res['email']?> </td>
                                                    <td> <?=$res['mobile']?> </td>
                                                    <td> <a href="<?=base_url('uploads/resume/').$res['file_name']?>" download="<?=$res['name']?>"><i class="fa fa-download"></i> Download Here</a></td>
                                                   
                                                </tr>

                                           <?php } ?>
                                          
                                               
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                          