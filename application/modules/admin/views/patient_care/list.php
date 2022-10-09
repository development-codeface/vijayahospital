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
                                        <i class="fa fa-globe"></i>Patient Care Listing
                                    </div>
                              <!-- <a href="<?=base_url()?>admin/patient_care/add" class="btn btn-danger pull-right">Add New</a>  -->
                                </div>
                                <div class="portlet-body">
                                    <a href="<?=base_url('admin/patient_care/update/1')?>" class="btn btn-primary btn-lg">
                                    Emergency Services 
                                    </a>
                                <!--     <a href="" class="btn btn-primary btn-lg">
                                    Find A Doctor 
                                    </a> -->
                                    <a href="<?=base_url('admin/patient_care/update/2')?>" class="btn btn-primary btn-lg">
                                    Test & Scan 
                                    </a>
                                    <a href="<?=base_url('admin/patient_care/update/3')?>" class="btn btn-primary btn-lg">
                                    Health Checkups 
                                    </a>
                                    <a href="<?=base_url('admin/patient_care/update/4')?>" class="btn btn-primary btn-lg">
                                    Patient Stories 
                                    </a>
                                    
                                    <a href="<?=base_url('admin/patient_care/update/5')?>" class="btn btn-primary btn-lg">
                                    ICU 
                                    </a>
                                    <a href="<?=base_url('admin/patient_care/update/6')?>" class="btn btn-primary btn-lg">
                                    Pharmacy 
                                    </a>
                                    <a href="<?=base_url('admin/patient_care/update/7')?>" class="btn btn-primary btn-lg">
                                    Nursing Care  
</a>
                                </div>
                            </div>
                          