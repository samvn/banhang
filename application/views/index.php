<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>XANH - ADMINISTRATOR</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="XANH - ADMINISTRATOR">
        <meta name="author" content="Muhammad Usman">

        <!-- The styles -->
        <link id="bs-css" href="<?php echo base_url('src/css/bootstrap-cerulean.css') ?>" rel="stylesheet">
        <link id="bs-css" href="<?php echo base_url('css/bootstrap-cerulean.css') ?>" rel="stylesheet">
        <!-- <link id="bs-css" href="<?php echo base_url('base.css') ?>" rel="stylesheet"> -->

        <style type="text/css">
            body {
                padding-bottom: 40px;
            }
            .sidebar-nav {
                padding: 9px 0;
            }
        </style>
        <script type="text/javascript" src="<?php echo base_url('jquery.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('jquery-ui.min.js') ?>"></script>
        <link href="<?php echo base_url('src/css/bootstrap-responsive.css') ?>" rel="stylesheet">
        <link href="<?php echo base_url('src/css/charisma-app.css') ?>" rel="stylesheet">
        <link href="<?php echo base_url('src/css/jquery-ui-1.8.21.custom.css') ?>" rel="stylesheet">
        <link href='<?php echo base_url('src/css/fullcalendar.css') ?>' rel='stylesheet'>
        <link href='<?php echo base_url('src/css/fullcalendar.print.css') ?>' rel='stylesheet'  media='print'>
        <link href='<?php echo base_url('src/css/chosen.css') ?>' rel='stylesheet'>
        <link href='<?php echo base_url('src/css/uniform.default.css') ?>' rel='stylesheet'>
        <link href='<?php echo base_url('src/css/colorbox.css') ?>' rel='stylesheet'>
        <link href='<?php echo base_url('src/css/jquery.cleditor.css') ?>' rel='stylesheet'>
        <link href='<?php echo base_url('src/css/jquery.noty.css') ?>' rel='stylesheet'>
        <link href='<?php echo base_url('src/css/noty_theme_default.css') ?>' rel='stylesheet'>
        <link href='<?php echo base_url('src/css/elfinder.min.css') ?>' rel='stylesheet'>
        <link href='<?php echo base_url('src/css/elfinder.theme.css') ?>' rel='stylesheet'>
        <link href='<?php echo base_url('src/css/jquery.iphone.toggle.css') ?>' rel='stylesheet'>
        <link href='<?php echo base_url('src/css/opa-icons.css') ?>' rel='stylesheet'>
        <link href='<?php echo base_url('src/css/uploadify.css') ?>' rel='stylesheet'>

        <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="<?php echo base_url('src/html5.js') ?>"></script>
        <![endif]-->



        <!-- The fav icon -->
        <link rel="shortcut icon" href="<?php echo base_url('src/img/favicon.ico') ?>">
        <script type="text/javascript">
            $(document).ready(function() {

                var MaxInputs = 8; //maximum input boxes allowed
                var InputsWrapper = $("#InputsWrapper"); //Input boxes wrapper ID
                var AddButton = $("#AddMoreFileBox"); //Add button ID

                var x = InputsWrapper.length; //initlal text box count
                var FieldCount = 1; //to keep track of text box added

                $("#txtDate_order").change(function() {
                    var thang = document.getElementById("txtDate_order").value;
                    var dataString = $("#txtDate_order").datepicker({dateFormat: 'dd,MM,yyyy'}).val();
                    $.ajax({
                        url: "<?php echo site_url('welcome/check_result_by_month'); ?>" + "/" + dataString,
                        type: 'POST',
                        data: dataString,
                        success: function(output_string) {
                            $(".resultajax").html(output_string);
                        },
                        error: function() {
                            $(".resultajax").html("error null");
                        }
                    });
                });


                $(AddButton).click(function(e)  //on add input button click
                {
                    var emptyTextBoxes = $('#items_select').filter(function() {
                        return this.value != "";
                    });
                    var string = "";
                    var item_amount = $('#item_amount').val();
                    var vSkill = document.getElementById('items_select');
                    var vSkillText = vSkill.options[vSkill.selectedIndex].innerHTML;
                    emptyTextBoxes.each(function() {
                        $(InputsWrapper).append('<div><input type="text"  name="orderitems[]" id="field_' + FieldCount + '" value="' + item_amount + ',' + this.value + ',' + vSkillText.replace(/(^\s+|\s+$)/g, ' ') + '" /><a href="#" class="removeclass"> X </a></div>');
                    });
                    return false;
                });



                $("body").on("click", ".removeclass", function(e) { //user click on remove text

                    $(this).parent('div').remove(); //remove text box
                    x--; //decrement textbox

                    return false;
                })

            });


        </script>
    </head>

    <body>
        <!-- topbar starts -->
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="#"> <img alt="Charisma Logo" src="<?php echo base_url('src/img/logo20.png') ?>" /> <span>XANH</span></a>

                    <!-- user dropdown starts -->
                    <div class="btn-group pull-right" >
                        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="icon-user"></i><span class="hidden-phone"> <?php echo $this->session->userdata('username'); ?></span>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Profile</a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo site_url("welcome/logout") ?>">Logout</a></li>
                        </ul>
                    </div>
                    <!-- user dropdown ends -->


                </div>
            </div>
        </div>
        <!-- topbar ends -->
        <div class="container-fluid">
            <div class="row-fluid">

                <!-- left menu starts -->
                <div class="span2 main-menu-span">
