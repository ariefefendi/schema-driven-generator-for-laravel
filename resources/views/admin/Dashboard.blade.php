@extends('template_admin')
@section('content')

      <div class="conatiner-fluid content-inner mt-n5 py-0">
      <div class="row">
          <div class="col-lg-12">
             <div class="card">
                  <div class="card-body">
                     <div class="d-flex flex-wrap align-items-center justify-content-between">
                        <div class="d-flex flex-wrap align-items-center">
                           <div class="profile-img position-relative me-3 mb-3 mb-lg-0 profile-logo profile-logo1">
                              <img src="../../assets/images/avatars/01.png" alt="User-Profile" class="theme-color-default-img img-fluid rounded-pill avatar-100">
                              <img src="../../assets/images/avatars/avtar_1.png" alt="User-Profile" class="theme-color-purple-img img-fluid rounded-pill avatar-100">
                              <img src="../../assets/images/avatars/avtar_2.png" alt="User-Profile" class="theme-color-blue-img img-fluid rounded-pill avatar-100">
                              <img src="../../assets/images/avatars/avtar_4.png" alt="User-Profile" class="theme-color-green-img img-fluid rounded-pill avatar-100">
                              <img src="../../assets/images/avatars/avtar_5.png" alt="User-Profile" class="theme-color-yellow-img img-fluid rounded-pill avatar-100">
                              <img src="../../assets/images/avatars/avtar_3.png" alt="User-Profile" class="theme-color-pink-img img-fluid rounded-pill avatar-100">
                           </div>
                           <div class="d-flex flex-wrap align-items-center mb-3 mb-sm-0">
                              <h4 class="me-2 h4">{{auth()->user()->name}}</h4>
                              <span> - {{auth()->user()->email}} ({{auth()->user()->role->name}})</span>
                           </div>
                        </div>
                        <ul class="d-flex nav nav-pills mb-0 text-center profile-tab" data-toggle="slider-tab" id="profile-pills-tab" role="tablist">
                           <!--<li class="nav-item">-->
                           <!--   <a class="nav-link active show" data-bs-toggle="tab" href="#profile-feed" role="tab" aria-selected="false">Feed</a>-->
                           <!--</li>-->
                           <li class="nav-item">
                              <a class="nav-link active show" data-bs-toggle="tab" href="#profile-activity" role="tab" aria-selected="false">Activity</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" data-bs-toggle="tab" href="#profile-friends" role="tab" aria-selected="false">Friends</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" data-bs-toggle="tab" href="#profile-profile" role="tab" aria-selected="false">Profile</a>
                           </li>
                        </ul>
                     </div>
                  </div>
             </div>
          </div>
            <div class="col-lg-3">
             <div class="card">
               <div class="card-header">
                  <div class="header-title">
                     <h4 class="card-title">About</h4>
                  </div>
               </div>
               <div class="card-body">
                  <p>Lorem ipsum dolor sit amet, contur adipiscing elit.</p>
                  <div class="mb-1">Email: <a href="#" class="ms-3">nikjone@demoo.com</a></div>
                  <div class="mb-1">Phone: <a href="#" class="ms-3">001 2351 256 12</a></div>
                  <div>Location: <span class="ms-3">USA</span></div>
               </div>
             </div>
             <div class="card">
               <div class="card-header d-flex align-items-center justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title">Gallery</h4>
                  </div>
                  <span>132 pics</span>
               </div>
               <div class="card-body">
                  <div class="d-grid gap-card grid-cols-3">
                     <a data-fslightbox="gallery" href="../../assets/images/icons/04.png">
                        <img src="../../assets/images/icons/04.png" class="img-fluid bg-info-subtle rounded" alt="profile-image">
                     </a>
                     <a data-fslightbox="gallery" href="../../assets/images/shapes/02.png">
                        <img src="../../assets/images/shapes/02.png" class="img-fluid bg-primary-subtle rounded" alt="profile-image">
                     </a>
                     <a data-fslightbox="gallery" href="../../assets/images/icons/08.png">
                        <img src="../../assets/images/icons/08.png" class="img-fluid bg-info-subtle rounded" alt="profile-image">
                     </a>
                     <a data-fslightbox="gallery" href="../../assets/images/shapes/04.png">
                        <img src="../../assets/images/shapes/04.png" class="img-fluid bg-primary-subtle rounded" alt="profile-image">
                     </a>
                     <a data-fslightbox="gallery" href="../../assets/images/icons/02.png">
                        <img src="../../assets/images/icons/02.png" class="img-fluid bg-warning-subtle rounded" alt="profile-image">
                     </a>
                     <a data-fslightbox="gallery" href="../../assets/images/shapes/06.png">
                        <img src="../../assets/images/shapes/06.png" class="img-fluid bg-primary-subtle rounded" alt="profile-image">
                     </a>
                     <a data-fslightbox="gallery" href="../../assets/images/icons/05.png">
                        <img src="../../assets/images/icons/05.png" class="img-fluid  bg-danger-subtle rounded" alt="profile-image">
                     </a>
                     <a data-fslightbox="gallery" href="../../assets/images/shapes/04.png">
                        <img src="../../assets/images/shapes/04.png" class="img-fluid bg-primary-subtle rounded" alt="profile-image">
                     </a>
                     <a data-fslightbox="gallery" href="../../assets/images/icons/01.png">
                        <img src="../../assets/images/icons/01.png" class="img-fluid  bg-success-subtle rounded" alt="profile-image">
                     </a>
                  </div>
               </div>
             </div>
              
          </div>
          <div class="col-lg-6">
             <div class="profile-content tab-content">
               <!--<div id="profile-feed" class="tab-pane fade active show">-->
                   
               <!--</div>-->
               <div id="profile-activity" class="tab-pane fade active show">
                  <div class="card">
                     <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                           <h4 class="card-title">Activity</h4>
                        </div>
                     </div>
                     <div class="card-body">
                        <div class="iq-timeline0 m-0 d-flex align-items-center justify-content-between position-relative">
                           <ul class="list-inline p-0 m-0">
                              <li>
                                 <div class="timeline-dots timeline-dot1 border-primary text-primary"></div>
                                 <h6 class="float-left mb-1 custom-float-left">Client Login</h6>
                                 <small class="float-right mt-1">24 November 2019</small>
                                 <div class="d-inline-block w-100">
                                    <p>Bonbon macaroon jelly beans gummi bears jelly lollipop apple</p>
                                 </div>
                              </li>
                              <li>
                                 <div class="timeline-dots timeline-dot1 border-success text-success"></div>
                                 <h6 class="float-left mb-1 custom-float-left">Scheduled Maintenance</h6>
                                 <small class="float-right mt-1">23 November 2019</small>
                                 <div class="d-inline-block w-100">
                                    <p>Bonbon macaroon jelly beans gummi bears jelly lollipop apple</p>
                                 </div>
                              </li>
                              <li>
                                 <div class="timeline-dots timeline-dot1 border-danger text-danger"></div>
                                 <h6 class="float-left mb-1 custom-float-left">Dev Meetup</h6>
                                 <small class="float-right mt-1">20 November 2019</small>
                                 <div class="d-inline-block w-100">
                                    <p>Bonbon macaroon jelly beans <a href="#">gummi bears</a>gummi bears jelly lollipop apple</p>
                                     
                                 </div>
                              </li>
                              <li>
                                 <div class="timeline-dots timeline-dot1 border-primary text-primary"></div>
                                 <h6 class="float-left mb-1 custom-float-left">Client Call</h6>
                                 <small class="float-right mt-1">19 November 2019</small>
                                 <div class="d-inline-block w-100">
                                    <p>Bonbon macaroon jelly beans gummi bears jelly lollipop apple</p>
                                 </div>
                              </li>
                              <li>
                                 <div class="timeline-dots timeline-dot1 border-warning text-warning"></div>
                                 <h6 class="float-left mb-1 custom-float-left">Mega event</h6>
                                 <small class="float-right mt-1">15 November 2019</small>
                                 <div class="d-inline-block w-100">
                                    <p>Bonbon macaroon jelly beans gummi bears jelly lollipop apple</p>
                                 </div>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
               <div id="profile-friends" class="tab-pane fade">
                  <div class="card">
                     <div class="card-header">
                        <div class="header-title">
                           <h4 class="card-title">Friends</h4>
                        </div>
                     </div>
                     <div class="card-body">
                        <ul class="list-inline m-0 p-0">
                           <li class="d-flex mb-4 align-items-center">
                              <img src="../../assets/images/avatars/01.png" alt="story-img" class="rounded-pill avatar-40">
                              <div class="ms-3 flex-grow-1">
                                 <h6>Paul Molive</h6>
                                 <p class="mb-0">Web Designer</p>
                              </div>
                              <div class="dropdown">
                                 <span class="dropdown-toggle" id="dropdownMenuButton9" data-bs-toggle="dropdown" aria-expanded="false" role="button">
                                 </span>
                                 <div class="dropdown-menu dropdown-menu-end custom-dropdown-menu-friends" aria-labelledby="dropdownMenuButton9">
                                    <a class="dropdown-item " href="javascript:void(0);">Unfollow</a>
                                    <a class="dropdown-item " href="javascript:void(0);">Unfriend</a>
                                    <a class="dropdown-item " href="javascript:void(0);">Block</a>
                                 </div>
                              </div>
                           </li>
                           <li class="d-flex mb-4 align-items-center">
                              <img src="../../assets/images/avatars/05.png" alt="story-img" class="rounded-pill avatar-40">
                              <div class="ms-3 flex-grow-1">
                                 <h6>Paul Molive</h6>
                                 <p class="mb-0">trainee</p>
                              </div>
                              <div class="dropdown">
                                 <span class="dropdown-toggle" id="dropdownMenuButton10" data-bs-toggle="dropdown" aria-expanded="false" role="button">
                                 </span>
                                 <div class="dropdown-menu dropdown-menu-end custom-dropdown-menu-friends" aria-labelledby="dropdownMenuButton10">
                                    <a class="dropdown-item " href="javascript:void(0);">Unfollow</a>
                                    <a class="dropdown-item " href="javascript:void(0);">Unfriend</a>
                                    <a class="dropdown-item " href="javascript:void(0);">Block</a>
                                 </div>
                              </div>
                           </li>
                           <li class="d-flex mb-4 align-items-center">
                              <img src="../../assets/images/avatars/02.png" alt="story-img" class="rounded-pill avatar-40">
                              <div class="ms-3 flex-grow-1">
                                 <h6>Anna Mull</h6>
                                 <p class="mb-0">Web Developer</p>
                              </div>
                              <div class="dropdown">
                                 <span class="dropdown-toggle" id="dropdownMenuButton11" data-bs-toggle="dropdown" aria-expanded="false" role="button">
                                 </span>
                                 <div class="dropdown-menu dropdown-menu-end custom-dropdown-menu-friends" aria-labelledby="dropdownMenuButton11">
                                    <a class="dropdown-item " href="javascript:void(0);">Unfollow</a>
                                    <a class="dropdown-item " href="javascript:void(0);">Unfriend</a>
                                    <a class="dropdown-item " href="javascript:void(0);">Block</a>
                                 </div>
                              </div>
                           </li>
                           <li class="d-flex mb-4 align-items-center">
                              <img src="../../assets/images/avatars/03.png" alt="story-img" class="rounded-pill avatar-40">
                              <div class="ms-3 flex-grow-1">
                                 <h6>Paige Turner</h6>
                                 <p class="mb-0">trainee</p>
                              </div>
                              <div class="dropdown">
                                 <span class="dropdown-toggle" id="dropdownMenuButton12" data-bs-toggle="dropdown" aria-expanded="false" role="button">
                                 </span>
                                 <div class="dropdown-menu dropdown-menu-end custom-dropdown-menu-friends" aria-labelledby="dropdownMenuButton12">
                                    <a class="dropdown-item " href="javascript:void(0);">Unfollow</a>
                                    <a class="dropdown-item " href="javascript:void(0);">Unfriend</a>
                                    <a class="dropdown-item " href="javascript:void(0);">Block</a>
                                 </div>
                              </div>
                           </li>
                           <li class="d-flex mb-4 align-items-center">
                              <img src="../../assets/images/avatars/04.png" alt="story-img" class="rounded-pill avatar-40">
                              <div class="ms-3 flex-grow-1">
                                 <h6>Barb Ackue</h6>
                                 <p class="mb-0">Web Designer</p>
                              </div>
                              <div class="dropdown">
                                 <span class="dropdown-toggle" id="dropdownMenuButton13" data-bs-toggle="dropdown" aria-expanded="false" role="button">
                                 </span>
                                 <div class="dropdown-menu dropdown-menu-end custom-dropdown-menu-friends" aria-labelledby="dropdownMenuButton13">
                                    <a class="dropdown-item " href="javascript:void(0);">Unfollow</a>
                                    <a class="dropdown-item " href="javascript:void(0);">Unfriend</a>
                                    <a class="dropdown-item " href="javascript:void(0);">Block</a>
                                 </div>
                              </div>
                           </li>
                           <li class="d-flex mb-4 align-items-center">
                              <img src="../../assets/images/avatars/05.png" alt="story-img" class="rounded-pill avatar-40">
                              <div class="ms-3 flex-grow-1">
                                 <h6>Greta Life</h6>
                                 <p class="mb-0">Tester</p>
                              </div>
                              <div class="dropdown">
                                 <span class="dropdown-toggle" id="dropdownMenuButton14" data-bs-toggle="dropdown" aria-expanded="false" role="button">
                                 </span>
                                 <div class="dropdown-menu dropdown-menu-end custom-dropdown-menu-friends" aria-labelledby="dropdownMenuButton14">
                                    <a class="dropdown-item " href="javascript:void(0);">Unfollow</a>
                                    <a class="dropdown-item " href="javascript:void(0);">Unfriend</a>
                                    <a class="dropdown-item " href="javascript:void(0);">Block</a>
                                 </div>
                              </div>
                           </li>
                           <li class="d-flex mb-4 align-items-center">
                              <img src="../../assets/images/avatars/03.png" alt="story-img" class="rounded-pill avatar-40">                              <div class="ms-3 flex-grow-1">
                                 <h6>Ira Membrit</h6>
                                 <p class="mb-0">Android Developer</p>
                              </div>
                              <div class="dropdown">
                                 <span class="dropdown-toggle" id="dropdownMenuButton15" data-bs-toggle="dropdown" aria-expanded="false" role="button">
                                 </span>
                                 <div class="dropdown-menu dropdown-menu-end custom-dropdown-menu-friends" aria-labelledby="dropdownMenuButton15">
                                    <a class="dropdown-item " href="javascript:void(0);">Unfollow</a>
                                    <a class="dropdown-item " href="javascript:void(0);">Unfriend</a>
                                    <a class="dropdown-item " href="javascript:void(0);">Block</a>
                                 </div>
                              </div>
                           </li>
                           <li class="d-flex mb-4 align-items-center">
                              <img src="../../assets/images/avatars/02.png" alt="story-img" class="rounded-pill avatar-40">
                              <div class="ms-3 flex-grow-1">
                                 <h6>Pete Sariya</h6>
                                 <p class="mb-0">Web Designer</p>
                              </div>
                              <div class="dropdown">
                                 <span class="dropdown-toggle" id="dropdownMenuButton16" data-bs-toggle="dropdown" aria-expanded="false" role="button">
                                 </span>
                                 <div class="dropdown-menu dropdown-menu-end custom-dropdown-menu-friends" aria-labelledby="dropdownMenuButton16">
                                    <a class="dropdown-item " href="javascript:void(0);">Unfollow</a>
                                    <a class="dropdown-item " href="javascript:void(0);">Unfriend</a>
                                    <a class="dropdown-item " href="javascript:void(0);">Block</a>
                                 </div>
                              </div>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div id="profile-profile" class="tab-pane fade">
                   -
               </div>
            </div>
          </div>
          <div class="col-lg-3">
             
             <div class="card">
               <div class="card-header">
                  <div class="header-title">
                     <h4 class="card-title">Stories</h4>
                  </div>
               </div>
               <div class="card-body">
                  <ul class="list-inline m-0 p-0 ">
                     <li class="d-flex mb-4 align-items-center active">
                        <img src="../../assets/images/icons/06.png" alt="story-img" class="rounded-pill avatar-70 p-1 profile-story-img border  bg-light-subtle img-fluid">
                        <div class="ms-3">
                           <h5>Web Design</h5>
                           <p class="mb-0">1 hour ago</p>
                        </div>
                     </li>
                     <li class="d-flex mb-4 align-items-center">
                        <img src="../../assets/images/icons/03.png" alt="story-img" class="rounded-pill avatar-70 p-1 border  img-fluid bg-danger-subtle">
                        <div class="ms-3">
                           <h5>App Design</h5>
                           <p class="mb-0">4 hour ago</p>
                        </div>
                     </li>
                     <li class="d-flex align-items-center">
                        <img src="../../assets/images/icons/07.png" alt="story-img" class="rounded-pill avatar-70 p-1 border bg-primary-subtle img-fluid">
                        <div class="ms-3">
                           <h5>Abstract Design</h5>
                           <p class="mb-0">9 hour ago</p>
                        </div>
                     </li>
                  </ul>
               </div>
             </div>
             <div class="card">
               <div class="card-header">
                  <div class="header-title">
                     <h4 class="card-title">Suggestions</h4>
                  </div>
               </div>
               <div class="card-body">
                  <ul class="list-inline m-0 p-0">
                     <li class="d-flex mb-4 align-items-center">
                        <div class="img-fluid bg-warning-subtle rounded-pill"><img src="../../assets/images/icons/05.png" alt="story-img" class="rounded-pill avatar-40"></div>
                        <div class="ms-3 flex-grow-1">
                           <h6>Paul Molive</h6>
                           <p class="mb-0">4 mutual friends</p>
                        </div>
                        <a href="javascript:void(0);" class="btn btn-outline-primary rounded-circle btn-icon btn-sm p-2">
                           <span class="btn-inner">
                              <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path fill-rule="evenodd" clip-rule="evenodd" d="M9.87651 15.2063C6.03251 15.2063 2.74951 15.7873 2.74951 18.1153C2.74951 20.4433 6.01251 21.0453 9.87651 21.0453C13.7215 21.0453 17.0035 20.4633 17.0035 18.1363C17.0035 15.8093 13.7415 15.2063 9.87651 15.2063Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    
                                 <path fill-rule="evenodd" clip-rule="evenodd" d="M9.8766 11.886C12.3996 11.886 14.4446 9.841 14.4446 7.318C14.4446 4.795 12.3996 2.75 9.8766 2.75C7.3546 2.75 5.3096 4.795 5.3096 7.318C5.3006 9.832 7.3306 11.877 9.8456 11.886H9.8766Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    
                                 <path d="M19.2036 8.66919V12.6792" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    
                                 <path d="M21.2497 10.6741H17.1597" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                 
                              </svg> 
                           </span>                            
                        </a>
                     </li>
                     <li class="d-flex mb-4 align-items-center">
                        <div class="img-fluid bg-danger-subtle rounded-pill"><img src="../../assets/images/icons/03.png" alt="story-img" class="rounded-pill avatar-40"></div>
                        <div class="ms-3 flex-grow-1">
                           <h6>Robert Fox</h6>
                           <p class="mb-0">4 mutual friends</p>
                        </div>
                        <a href="javascript:void(0);" class="btn btn-outline-primary rounded-circle btn-icon btn-sm p-2">
                           <span class="btn-inner">
                              <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path fill-rule="evenodd" clip-rule="evenodd" d="M9.87651 15.2063C6.03251 15.2063 2.74951 15.7873 2.74951 18.1153C2.74951 20.4433 6.01251 21.0453 9.87651 21.0453C13.7215 21.0453 17.0035 20.4633 17.0035 18.1363C17.0035 15.8093 13.7415 15.2063 9.87651 15.2063Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    
                                 <path fill-rule="evenodd" clip-rule="evenodd" d="M9.8766 11.886C12.3996 11.886 14.4446 9.841 14.4446 7.318C14.4446 4.795 12.3996 2.75 9.8766 2.75C7.3546 2.75 5.3096 4.795 5.3096 7.318C5.3006 9.832 7.3306 11.877 9.8456 11.886H9.8766Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    
                                 <path d="M19.2036 8.66919V12.6792" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    
                                 <path d="M21.2497 10.6741H17.1597" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                 
                              </svg> 
                           </span>                            
                        </a>
                     </li>
                     <li class="d-flex mb-4 align-items-center">
                        <div class="img-fluid  bg-dark-subtle  rounded-pill"><img src="../../assets/images/icons/06.png" alt="story-img" class="rounded-pill  profile-story-img avatar-40"></div>
                        <div class="ms-3 flex-grow-1">
                           <h6>Jenny Wilson</h6>
                           <p class="mb-0">6 mutual friends</p>
                        </div>
                        <a href="javascript:void(0);" class="btn btn-outline-primary rounded-circle btn-icon btn-sm p-2">
                           <span class="btn-inner">
                              <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path fill-rule="evenodd" clip-rule="evenodd" d="M9.87651 15.2063C6.03251 15.2063 2.74951 15.7873 2.74951 18.1153C2.74951 20.4433 6.01251 21.0453 9.87651 21.0453C13.7215 21.0453 17.0035 20.4633 17.0035 18.1363C17.0035 15.8093 13.7415 15.2063 9.87651 15.2063Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    
                                 <path fill-rule="evenodd" clip-rule="evenodd" d="M9.8766 11.886C12.3996 11.886 14.4446 9.841 14.4446 7.318C14.4446 4.795 12.3996 2.75 9.8766 2.75C7.3546 2.75 5.3096 4.795 5.3096 7.318C5.3006 9.832 7.3306 11.877 9.8456 11.886H9.8766Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    
                                 <path d="M19.2036 8.66919V12.6792" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    
                                 <path d="M21.2497 10.6741H17.1597" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                 
                              </svg> 
                           </span>                            
                        </a>
                     </li>
                     <li class="d-flex mb-4 align-items-center">
                        <div class="img-fluid bg-primary-subtle rounded-pill"><img src="../../assets/images/icons/07.png" alt="story-img" class="rounded-pill avatar-40"></div>
                        <div class="ms-3 flex-grow-1">
                           <h6>Cody Fisher</h6>
                           <p class="mb-0">8 mutual friends</p>
                        </div>
                        <a href="javascript:void(0);" class="btn btn-outline-primary rounded-circle btn-icon btn-sm p-2">
                           <span class="btn-inner">
                              <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path fill-rule="evenodd" clip-rule="evenodd" d="M9.87651 15.2063C6.03251 15.2063 2.74951 15.7873 2.74951 18.1153C2.74951 20.4433 6.01251 21.0453 9.87651 21.0453C13.7215 21.0453 17.0035 20.4633 17.0035 18.1363C17.0035 15.8093 13.7415 15.2063 9.87651 15.2063Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    
                                 <path fill-rule="evenodd" clip-rule="evenodd" d="M9.8766 11.886C12.3996 11.886 14.4446 9.841 14.4446 7.318C14.4446 4.795 12.3996 2.75 9.8766 2.75C7.3546 2.75 5.3096 4.795 5.3096 7.318C5.3006 9.832 7.3306 11.877 9.8456 11.886H9.8766Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    
                                 <path d="M19.2036 8.66919V12.6792" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    
                                 <path d="M21.2497 10.6741H17.1597" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                 
                              </svg> 
                           </span>                            
                        </a>
                     </li>
                     <li class="d-flex mb-4 align-items-center">
                        <div class="img-fluid bg-info-subtle rounded-pill"><img src="../../assets/images/icons/04.png" alt="story-img" class="rounded-pill avatar-40"></div>
                        <div class="ms-3 flex-grow-1">
                           <h6>Bessie Cooper</h6>
                           <p class="mb-0">1 mutual friends</p>
                        </div>
                        <a href="javascript:void(0);" class="btn btn-outline-primary rounded-circle btn-icon btn-sm p-2">
                           <span class="btn-inner">
                              <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path fill-rule="evenodd" clip-rule="evenodd" d="M9.87651 15.2063C6.03251 15.2063 2.74951 15.7873 2.74951 18.1153C2.74951 20.4433 6.01251 21.0453 9.87651 21.0453C13.7215 21.0453 17.0035 20.4633 17.0035 18.1363C17.0035 15.8093 13.7415 15.2063 9.87651 15.2063Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    
                                 <path fill-rule="evenodd" clip-rule="evenodd" d="M9.8766 11.886C12.3996 11.886 14.4446 9.841 14.4446 7.318C14.4446 4.795 12.3996 2.75 9.8766 2.75C7.3546 2.75 5.3096 4.795 5.3096 7.318C5.3006 9.832 7.3306 11.877 9.8456 11.886H9.8766Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    
                                 <path d="M19.2036 8.66919V12.6792" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    
                                 <path d="M21.2497 10.6741H17.1597" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                 
                              </svg> 
                           </span>                            
                        </a>
                     </li>
                     <li class="d-flex mb-4 align-items-center">
                        <div class="img-fluid bg-warning-subtle rounded-pill"><img src="../../assets/images/icons/02.png" alt="story-img" class="rounded-pill avatar-40"></div>
                        <div class="ms-3 flex-grow-1">
                           <h6>Wade Warren</h6>
                           <p class="mb-0">3 mutual friends</p>
                        </div>
                        <a href="javascript:void(0);" class="btn btn-outline-primary rounded-circle btn-icon btn-sm p-2">
                           <span class="btn-inner">
                              <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path fill-rule="evenodd" clip-rule="evenodd" d="M9.87651 15.2063C6.03251 15.2063 2.74951 15.7873 2.74951 18.1153C2.74951 20.4433 6.01251 21.0453 9.87651 21.0453C13.7215 21.0453 17.0035 20.4633 17.0035 18.1363C17.0035 15.8093 13.7415 15.2063 9.87651 15.2063Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    
                                 <path fill-rule="evenodd" clip-rule="evenodd" d="M9.8766 11.886C12.3996 11.886 14.4446 9.841 14.4446 7.318C14.4446 4.795 12.3996 2.75 9.8766 2.75C7.3546 2.75 5.3096 4.795 5.3096 7.318C5.3006 9.832 7.3306 11.877 9.8456 11.886H9.8766Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    
                                 <path d="M19.2036 8.66919V12.6792" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    
                                 <path d="M21.2497 10.6741H17.1597" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                 
                              </svg> 
                           </span>                            
                        </a>
                     </li>
                     <li class="d-flex mb-4 align-items-center">
                        <div class="img-fluid  bg-success-subtle rounded-pill"><img src="../../assets/images/icons/01.png" alt="story-img" class="rounded-pill avatar-40"></div>
                        <div class="ms-3 flex-grow-1">
                           <h6>Guy Hawkins</h6>
                           <p class="mb-0">12 mutual friends</p>
                        </div>                        
                        <a href="javascript:void(0);" class="btn btn-outline-primary rounded-circle btn-icon btn-sm p-2">
                           <span class="btn-inner">
                              <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path fill-rule="evenodd" clip-rule="evenodd" d="M9.87651 15.2063C6.03251 15.2063 2.74951 15.7873 2.74951 18.1153C2.74951 20.4433 6.01251 21.0453 9.87651 21.0453C13.7215 21.0453 17.0035 20.4633 17.0035 18.1363C17.0035 15.8093 13.7415 15.2063 9.87651 15.2063Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    
                                 <path fill-rule="evenodd" clip-rule="evenodd" d="M9.8766 11.886C12.3996 11.886 14.4446 9.841 14.4446 7.318C14.4446 4.795 12.3996 2.75 9.8766 2.75C7.3546 2.75 5.3096 4.795 5.3096 7.318C5.3006 9.832 7.3306 11.877 9.8456 11.886H9.8766Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    
                                 <path d="M19.2036 8.66919V12.6792" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    
                                 <path d="M21.2497 10.6741H17.1597" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                 
                              </svg> 
                           </span>                            
                        </a>
                     </li>
                     <li class="d-flex align-items-center">
                        <div class="img-fluid bg-info-subtle rounded-pill"><img src="../../assets/images/icons/08.png" alt="story-img" class="rounded-pill avatar-40"></div>
                        <div class="ms-3 flex-grow-1">
                           <h6>Floyd Miles</h6>
                           <p class="mb-0">2 mutual friends</p>
                        </div>
                        <a href="javascript:void(0);" class="btn btn-outline-primary rounded-circle btn-icon btn-sm p-2">
                           <span class="btn-inner">
                              <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path fill-rule="evenodd" clip-rule="evenodd" d="M9.87651 15.2063C6.03251 15.2063 2.74951 15.7873 2.74951 18.1153C2.74951 20.4433 6.01251 21.0453 9.87651 21.0453C13.7215 21.0453 17.0035 20.4633 17.0035 18.1363C17.0035 15.8093 13.7415 15.2063 9.87651 15.2063Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    
                                 <path fill-rule="evenodd" clip-rule="evenodd" d="M9.8766 11.886C12.3996 11.886 14.4446 9.841 14.4446 7.318C14.4446 4.795 12.3996 2.75 9.8766 2.75C7.3546 2.75 5.3096 4.795 5.3096 7.318C5.3006 9.832 7.3306 11.877 9.8456 11.886H9.8766Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    
                                 <path d="M19.2036 8.66919V12.6792" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    
                                 <path d="M21.2497 10.6741H17.1597" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                 
                              </svg> 
                           </span>                            
                        </a>
                     </li>
                  </ul>
               </div>
             </div>
          </div>
      </div>

</div>

@endsection