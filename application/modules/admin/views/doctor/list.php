<!-- <div class="portlet box green"> -->
   <?php if($this->session->flashdata('error')){?>
                    <div class="note note-warning">
                        <h3>Error!</h3>
                        <button class="close" data-close="alert"></button> <?php  echo $this->session->flashdata('error'); ?></div>
                   <?php }?>
                    <?php if($this->session->flashdata('success')){?>
                    
                    <div class="note note-success "><h3>Success!</h3><button class="close" data-close="alert"></button>  <?php echo $this->session->flashdata('success')?></div>
                    <?php }?>
   

            <h1 class="page-title"> Doctors Management
                        <small><b>( <span class="label label-sm label-info"><i class="fa fa-reorder"></i>  Drag & Change</span>  the Doctor's View Order )</b></small><br />
                       
                    </h1>
<div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="icon-home"></i>
                                <a href="<?=base_url()?>admin">Home</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <span>Doctor </span>
                            </li>
                        </ul>


                        <div class="page-toolbar">
                            <div class="btn-group pull-right">
                                <a  href="<?=base_url()?>admin/doctor/add" class="btn btn-fit-height btn-danger"><i class="icon-plus"></i> Add Doctor
                                    
                                </a>
                               
                            </div>
                        </div>
                    </div>


                 <!-- <div id="sort_msg">
                        
                 </div>    -->
<div class="portlet-body">
    <div class="dd" id="nestable_list_3">
        <ol class="dd-list">


<?php foreach($result as $res){ ?>
            <li class="dd-item dd3-item" data-sort_id= "<?=$res['sort_id']?>"data-id="<?=$res['id']?>">
                <div class="dd-handle dd3-handle"> </div>
                <div class="dd3-content"> 
                    <img src="<?=base_url()?>uploads/doctor/<?=$res['image']?>" style="border: 2px solid #adadad!important;" height="42px" width="42px" alt="">
                    <?=ucwords(strtolower($res['title']))?>   <?='<span class="label label-sm label-success">'.substr($res['designation'],0,25).((strlen($res['designation'])>=25)?'..':'').'</span>'?> 
                    <div class="pull-right btn-set">
                         <a class="change_status_btn  btn  <?=($res['status'] == 'Active')?'btn-success':'btn-danger'?>" data-id="<?=$res['id']?>" data-module="doctor"><i class="fa fa-random"></i><?=$res['status']?></a> 

                        <a class="btn btn-info" href="<?=base_url('admin/doctor/update/'.$res['id'])?>"><i class="fa fa-edit"></i> Edit </a>
                        <a data-toggle="modal" class="delete_list_item btn btn-danger"  data-id="<?=$res['id']?>" data-module="doctor"><i class="fa fa-trash"></i> Delete</a>
                    </div>
                   

                </div>
            </li>
<?php } ?>

            
        </ol>
    </div>
</div>

<style type="text/css">
    .dd3-content {
        height: 55px !important;
        font-size: 15px;
    }
    .dd3-handle {
         height: 55px !important;
        }
    .dd3-handle:before {
        top: 15px !important;
    }
    .btn-set{
        padding-top:4px; 
    }
</style>