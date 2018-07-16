<div id="page-navigation" class="container-fluid">
   
    <style>
        #primary-menu {list-style: none;padding-left: 0;font-weight: 500;line-height: 1.188rem;margin: 55px 0 45px 0;text-align:right;float:right;}
        #primary-menu a {color: #000;position:relative;}
        #primary-menu a:hover {margin-bottom: 23px;position: relative;}
        #primary-menu a:hover::after {position:absolute;display:block;content:' ';width:32px;height:2px;background:#00ADD8;top:auto;margin-top:5px;left:0; margin-left:0;}
        #primary-menu li {display: inline;margin-left: 30px;text-align: right;}
        #primary-menu li:first-child {margin-left: 0;}
        #primary-menu li.active a:after {position:absolute;display:block;content:' ';width:32px;height:2px;background:#00ADD8;top:auto;margin-top:5px;left:0; margin-left:0;}
    </style>
    
    <script>
        $(document).ready(function(){
            $('.aboutClick').click(function(event){
                $(this).addClass('active').siblings().removeClass('active');
                event.stopPropagation();
                 $("#nav-about").siblings().hide();
                 $("#nav-about").slideToggle("fast")
            });
            $("#nav-about").on("click", function (event) {
                event.stopPropagation();
            });
        });

        $(document).ready(function(){
            $('.servicesClick').click(function(event){
                $(this).addClass('active').siblings().removeClass('active');
                event.stopPropagation();
                 $("#nav-services").siblings().hide();
                 $("#nav-services").slideToggle("fast")
            });
            $("#nav-services").on("click", function (event) {
                event.stopPropagation();
            });
        });

        $(document).ready(function(){
            $('.trainingClick').click(function(event){
                $(this).addClass('active').siblings().removeClass('active');
                event.stopPropagation();
                 $("#nav-training").siblings().hide();
                 $("#nav-training").slideToggle("fast")
            });
            $("#nav-training").on("click", function (event) {
                event.stopPropagation();
            });
        });

        $(document).on("click", function () {
            $("#nav-about").hide();
            $("#nav-services").hide();
            $("#nav-training").hide();
        });
    </script>
    
    <div id="nav-about">
        <?php wp_nav_menu( array( 
        'theme_location' => 'about', 
        'menu_id' => '' ) ); ?>
    </div>
    <div id="nav-services">
        <?php wp_nav_menu( array( 
        'theme_location' => 'services', 
        'menu_id' => '' ) ); ?>
    </div>
    <div id="nav-training">
        <?php wp_nav_menu( array( 
        'theme_location' => 'training', 
        'menu_id' => '' ) ); ?>
    </div>
    
</div><!-- #page-heading -->