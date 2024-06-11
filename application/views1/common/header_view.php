<!DOCTYPE html>
<html lang="en" dir="">


<!-- Mirrored from demos.ui-lib.com/gull/html/layout1/upload.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 11 Oct 2022 05:16:54 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Bank</title>

    <link href="<?=base_url();?>Assets/css/style.css" rel="stylesheet" />

    <link href="<?=base_url();?>Assets/css/plugins/perfect-scrollbar.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="<?=base_url();?>Assets/css/plugins/dropzone.min.css" />
    <link rel="stylesheet" href="<?=base_url();?>Assets/css/plugins/datatables.min.css" />


    
    <link rel="icon" href="<?=base_url() ?>Assets/images/bank1.png" sizes="32x32" type="image/png">
   
    <!-- ******* Added New Links***** -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>Assets/css/sweetalert.css">


    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>Assets/select2.min.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>Assets/css/all.min.css"  />
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css"> -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>Assets/css/all.css" />

    
    <script  src="<?php echo base_url(); ?>web_resources/dist/js/jquery.min.js"></script>

    <link href="<?=base_url() ?>Assets/js/datatable/datatable.css" rel="stylesheet">
<script src="<?=base_url() ?>Assets/js/datatable/datatable.js"></script>
    

<script>
	$(document).ready(function() {
   

    $('#example').dataTable();
 
    
} );
</script>



    <script>
        var base_path="<?php echo base_url();?>";
     </script>

<style>
    body{
        font-family: 'Poppins', sans-serif;}
        .logoutbox{
            position:relative!important;
        }
        .logoutbox:after{
            content: "";
    position: absolute;
    top: -9px;
    right: 20%;
    width: 18px;
    height: 18px;
    background:#f5f4f3;
    transform: rotate(45deg);
    z-index: 1;
        }
</style>

</head>

