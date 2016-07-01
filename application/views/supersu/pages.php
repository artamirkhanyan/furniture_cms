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
    <link href="/public/imperavi/assets/redactor.css" rel="stylesheet" type="text/css"/>

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
                        <li><a href="<?=base_url('supersu/logout')?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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
                    <h1 class="page-header"><?=$content->title?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
           
            <form action="" method="post">
                <div class="form-group">
                    <textarea rows="20" name="content"  id="content" class="form-control"><?=$content->content?></textarea>
                </div>
                <input type="hidden" name="page_id" value="<?=isset($content->type) ? $content->type : $content->id?>">
                <button type="submit" name="gogo" value="save" class="btn btn-primary">сохранить</button>
            </form>
            
            <?php if(!isset($content->type)):?>
                <div class="pull-right">
                    <div class="col-sm-4">
                        <button data-toggle="modal" data-target="#myModal" id="delete" value="<?=$content->id?>" class="btn btn-danger">удалить страницу</button>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
            <?php endif; ?>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    
    
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <p>Вы уверены что хотите удалить эту страницу?</p>
            </div>
            <div class="modal-footer ">
                <div class="text-center">
                    <button type="button" class="btn btn-default" id="remove_button" data-dismiss="modal">Да</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Нет</button>
                </div>
            </div>
          </div>

        </div>
    </div>
    
    
    <!-- jQuery -->
    <script src="/public/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="/public/bower_components/metisMenu/dist/metisMenu.min.js"></script>


    <!-- Custom Theme JavaScript -->
    <script src="/public/dist/js/sb-admin-2.js"></script>
    <script src="/public/imperavi/assets/redactor.js" type="text/javascript"></script>

    <script type="text/javascript">
    $(function()
    {
        $('#content').redactor({
             imageUpload: '/supersu/upload',
             minHeight: 200
        });
        
        
        $('#remove_button').click(function(){
            var page_id = $('#delete').val();
            
            $.ajax({
                type: 'get',
                dataType: 'json',
                url: '/supersu/remove/'+page_id,
                success: function(res){
                    if(res){
                        location.replace('/supersu/pages');
                    }
                }
            })
        });
    });
    </script>
</body>

</html>
