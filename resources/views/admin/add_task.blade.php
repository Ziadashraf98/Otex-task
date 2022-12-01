<!DOCTYPE html>
<html lang="en">
<head>
   @include('includes-admin.css')
   
   <style>
       label
    {
        display: inline-block;
        width: 100px;
        font-size: 15px;
        font-weight: bold;
    }
   </style>
  
</head>
  <body>
      <div class="container-scroller">
          <!-- partial:partials/_sidebar.html -->
          @include('includes-admin.sidebar')
          <!-- partial -->
          <!-- partial:partials/_navbar.html -->
          <div class="main-panel">
          <div class="content-wrapper">
            
            

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
           
            <form action="{{route('add_task')}}" method="POST">
            @csrf
            
            <div style="padding-inline: 40%;">
                <h2 style="color: red">Add Task</h2>
                @if(session()->has('success'))

            <div class="alert alert-success">

            <button type="button" class="close" data-dismiss="alert">x</button>

            {{session()->get('success')}}

            </div>
            @endif
            </div>
            <br>
            
            <div style="padding-inline: 35%;">
                <label>Title:</label>
                <input type="text" name="title" placeholder="title" required>
            </div>
            <br>
            <div style="padding-inline: 35%;">
                <label>Description:</label>
                <input type="text" name="description" placeholder="description" required>
            </div>
            <br>
            <div style="padding-inline: 35%;">
                <label>Users:</label>
                <select name="user" required>
                    <option value="{{null}}">select user:</option>
                    @foreach ($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <div style="padding-inline: 35%;">
                <input class="btn btn-primary" type="submit" value="Submit">
            </div>
           </form>
            
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