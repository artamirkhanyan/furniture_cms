<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="/public/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="/public/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="/public/dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/public/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="/public/bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/public/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Furniture</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        
                        <li><a href="<?=base_url('supersu/settings')?>"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?=base_url('supersu/logout')?>"><i class="fa fa-sign-out fa-fw"></i> В.ход</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="<?=base_url('supersu/newpage')?>"><i class="fa fa-files-o fa-fw"></i> Новая страница</a>
                        </li>
                        <li>
                            <a href="<?=base_url('supersu/pages#')?>"><i class="fa fa-edit fa-fw"></i> главная страница</a>
                        </li>
                        <?php foreach($menu as $page): ?> 
                            <li>
                                <a href="<?=base_url('supersu/pages/'.$page->url)?>"><i class="fa fa-edit fa-fw"></i> <?=$page->title?></a>
                            </li>
                        <?php endforeach;?>
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"> Новая страница</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <?php if($error):?>
                <div class="alert alert-danger">
                    <?=$error;?>
                </div>
            <?php endif;?>
            <form role="form" method="post" id='newpageform'>
                <div class="form-group">
                    <label for="title">название страницы:</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="название страницы">
                </div>
                <div class="form-group">
                    <label for="url">адрес (URL):</label>
                    <input type="text" class="form-control url" disabled="disabled">
                    <input type="hidden" name="url" class="url">
                </div>
                <div class="form-group">
                    <label for="parent">добавить под :</label>
                    <select class="form-control" name="parent" id="parent">
                        <option value="0"> -поставить на главное меню- </option>
                        <?php foreach($parents as $parent):?>
                            <option value="<?=$parent->id?>"> <?=$parent->title?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <button type="submit" name="gogo" value="создать" class="btn btn-default">создать</button>
            </form>
            
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="/public/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="/public/bower_components/metisMenu/dist/metisMenu.min.js"></script>


    <!-- Custom Theme JavaScript -->
    <script src="/public/dist/js/sb-admin-2.js"></script>
    
    <script>
        $('#title').on('blur', function(){
            createUrl($(this).val());
        });
        
        $('#title').on('keyup', function(){
            createUrl($(this).val());
        });
        
        function createUrl(str){
            str = $.trim(str);
            str = str.replace(/\s/g, "_");
            str = str.replace(/\'/g, "");
            str = str.replace(/\"/g, "");
            str = str.replace(/\</g, "_");
            str = str.replace(/\>/g, "_");
            str = str.replace(/\;/g, "_");
            str = str.replace(/\,/g, "_");
            str = str.replace(/\?/g, "_");
            str = str.toLowerCase();
            
            $('.url').val(str);
        }
    </script>
</body>

</html>
