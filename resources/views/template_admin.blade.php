@include('template_admin.head')
<!--  sidebar Top bar -->
@include('template_admin.navbar-side')
@include('template_admin.navbar-top')
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="app-content content" >
 <div class="content-overlay"></div>
 <div class="content-wrapper" >
  

   <!-- content -->
   @yield('content')
   <!-- end content -->

 </div><!-- content-wrapper -->
</div><!-- app-content -->
<!-- footer -->
@include('template_admin.foot')