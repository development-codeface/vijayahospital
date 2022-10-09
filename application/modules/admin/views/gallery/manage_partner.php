<div class="row">
                        <div class="col-md-12">
                            <div class="portlet light portlet-fit portlet-form ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject font-dark sbold uppercase">Partner Images</span>
                                    </div>
                                    
                                </div>
                           <div class="portlet-body">
                            <form id="fileupload" action="<?=base_url()?>admin/gallery/partner" method="POST" enctype="multipart/form-data">
                                <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                               
                                
                                <input type="hidden" name="type" value="gallery">
                                <div class="m-heading-1 border-green m-bordered">
                                    <h3>ADD PARTNER IMAGES <?=($company_name!='')?"OF ".$company_name:'';?></h3>
                                    <span style="color:red"> * Image size should not be greater than 350kb</span>
                                </div>
                                <div class="row fileupload-buttonbar">
                                    <div class="col-lg-7">
                                        <!-- The fileinput-button span is used to style the file input field as button -->
                                        <span class="btn green fileinput-button">
                                            <i class="fa fa-plus"></i>
                                            <span> Add files... </span>
                                            <input type="file" name="userfile" multiple=""> </span>
                                        <button type="submit" class="btn blue start">
                                            <i class="fa fa-upload"></i>
                                            <span> Start upload </span>
                                        </button>
                                        <button type="reset" class="btn warning cancel">
                                            <i class="fa fa-ban-circle"></i>
                                            <span> Cancel upload </span>
                                        </button>
                                      <button type="button" class="btn red delete">
                                            <i class="fa fa-trash"></i>
                                            <span> Delete </span>
                                        </button>
                                       <input type="checkbox" class="toggle">
                                        <!-- The global file processing state -->
                                        <span class="fileupload-process"> </span>
                                    </div>
                                    <!-- The global progress information -->
                                    <div class="col-lg-5 fileupload-progress fade">
                                        <!-- The global progress bar -->
                                        <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                            <div class="progress-bar progress-bar-success" style="width:0%;"> </div>
                                        </div>
                                        <!-- The extended global progress information -->
                                        <div class="progress-extended"> &nbsp; </div>
                                    </div>
                                </div>
                                <!-- The table listing the files available for upload/download -->
                                <table role="presentation" class="table table-striped clearfix">
                                    <tbody class="files">
                                    
                                    <?php foreach($partner_images as $gal) { ?>
                                        <tr class="template-download fade in">
                                            <td>
                                                <span class="preview"><img src="<?=base_url()?>uploads/partner/thumbs/<?=$gal['image']?>"></span>
                                            </td>
                                            <td>
                                                <p class="name"><?=$gal['image']?></p>
                                                <strong class="error label label-danger"></strong>
                                            </td>
                                            <td>
                                                <p class="size"></p>
                                               
                                            </td>
                                            <td> 
                                            <button class="btn red delete btn-sm" data-type="DELETE" data-url="<?=base_url()?>admin/gallery/delete1/<?=$gal['id']?>">
                                                <i class="fa fa-trash-o"></i>
                                                <span>Delete</span>
                                               
                                            </button> 
                                            <input type="checkbox" name="delete" value="1" class="toggle">
                                        </td>
                                        </tr>
                                    <?php }?> 
                    
                    </tbody>
                                </table>
                            </form>
                      
 <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-filter=":even">
                        <div class="slides"> </div>
                        <h3 class="title"></h3>
                        <a class="prev"> ‹ </a>
                        <a class="next"> › </a>
                        <a class="close white"> </a>
                        <a class="play-pause"> </a>
                        <ol class="indicator"> </ol>
                    </div>
                    
                    <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
                    <script id="template-upload" type="text/x-tmpl"> {% for (var i=0, file; file=o.files[i]; i++) { %}
                        <tr class="template-upload fade">
                            <td>
                                <span class="preview"></span>
                            </td>
                            <td>
                                <p class="name">{%=file.name%}</p>
                                <strong class="error label label-danger"></strong>
                            </td>
                            <td>
                                <p class="size">Processing...</p>
                                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                    <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                                </div>
                            </td>
                            <td> {% if (!i && !o.options.autoUpload) { %}
                                <button class="btn blue start" disabled>
                                    <i class="fa fa-upload"></i>
                                    <span>Start</span>
                                </button> {% } %} {% if (!i) { %}
                                <button class="btn red cancel">
                                    <i class="fa fa-ban"></i>
                                    <span>Cancel</span>
                                </button> {% } %} </td>
                        </tr> {% } %} </script>
                    <!-- The template to display files available for download -->
                    <script id="template-download" type="text/x-tmpl"> {% for (var i=0, file; file=o.files[i]; i++) { %}
                        <tr class="template-download fade">
                            <td>
                                <span class="preview"> {% if (file.thumbnailUrl) { %}
                                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery>
                                        <img src="{%=file.thumbnailUrl%}">
                                    </a> {% } %} </span>
                            </td>
                            <td>
                                <p class="name"> {% if (file.url) { %}
                                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl? 'data-gallery': ''%}>{%=file.name%}</a> {% } else { %}
                                    <span>{%=file.name%}</span> {% } %} </p> {% if (file.error) { %}
                                <div>
                                    <span class="label label-danger">Error</span> {%=file.error%}</div> {% } %} </td>
                            <td>
                                <span class="size">{%=o.formatFileSize(file.size)%}</span>
                            </td>
                            <td> {% if (file.deleteUrl) { %}
                                <button class="btn red delete btn-sm" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}" {% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}' {% } %}>
                                    <i class="fa fa-trash-o"></i>
                                    <span>Delete</span>
                                </button>
                                <input type="checkbox" name="delete" value="1" class="toggle"> {% } else { %}
                                <button class="btn yellow cancel btn-sm">
                                    <i class="fa fa-ban"></i>
                                    <span>Cancel</span>
                                </button> {% } %} </td>
                        </tr> {% } %} </script>
                       </div>  </div>
                    </div>
                <!-- END CONTENT BODY -->
</div>

 <script src="<?=asset_path_dashboard('pages/scripts/form-fileupload.js')?>" type="text/javascript"></script>