<body class="text-left" style="margin-top:0px!important;">

 <!-- preloader -->
        
       <div class="preloader-wrapper">
            <div class="preloader-thumb">
                <!-- <img src="<?= base_url();?>assets/img/All/Twirl.gif" alt=""> -->
                <img src="<?= base_url();?>Assets/images/loader.svg" alt="">

            </div>
        </div>

    <div class="app-admin-wrap layout-sidebar-large" >
        <div class="main-header">
            <div class="logo" style="margin: 0 -17px;">
                <img src="<?=base_url();?>Assets/images/bank1.png" alt="" class="mx-auto">
            </div>
            <div class="menu-toggle">
                <div></div>
                <div></div>
                <div></div>
            </div>
            <div class="d-flex align-items-center">
                <!-- Mega menu -->
                <div class="dropdown mega-menu d-none d-md-block">
                    <!-- <a href="#" class="btn text-muted dropdown-toggle mr-3" id="dropdownMegaMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Mega Menu</a> -->
                    <div class="dropdown-menu text-left" aria-labelledby="dropdownMenuButton">
                        <div class="row m-0">
                            <div class="col-md-4 p-4 bg-img">
                                <h2 class="title">Mega Menu <br> Sidebar</h2>
                                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Asperiores natus laboriosam fugit, consequatur.
                                </p>
                                <p class="mb-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Exercitationem odio amet eos dolore suscipit placeat.</p>
                                <button class="btn btn-xl btn-rounded btn-outline-warning">Learn More</button>
                            </div>
                            <div class="col-md-4 p-4">
                                <p class="text-primary text--cap border-bottom-primary d-inline-block">Features</p>
                                <div class="menu-icon-grid w-auto p-0">
                                    <a href="#"><i class="i-Shop-4"></i> Home</a>
                                    <a href="#"><i class="i-Library"></i> UI Kits</a>
                                    <a href="#"><i class="i-Drop"></i> Apps</a>
                                    <a href="#"><i class="i-File-Clipboard-File--Text"></i> Forms</a>
                                    <a href="#"><i class="i-Checked-User"></i> Sessions</a>
                                    <a href="#"><i class="i-Ambulance"></i> Support</a>
                                </div>
                            </div>
                            <div class="col-md-4 p-4">
                                <p class="text-primary text--cap border-bottom-primary d-inline-block">Components</p>
                                <ul class="links">
                                    <li><a href="<?=base_url();?>accordion.html">Accordion</a></li>
                                    <li><a href="<?=base_url();?>alerts.html">Alerts</a></li>
                                    <li><a href="<?=base_url();?>buttons.html">Buttons</a></li>
                                    <li><a href="<?=base_url();?>badges.html">Badges</a></li>
                                    <li><a href="<?=base_url();?>carousel.html">Carousels</a></li>
                                    <li><a href="<?=base_url();?>lists.html">Lists</a></li>
                                    <li><a href="<?=base_url();?>popover.html">Popover</a></li>
                                    <li><a href="<?=base_url();?>tables.html">Tables</a></li>
                                    <li><a href="<?=base_url();?>datatables.html">Datatables</a></li>
                                    <li><a href="<?=base_url();?>modals.html">Modals</a></li>
                                    <li><a href="<?=base_url();?>nouislider.html">Sliders</a></li>
                                    <li><a href="<?=base_url();?>tabs.html">Tabs</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- / Mega menu -->
                <!-- <div class="search-bar">
                    <input type="text" placeholder="Search">
                    <i class="search-icon text-muted i-Magnifi-Glass1"></i>
                </div> -->
            </div>
            <div style="margin: auto"></div>
            <div class="header-part-right">
                <!-- Full screen toggle -->
             
                <!-- Notificaiton -->
                <div class="dropdown">
                    <!-- <div class="badge-top-container" role="button" id="dropdownNotification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="badge badge-primary">3</span>
                        <i class="i-Bell text-muted header-icon"></i>
                    </div> -->
                    <!-- Notification dropdown -->
                    <div class="dropdown-menu dropdown-menu-right notification-dropdown rtl-ps-none" aria-labelledby="dropdownNotification" data-perfect-scrollbar data-suppress-scroll-x="true">
                      
                    
                        <div class="dropdown-item d-flex">
                            <div class="notification-icon">
                                <i class="i-Data-Power text-success mr-1"></i>
                            </div>
                            <div class="notification-details flex-grow-1">
                                <p class="m-0 d-flex align-items-center">
                                    <span>Server Up!</span>
                                    <span class="badge badge-pill badge-success ml-1 mr-1">3</span>
                                    <span class="flex-grow-1"></span>
                                    <span class="text-small text-muted ml-auto">14 hours ago</span>
                                </p>
                                <p class="text-small text-muted m-0">Server rebooted successfully</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Notificaiton End -->
                <!-- User avatar dropdown -->
                <div class="dropdown " >
                    <div class="user col align-self-end">

                        <img src="<?=base_url();?>Assets/images/user.png" id="userDropdown" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="dropdown-menu dropdown-menu-right logoutbox userdetailbox" aria-labelledby="userDropdown" style="background-color:#f5f4f3;">
                        <p class="px-5 "><?php if(!empty($user[0]->registrationId)){echo $user[0]->registrationId;}?></p>
                        <p class="px-3 "><?php if(!empty($user[0]->fname)){echo $user[0]->fname;}?></p>
                        <a class="dropdown-item text-primary" href="<?=base_url()?>ComLogin">Log out</a>

                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="side-content-wrap">
            <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar="" data-suppress-scroll-x="true">
                <ul class="navigation-left">
                    <!-- <li class="nav-item">
                        <a class="nav-item-hold text-decoration-none" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Dashboard">
                            <i class="fa-brands fa-hashnode fa-xl"></i>
                        
                    </a>
                    </li> -->



                    <li class="nav-item" data-item="extraUserLinks" data-bs-toggle="tooltip" data-bs-placement="top" title="Member Registration">
                        <a class="nav-item-hold text-decoration-none" href="#">
                             <i class="fa-solid fa-user-tie fa-xl"></i>
                         </a>    
                       
                    </li>

                 
                    <li class="nav-item" data-item="extrakits" data-bs-toggle="tooltip" data-bs-placement="top" title="Loan Activation">
                        <a class="nav-item-hold text-decoration-none"  href="#">
                        <i class="fa-solid fa-landmark" style="font-size:19px;"></i></a>
                    </li>

                    
                    <li class="nav-item mt-2" data-item="depositedetails" data-bs-toggle="tooltip" data-bs-placement="top" title="Deposite">
                        <a class="nav-item-hold text-decoration-none" href="<?=base_url()?>Deposite" target="_blank" style="margin-top: -14px;">
                        <i class="fa-solid fa-wallet" style="font-size:19px;"></i></a>
                    </li>

                    <!-- <li class="nav-item" data-item="" data-bs-toggle="tooltip" data-bs-placement="top" title="Leave Application">
                        <a class="nav-item-hold text-decoration-none p-1" href="<?=base_url()?>LeaveManagement" style="margin-top: 0px;">
                    <i class="fa-regular fa-calendar-check fa-xl"></i>
                    </li> -->

                    <!-- <li class="nav-item" data-item="" data-bs-toggle="tooltip" data-bs-placement="top" title="Performance Apprised">
                        <a class="nav-item-hold text-decoration-none" href="<?=base_url();?>CombineReport" style="margin-top:-20px;">
                    <i class="fa-solid fa-swatchbook fa-xl"></i>
                    </li>
                    -->
                    <!-- <li class="nav-item"><a class="nav-item-hold text-decoration-none" href="<?=base_url();?>ComLogin" data-bs-toggle="tooltip" data-bs-placement="top" title="Log out">
                    <i class="fa-solid fa-right-from-bracket fa-xl"></i>
                    </li> -->
              
                   
                </ul>
            </div>
            <div class="sidebar-left-secondary rtl-ps-none" data-perfect-scrollbar="" data-suppress-scroll-x="true">
              
                <ul class="childNav" data-parent="forms">
                    <li class="nav-item"><a href="<?=base_url();?>Role"><i class=" nav-icon far fa-user-circle"></i><span class="item-name">Role</span></a></li>
                </ul>
               
               
                <!-- chartjs-->
                <ul class="childNav" data-parent="charts">
                    <!-- <li class="nav-item"><a href="<?=base_url();?>SelectStudent"><i class=" nav-icon nav-icon i-File-Clipboard-Text--Image"></i><span class="item-name">Selected List</span></a></li>
                    <li class="nav-item"><a href="<?=base_url();?>SelectStudent/branch"><i class=" nav-icon nav-icon i-File-Clipboard-Text--Image"></i><span class="item-name">Branch Wise List</span></a></li>
                    <li class="nav-item dropdown-sidemenu"><a href="<?=base_url();?>SelectStudent/department"><i class=" nav-icon nav-icon i-File-Clipboard-Text--Image"></i><span class="item-name">Department Wise List</span></a></li>

                    <li class="nav-item dropdown-sidemenu"><a href="<?=base_url();?>SelectStudent/company"><i class=" nav-icon nav-icon i-File-Clipboard-Text--Image"></i><span class="item-name">Company Wise List</span></a></li> -->
                </ul>

                
                <ul class="childNav" data-parent="extraUserLinks">

                <li class="nav-item" style="border-bottom: 1px solid #e5e5e5;"><a style="text-decoration:none;" class="" href="#">
                    <span class="item-name ms-5 mx-auto" style="    color: var(--common_color);
    font-size: 20px;
    font-family: 'Rubiks';font-size: 18px;">Member Data</span></a>
                </li>


                    <li class="nav-item"><a style="text-decoration:none" class="text-decoration-none" href="<?=base_url();?>MemberRegistration/create"> 
                    <i class="fa-solid fa-user fa-xl"></i>
                    &emsp;<span class="item-name"> Member Create</span></a></li>

                    <li class="nav-item"><a style="text-decoration:none" class="text-decoration-none" href="<?=base_url();?>MemberRegistration">
                    <i class="fa-solid fa-address-book" style="font-size: 20px;"></i>
                   &emsp;<span class="item-name">Member Details </span></a></li>
                   
                </ul>

                
                <ul class="childNav" data-parent="extraGroupLinks">
                    <li class="nav-item"><a style="text-decoration:none" class="" href="<?=base_url();?>AddGroup/create">
                   
                    <img width="38" height="38" src="https://img.icons8.com/stickers/100/add-property.png" alt="add-property"/>&emsp;<span class="item-name">Create New Group</span></a></li>
                   
                    <li class="nav-item"><a style="text-decoration:none" class="" href="<?=base_url();?>AddGroup/index">
                    <img width="38" height="38" src="https://img.icons8.com/stickers/100/edit-property.png" alt="edit-property"/> &emsp;<span class="item-name">Modify Group</span></a></li>
                   
                </ul>

            

                <ul class="childNav" data-parent="extrakits">

                   <li class="nav-item" style="border-bottom: 1px solid #e5e5e5;"><a style="text-decoration:none"  href="#">
                    <span class="item-name mx-auto" style="    color: var(--common_color);
    font-size: 20px;
    font-family: 'Rubiks';font-size: 18px;">Loan Activation</span></a>
                   </li>


                    <li class="nav-item">
                    <a  style="text-decoration:none;  padding: 8px 9px;
