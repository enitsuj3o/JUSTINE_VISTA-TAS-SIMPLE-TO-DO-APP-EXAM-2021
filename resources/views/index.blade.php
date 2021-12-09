<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>To Do App</title>

    <!-- Custom fonts for this template -->
    <link href="{{asset('template')}}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('template')}}/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="{{asset('template')}}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">To-Do-App</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                   
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">   
                        <a href="" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal_add">{{ $button_title }}</a>
                        </div>
                        <div class="card-body">
                                            @if($errors)
                                                @foreach($errors->all() as $error)
                                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                      <strong>{{$error}}</strong>
                                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                                    </div>
                                                @endforeach
                                            @endif

                                            @if(Session::has('success'))
                                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    <strong>{{session('success')}}</strong>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            @endif	
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th style="display: none;"></th>
                                            <th>#</th>
                                            <th>Task</th>
                                            <th>Date Created</th>
                                            <th>Owner</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                            <p style="display: none;">{{$i = 1}}</p>
                                            @foreach($data as $task)
                                                <tr>
                                                    <td style="display: none;">{{$task->id}}</td>
                                                    <td>{{$i}}</td>
                                                    <td>{{$task->task}}</td>
                                                    <td>{{$task->date_created}}</td>
                                                    <td>{{$task->owner}}</td>
                                                    <td>
                                                        @if($task->status=="0")
                                                            In Progress
                                                        @else  
                                                            Done
                                                        @endif
                                                    </td>
                                                    <td class="align-middle">
                                                        <div class="dropdown">
                                                        <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Action
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal_update" data-id="{{$task->id}}" data-task="{{$task->task}}" 
                                                                data-owner="{{$task->owner}}" data-date="{{$task->date_created}}" data-status="{{$task->status}}" style="width: 80px;">Update
                                                            </a>
                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal_delete" data-id="{{$task->id}}" data-task="{{$task->task}}">Delete</a>
                                                            </a>
                                                        </div>
                                                        </div>                                 		
                                            		</td>
                                                </tr>
                                                
                                                <p style="display: none;">{{$i++}}</p>
                                            @endforeach 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('template')}}/vendor/jquery/jquery.min.js"></script>
    <script src="{{asset('template')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('template')}}/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('template')}}/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="{{asset('template')}}/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{asset('template')}}/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('template')}}/js/demo/datatables-demo.js"></script>

    <div class="modal fade" id="modal_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Task</h5>                                                
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">                                            
                        <span aria-hidden="true">&times;</span>                                              
                    </button>                                            
                </div>
                    
                <div class="modal-body">
                    <form method="POST" action="{{url('/store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Task</label>
                            <input type="text" class="form-control" name="task" autocomplete="off">
                        </div>
        
                        <div class="form-group" style="display:none;">
                            <label>Date</label>
                            <input type="date" class="form-control" name="date_created" value="">
                        </div>

                        <div class="form-group">
                            <label>Owner</label>
                            <input type="text" class="form-control" name="owner" autocomplete="off"> 
                        </div>

                        <div class="form-group" style="display:none;">
                            <label>Status</label>
                            <input type="text" class="form-control" name="status" value="0" autocomplete="off"> 
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>                                 
                        
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">.
            <form method="post" action="{{url('/update')}}" id="form_update_modal" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Task Details</h5>                                                
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">                                                
                                <span aria-hidden="true">&times;</span>                                              
                        </button>                                                
                    </div>
                    <div class="modal-body update">

                        <input type="hidden" class="form-control" id="task_id" name="task_id">    

                        <div class="form-group">
                            <label>Task</label>
                            <input type="text" class="form-control" id="task" name="task" autocomplete="off" readonly>
                        </div>

                        <div class="form-group">
                            <label>Owner</label>
                            <input type="text" class="form-control" id="owner" name="owner" autocomplete="off"> 
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" aria-label="Default select example" name="status">
                                <option value="0" selected>In Progress</option>
                                <option value="1">Done</option>
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" value="Update" id="btnsubmit">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>   
                    </div>
                </div>
            </form>    
        </div>
    </div>

    
<div class="modal fade" id="modal_delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete</h5>                                                
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">                                            
                            <span aria-hidden="true">&times;</span>                                              
                        </button>                                            
                </div>
                <div class="modal-body">
                    <form action="{{url('/destroy')}}" method="post">
                        @csrf
                        <div class="modal-body">
                            <p class="text-center">
                                Are you sure you want to delete this?
                            </p>
                            <input type="hidden" name="task_id" id="task_id" value="">

                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-danger" value="Delete">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>                                               
                        </div>
                    </form>
                </div>
        </div>
    </div>
</div>

</body>
</html>

<script type="text/javascript">
    $('#modal_update').on('show.bs.modal', function (event) {
  	  var button = $(event.relatedTarget); 
      var task_id = button.data('id');
      var task = button.data('task');
      var owner = button.data('owner');
      var status = button.data('status');
      var modal = $(this);
      
      modal.find('.modal-body #task_id').val(task_id);
      modal.find('.modal-body #task').val(task);
      modal.find('.modal-body #owner').val(owner);
      modal.find('.modal-body #status').val(status);	
    });

    $('#modal_delete').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) 
      var task_id = button.data('id')
      var modal = $(this)
      
      modal.find('.modal-body #task_id').val(task_id);
    })
</script>

