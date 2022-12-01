<!DOCTYPE html>
<html lang="en">
  <head>
   @include('includes-admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
     @include('includes-admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('includes-admin.navbar')
        <!-- partial -->




        <div class="main-panel">
          <div class="content-wrapper">
            
            <div class="row">
              
              <div style="color:red; padding-inline:30%">
                <h3>Top 10 users have tasks</h3>
              </div>
              
              <div style="padding-inline: 35%;  padding-top:1%">
                @foreach($top10_of_users as $top10)
                <p><h5>{{$top10->user->name}}</h5></p>
                @endforeach
              </div>
              
            
            </div>
      
              </div>
            </div>
        
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    <!-- container-scroller -->
    <!-- plugins:js -->
   @include('includes-admin.scripts')
  </body>
</html>