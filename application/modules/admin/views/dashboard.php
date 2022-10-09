
                    <!-- END THEME PANEL -->
                    <h1 class="page-title"> Dashboard
                    </h1>
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="icon-home"></i>
                                <a href="<?=base_url()?>admin/dashboard">Home</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <span>Dashboard</span>
                            </li>
                        </ul>
                       
                    </div>
                    <!-- END PAGE HEADER-->
                    <!-- BEGIN DASHBOARD STATS 1-->
                    <div class="col-md-12">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 blue" >
                                <div class="visual">
                                    <i class="fa fa-comments"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="1349"></span>
                                    </div>
                                    <div class="desc">Doctors  </div>
                                    <div class="desc"><?=($settings['doctors']!='')?$settings['doctors']:''?>  </div>
                                </div>
                            </a>
                        </div>
                       
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 green" >
                                <div class="visual">
                                    <i class="fa fa-shopping-cart"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="549"></span>
                                    </div>
                                    <div class="desc"> Storeyed Buildings </div>
                                    <div class="desc"><?=($settings['storeyed_buildings']!='')?$settings['storeyed_buildings']:''?>  </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 purple" >
                                <div class="visual">
                                    <i class="fa fa-globe"></i>
                                </div>
                                <div class="details">
                                    <div class="number"> 
                                       <span data-counter="counterup" data-value="89"></span> </div>
                                    <div class="desc"> Beds </div>
                                    <div class="desc"><?=($settings['beds']!='')?$settings['beds']:''?>  </div>
                                </div>
                            </a>
                        </div>
                         <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 red" >
                                <div class="visual">
                                    <i class="fa fa-globe"></i>
                                </div>
                                <div class="details">
                                    <div class="number"> 
                                       <span data-counter="counterup" data-value="89"></span> </div>
                                    <div class="desc"> Ambulances </div>
                                    <div class="desc"><?=($settings['ambulances']!='')?$settings['ambulances']:''?>  </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 blue" >
                                <div class="visual">
                                    <i class="fa fa-comments"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="1349"></span>
                                    </div>
                                    <div class="desc">Booking Not Checked</div>
                                    <div class="desc"><?=($pending)?$pending:''?>  </div>
                                </div>
                            </a>
                        </div>
                       
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 green" >
                                <div class="visual">
                                    <i class="fa fa-shopping-cart"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="549"></span>
                                    </div>
                                    <div class="desc"> Booking Checked</div>
                                    <div class="desc"><?=($approved)?$approved:''?>  </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 purple" >
                                <div class="visual">
                                    <i class="fa fa-globe"></i>
                                </div>
                                <div class="details">
                                    <div class="number"> 
                                       <span data-counter="counterup" data-value="89"></span> </div>
                                    <div class="desc"> Enquiries Not Checked </div>
                                    <div class="desc"><?=($pending1)?$pending1:''?>   </div>
                                </div>
                            </a>
                        </div>
                         <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 red" >
                                <div class="visual">
                                    <i class="fa fa-globe"></i>
                                </div>
                                <div class="details">
                                    <div class="number"> 
                                       <span data-counter="counterup" data-value="89"></span> </div>
                                    <div class="desc"> Enquiries  Checked </div>
                                    <div class="desc"><?=($approved1)?$approved1:''?>  </div>
                                </div>
                            </a>
                        </div>
                    </div>
</div>
                    <div class="clearfix"></div>
                    <!-- END DASHBOARD STATS 1-->
                  