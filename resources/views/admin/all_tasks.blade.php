<!DOCTYPE html>
<html lang="en">
  <head>
   @include('includes-admin.css')
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
     @include('includes-admin.sidebar')
     
     <div class="main-panel">
        <div class="content-wrapper">
          @if(session()->has('success'))

        <div class="alert alert-success">

        <button type="button" class="close" data-dismiss="alert">x</button>

        {{session()->get('success')}}

        </div>
        

        @endif
            <div>
                <table>
                    <tr align="center">
                        <td style="color: red; padding:20px;">#</td>
                        <td style="color: red; padding:20px;">Title</td>
                        <td style="color: red; padding:20px;">Description</td>
                        <td style="color: red; padding:20px;">Assigned Name</td>
                        <td style="color: red; padding:20px;">Admin Name</td>
                    </tr>
                    <?php $i = 0; ?>
                    @foreach($tasks as $task)
                    <?php $i++; ?>
                    <tr align="center">
                        <td style="color: white; padding:20px; color:blue">{{$i}}</td>
                        <td style="color: white; padding:20px;">{{$task->title}}</td>
                        <td style="color: white; padding:20px;">{{$task->description}}</td>
                        <td style="color: white; padding:20px;">{{$task->user->name}}</td>
                        <td style="color: white; padding:20px;">{{$task->admin->name}}</td>
                    </tr>
                    @endforeach
                </table>
                <div style="padding-inline: 35%; padding-top:5%">
                    {{ $tasks->render("pagination::bootstrap-4") }}
                </div>
            </div>
         
      <!-- partial -->
        <!-- partial:partials/_navbar.html -->
        @include('includes-admin.navbar')
        <!-- partial -->
        
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <!-- partial -->
        </div>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    <!-- container-scroller -->
    <!-- plugins:js -->
   @include('includes-admin.scripts')
  </body>
</html>