"  href="<?=base_url();?>LoanActivation/create"><i class="fa-solid fa-money-bill-1-wave fa-xl"></i>
                    &emsp;<span class="item-name">Loan Activation</span></a></li>

                    <li class="nav-item"><a style="text-decoration:none;    padding: 8px 9px;
" href="<?=base_url();?>LoanActivation">
                   <i class="fa-solid fa-money-check-dollar fa-xl"></i>
                    &emsp;<span class="item-name"> Loan Activation Details</span></a></li>

                </ul>


                <ul class="childNav" data-parent="depositedetails">

                   <li class="nav-item" style="border-bottom: 1px solid #e5e5e5;"><a style="text-decoration:none"  href="#">
                    <span class="item-name mx-auto" style="    color: var(--common_color);
    font-size: 20px;
    font-family: 'Rubiks';font-size: 18px;margin-left: 5px;">Deposite</span></a>
                   </li>


                    <li class="nav-item"><a style="text-decoration:none"  href="<?=base_url();?>Deposite/create">
                    <i class="fa-solid fa-sack-dollar fa-xl"></i>
                    &emsp;<span class="item-name">Deposite Create</span></a></li>

                    <li class="nav-item"><a style="text-decoration:none"  href="<?=base_url();?>Deposite">
                    <i class="fa-solid fa-coins" style="font-size: 20px;"></i>
                    &emsp;<span class="item-name">Deposite Details</span></a></li>

                    <li class="nav-item"><a style="text-decoration:none"  href="<?=base_url();?>MemberReport">
                    <i class="fa-solid fa-receipt" style="font-size: 20px;"></i>
                    &emsp;<span class="item-name">Report</span></a></li>

                </ul>

                  
              
                


                <ul class="childNav" data-parent="">
                    <li class="nav-item"><a class="text-decoration-none" href="<?=base_url();?>#">
                    <img width="30" height="30" src="https://img.icons8.com/stickers/100/add-file.png" alt="add-file"/>
                    &emsp;<span class="item-name"></span></a></li>
                    
                    <li class="nav-item"><a class="text-decoration-none" href="<?=base_url();?>#">
                    <img width="30" height="30" src="https://img.icons8.com/stickers/100/edit-file.png" alt="edit-file"/>
                    &emsp;<span class="item-name"></span></a></li>
                   
                </ul>
               
                
                <ul class="childNav" data-parent="allReports">
                    <li class="nav-item"><a class="text-decoration-none" href="<?=base_url();?>FeesReport">
                    <img width="30" height="30" src="https://img.icons8.com/stickers/100/labels.png" alt="labels"/>
                    &emsp;<span class="item-name">Fees Report</span></a></li>
                    <li class="nav-item"><a class="text-decoration-none" href="<?=base_url();?>GroupStatusReport">
                    <img width="30" height="30" src="https://img.icons8.com/stickers/30/group-task.png" alt="group-task"/>
                    &emsp;<span class="item-name">Group & Status Report</span></a></li>
                   
                </ul>

                <ul class="childNav" data-parent="sessions">
                    <li class="nav-item"><a class="text-decoration-none" href="http://demos.ui-lib.com/gull/html/sessions/signin.html"><i class=" nav-icon nav-icon i-Checked-User"></i><span class="item-name">Sign in</span></a></li>
                    <li class="nav-item"><a class="text-decoration-none" href="http://demos.ui-lib.com/gull/html/sessions/signup.html"><i class=" nav-icon nav-icon i-Add-User"></i><span class="item-name">Sign up</span></a></li>
                    <li class="nav-item"><a class="text-decoration-none" href="http://demos.ui-lib.com/gull/html/sessions/forgot.html"><i class=" nav-icon nav-icon i-Find-User"></i><span class="item-name">Forgot</span></a></li>
                </ul>
                <ul class="childNav" data-parent="others">
                    <li class="nav-item"><a class="text-decoration-none" href="http://demos.ui-lib.com/gull/html/sessions/not-found.html"><i class=" nav-icon nav-icon i-Error-404-Window"></i><span class="item-name">Not Found</span></a></li>
                    <li class="nav-item"><a class="text-decoration-none" href="<?=base_url();?>user.profile.html"><i class=" nav-icon nav-icon i-Male"></i><span class="item-name">User Profile</span></a></li>
                    <li class="nav-item"><a class="text-decoration-none" class="open" href="<?=base_url();?>blank.html"><i class=" nav-icon nav-icon i-File-Horizontal"></i><span class="item-name">Blank Page</span></a></li>
                </ul>
            </div>
            <div class="sidebar-overlay"></div>
        </div>

       