<?php $this->load->view("menu"); ?>
                </div><!--/span-->
                <!-- left menu ends -->



                <div id="content" class="span10">
                    <!-- content starts -->


                    <div>
<?php $this->load->view("menu_break"); ?>
                    </div> 
                    <!-- 
                    <div class="sortable row-fluid">
                            <a data-rel="tooltip" title="6 new members." class="well span3 top-block" href="#">
                                    <span class="icon32 icon-red icon-user"></span>
                                    <div>Total Members</div>
                                    <div>507</div>
                                    <span class="notification">6</span>
                            </a>

                            <a data-rel="tooltip" title="4 new pro members." class="well span3 top-block" href="#">
                                    <span class="icon32 icon-color icon-star-on"></span>
                                    <div>Pro Members</div>
                                    <div>228</div>
                                    <span class="notification green">4</span>
                            </a>

                            <a data-rel="tooltip" title="$34 new sales." class="well span3 top-block" href="#">
                                    <span class="icon32 icon-color icon-cart"></span>
                                    <div>Sales</div>
                                    <div>$13320</div>
                                    <span class="notification yellow">$34</span>
                            </a>
                            
                            <a data-rel="tooltip" title="12 new messages." class="well span3 top-block" href="#">
                                    <span class="icon32 icon-color icon-envelope-closed"></span>
                                    <div>Messages</div>
                                    <div>25</div>
                                    <span class="notification red">12</span>
                            </a>
                    </div> -->



                    <?php if ($this->router->fetch_method() == 'users'): ?>
                        <?php $this->load->view("users"); ?>
                    <?php endif; ?>
                    <?php if ($this->router->fetch_method() == 'add_user'): ?>
                        <?php $this->load->view("add_user"); ?>
                    <?php endif; ?>
                    <?php if ($this->router->fetch_method() == 'edit_user'): ?>
                        <?php $this->load->view("edit_user"); ?>
                    <?php endif; ?>
                    <?php if ($this->router->fetch_method() == 'items'): ?>
                        <?php $this->load->view("items"); ?>
                    <?php endif; ?>
                    <?php if ($this->router->fetch_method() == 'add_items'): ?>
                        <?php $this->load->view("add_items"); ?>
                    <?php endif; ?>
                    <?php if ($this->router->fetch_method() == 'edit_items'): ?>
                        <?php $this->load->view("edit_items"); ?>
                    <?php endif; ?>
                    <?php if ($this->router->fetch_method() == 'cate'): ?>
                        <?php $this->load->view("cate"); ?>
                    <?php endif; ?>
                    <?php if ($this->router->fetch_method() == 'add_cate'): ?>
                        <?php $this->load->view("add_cate"); ?>
                    <?php endif; ?>
                    <?php if ($this->router->fetch_method() == 'edit_cate'): ?>
                        <?php $this->load->view("edit_cate"); ?>
                    <?php endif; ?>
                    <?php if ($this->router->fetch_method() == 'add_order'): ?>
                        <?php $this->load->view("add_order"); ?>
                    <?php endif; ?>
                    <?php if ($this->router->fetch_method() == 'orders'): ?>
                        <?php $this->load->view("orders"); ?>
                    <?php endif; ?>
                    <?php if ($this->router->fetch_method() == 'edit_order'): ?>
                        <?php $this->load->view("edit_order"); ?>
                    <?php endif; ?>
                    <?php if ($this->router->fetch_method() == 'reports'): ?>
                        <?php $this->load->view("reports"); ?>
                    <?php endif; ?>
                    <?php if ($this->router->fetch_method() == 'checkout_multi_order'): ?>
                        <?php $this->load->view("checkout_multi_order"); ?>
                    <?php endif; ?>
                    <?php if ($this->router->fetch_method() == 'month_reports'): ?>
                        <?php $this->load->view("month_reports"); ?>
                    <?php endif; ?>
                    <?php if ($this->router->fetch_method() == 'item_report'): ?>
                        <?php $this->load->view("item_report"); ?>
                    <?php endif; ?>
                    
                    <?php if ($this->router->fetch_method() == 'tables'): ?>
                        <?php $this->load->view("table"); ?>
                    <?php endif; ?>
                    
                    
                    <!-- content ends -->
                </div><!--/#content.span10-->
            </div><!--/fluid-row-->

            <hr>

            <div class="modal hide fade" id="myModal">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>Settings</h3>
                </div>
                <div class="modal-body">
                    <p>Here settings can be configured...</p>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn" data-dismiss="modal">Close</a>
                    <a href="#" class="btn btn-primary">Save changes</a>
                </div>
            </div>

            <footer>
                <p class="pull-left">&copy; <a href="#" target="_blank">Xanh</a> 2012</p>
                <p class="pull-right">Powered by: <a href="http://store8x.com">Mobile 8X Co., Ltd</a></p>
            </footer>

        </div><!--/.fluid-container-->

        <!-- external javascript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->

        <!-- jQuery -->
        <script src="<?php echo base_url('src/js/jquery-1.7.2.min.js') ?>"></script>
        <!-- jQuery UI -->
        <script src="<?php echo base_url('src/js/jquery-ui-1.8.21.custom.min.js') ?>"></script>
        <!-- transition / effect library -->
        <script src="<?php echo base_url('src/js/bootstrap-transition.js') ?>"></script>
        <!-- alert enhancer library -->
        <script src="<?php echo base_url('src/js/bootstrap-alert.js') ?>"></script>
        <!-- modal / dialog library -->
        <script src="<?php echo base_url('src/js/bootstrap-modal.js') ?>"></script>
        <!-- custom dropdown library -->
        <script src="<?php echo base_url('src/js/bootstrap-dropdown.js') ?>"></script>
        <!-- scrolspy library -->
        <script src="<?php echo base_url('src/js/bootstrap-scrollspy.js') ?>"></script>
        <!-- library for creating tabs -->
        <script src="<?php echo base_url('src/js/bootstrap-tab.js') ?>"></script>
        <!-- library for advanced tooltip -->
        <script src="<?php echo base_url('src/js/bootstrap-tooltip.js') ?>"></script>
        <!-- popover effect library -->
        <script src="<?php echo base_url('src/js/bootstrap-popover.js') ?>"></script>
        <!-- button enhancer library -->
        <script src="<?php echo base_url('src/js/bootstrap-button.js') ?>"></script>
        <!-- accordion library (optional, not used in demo) -->
        <script src="<?php echo base_url('src/cjs/bootstrap-collapse.js') ?>"></script>
        <!-- carousel slideshow library (optional, not used in demo) -->
        <script src="<?php echo base_url('src/js/bootstrap-carousel.js') ?>"></script>
        <!-- autocomplete library -->
        <script src="<?php echo base_url('src/js/bootstrap-typeahead.js') ?>"></script>
        <!-- tour library -->
        <script src="<?php echo base_url('src/js/bootstrap-tour.js') ?>"></script>
        <!-- library for cookie management -->
        <script src="<?php echo base_url('src/js/jquery.cookie.js') ?>"></script>
        <!-- calander plugin -->
        <script src='<?php echo base_url('src/js/fullcalendar.min.js') ?>'></script>
        <!-- data table plugin -->
        <script src='<?php echo base_url('src/js/jquery.dataTables.min.js') ?>'></script>

        <!-- chart libraries start -->
        <script src="<?php echo base_url('src/js/excanvas.js') ?>"></script>
        <script src="<?php echo base_url('src/js/jquery.flot.min.js') ?>"></script>
        <script src="<?php echo base_url('src/js/jquery.flot.pie.min.js') ?>"></script>
        <script src="<?php echo base_url('src/js/jquery.flot.stack.js') ?>"></script>
        <script src="<?php echo base_url('src/js/jquery.flot.resize.min.js') ?>"></script>
        <!-- chart libraries end -->

        <!-- select or dropdown enhancer -->
        <script src="<?php echo base_url('src/js/jquery.chosen.min.js') ?>"></script>
        <!-- checkbox, radio, and file input styler -->
        <script src="<?php echo base_url('src/js/jquery.uniform.min.js') ?>"></script>
        <!-- plugin for gallery image view -->
        <script src="<?php echo base_url('src/js/jquery.colorbox.min.js') ?>"></script>
        <!-- rich text editor library -->
        <script src="<?php echo base_url('src/js/jquery.cleditor.min.js') ?>"></script>
        <!-- notification plugin -->
        <script src="<?php echo base_url('src/js/jquery.noty.js') ?>"></script>
        <!-- file manager library -->
        <script src="<?php echo base_url('src/js/jquery.elfinder.min.js') ?>"></script>
        <!-- star rating plugin -->
        <script src="<?php echo base_url('src/js/jquery.raty.min.js') ?>"></script>
        <!-- for iOS style toggle switch -->
        <script src="<?php echo base_url('src/js/jquery.iphone.toggle.js') ?>"></script>
        <!-- autogrowing textarea plugin -->
        <script src="<?php echo base_url('src/js/jquery.autogrow-textarea.js') ?>"></script>
        <!-- multiple file upload plugin -->
        <script src="<?php echo base_url('src/js/jquery.uploadify-3.1.min.js') ?>"></script>
        <!-- history.js for cross-browser state change on ajax -->
        <script src="<?php echo base_url('src/js/jquery.history.js') ?>"></script>
        <!-- application script for Charisma demo -->
        <script src="<?php echo base_url('src/js/charisma.js') ?>"></script>


    </body>
</html>
