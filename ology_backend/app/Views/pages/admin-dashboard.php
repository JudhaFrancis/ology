<!DOCTYPE php>
<php lang="en">

    <style>
        /* Custom sidebar styles */
        .sidebar {
            background-color: #333;
            padding-top: 20px;
        }

        .sidebar a {
            padding: 15px;
            text-decoration: none;
            font-size: 18px;
            color: #000;
            display: block;
        }

        .sidebar a:hover {
            background-color: #555;
        }

        /* Main content styles */
        .content {
            padding: 20px;
        }
    </style>

<body>
 

    <!-- Sidebar and Content Area (for mobile) -->
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar (for mobile) -->
            <nav class="col-md-3 col-lg-2 d-md-block  sidebb">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item nav-term">
                            <a class="nav-link" href="javascript:void(0);" onclick="showDashboard()">Events</a>
                        </li>
                        <li class="nav-item nav-term">
                            <a class="nav-link" href="javascript:void(0);" onclick="showProfile()">OGTFS</a>
                        </li>
                        <li class="nav-item nav-term">
                            <a class="nav-link" href="javascript:void(0);" onclick="showSettings()">Gallery</a>
                        </li> 
                        <li class="nav-item nav-term">
                            <a class="nav-link" href="javascript:void(0);" onclick="showReports()">Noticeboard</a>
                        </li>
                        <li class="nav-item nav-term">
                          <a class="nav-link" href="javascript:void(0);" onclick="showBlog()">Blog</a>
                      </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content Area -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-5">
                <h1 class="mt-2">Admin Dashboard</h1>
                <div id="dashboardContent" class="mt-5">
                    <!-- Default content for the Dashboard -->
                    <p>Events</p>
                    <button type="button" class="btn btn-primary maste mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Add new
                    </button>

                    <div class="row" id="eventList"></div>
               
                    <!-- <div class="row">
                    <div class="col-lg-6 gir-row  moz mt-5">
                      <div class="eve-card text-center ">
                       <img style="width: 66%;" src="./assets/img/workca.png" alt="">
                       <div class="wor-1">Calligraphy Workshop</div>
                       <p class="wor-p">Lorem ipsium wefu wef wefw wefwhji qwoie jfjowjofj ejfwjoj wjejfowej opklwefijw ojm wefojkwf wkokfoiej weio fwo weofkkojwokef.</p>
                       <button type="button" onclick="editFunction(JSON.stringify('event'))" class="btn btn-primary mastrr mt-3" data-bs-toggle="modal" data-bs-target="#editevents">
                       Edit
                    </button> 
                      </div>
                  </div>
                  
                <div class="col-lg-6 gir-row mt-5">
                  <div class="eve-card text-center ">
                   <img src="./assets/img/workca.png" alt="">
                   <div class="wor-1">Event 3</div>
                   <p class="wor-p">Lorem ipsium wefu wef wefw wefwhji qwoie jfjowjofj ejfwjoj wjejfowej opklwefijw ojm wefojkwf wkokfoiej weio fwo weofkkojwokef.</p>
                   <button type="button" onclick="editFunction('editFunction')" class="btn btn-primary mastrr mt-3" data-bs-toggle="modal" data-bs-target="#editevents">
                    Edit
                 </button> 
                  </div>
              </div>
           
           
            </div> -->
                </div>
                <div id="profileContent" style="display: none;" class="mt-5">
                    <!-- Content for the Profile -->
                    <p>OGTFS</p>
                    <button type="button" class="btn btn-primary maste mt-3" data-bs-toggle="modal" data-bs-target="#addworkshop">
                      Add new
                  </button>
                  
                  <div class="row" id="workList">
<!-- 
                  <div class="col-lg-6 gir-row moz mt-5">
                      <div class="work-card text-center ">
                       <img src="./assets/img/workca.png" alt="">
                       <div class="wor-1">workshop 1</div>
                       <p class="wor-p">Lorem ipsium wefu wef wefw wefwhji qwoie jfjowjofj ejfwjoj wjejfowej opklwefijw ojm wefojkwf wkokfoiej weio fwo weofkkojwokef.</p>
                       <button type="button" class="btn btn-primary mastrr mt-3" data-bs-toggle="modal" data-bs-target="#editworkshop">
                        Edit
                     </button>    
                      </div>
                  </div>
                  <div class="col-lg-6 gir-row mt-5">
                    <div class="work-card text-center ">
                     <img src="./assets/img/workca.png" alt="">
                     <div class="wor-1">workshop 1</div>
                     <p class="wor-p">Lorem ipsium wefu wef wefw wefwhji qwoie jfjowjofj ejfwjoj wjejfowej opklwefijw ojm wefojkwf wkokfoiej weio fwo weofkkojwokef.</p>
                     <button type="button" onclick="editFunction(JSON.stringify('event'))" class="btn btn-primary mastrr mt-3" data-bs-toggle="modal" data-bs-target="#editworkshop">
                      Edit
                   </button>      
                    </div>
                </div> -->
              </div>
                </div>
                <div id="blogContent" style="display: none;" class="mt-5">
                  <!-- Content for the Profile -->
                  <p>Blog</p>
                  <button type="button" class="btn btn-primary maste mt-3" data-bs-toggle="modal" data-bs-target="#addblog">
                    Add new
                </button>
                
                <div class="container des">
              
                  <div  id="blogList" class="row">            </div>

                  
              </div>
              </div>

                <div id="settingsContent" style="display: none;" class="mt-5">
                    <!-- Content for the Settings -->
                    <p>Gallery</p>
                    <button type="button" class="btn btn-primary maste mt-3" data-bs-toggle="modal" data-bs-target="#addgallery">
                      Add new
                  </button>
                  <div class="container text-center mt-5">
                    <div class="row" id="galleryList">
                  
                    </div>
                  
                   </div>
                </div>
                <div id="reportsContent" style="display: none;" class="mt-5">
                    <!-- Content for the Reports -->
                    <p>Noticeboard</p>
                    <div class="container des">
                      <div class="row">
                      <div class="col-lg-12 mb-5 ">
                        <div id="noticeboardList"></div>
              <!-- <div class="note-card mt-5">

              <div class="gree-bg">
                  <p class="not-p">Lorem ipsum dolor sit amet  <br> <br>  <span class="dat-span"> Date</span></p>
                 
              <div ></div>
                  <img class="grey" src="./assets/img/Rectangle 28-1.png" alt="">
              </div>
              <button type="button" class="btn btn-primary mastrr mt-3" data-bs-toggle="modal" data-bs-target="#editnoticeboard">
                Edit
             </button>
              </div>
              
              <div class="note-card mt-5">
                <div class="gree-bg">
                    <p class="not-p">Lorem ipsum dolor sit amet  <br> <br>  <span class="dat-span"> Date</span></p>
                   
                
                    <img src="./assets/img/Rectangle 28-2.png" alt="">
                  
                </div>
                <button type="button" class="btn btn-primary mastrr mt-3" data-bs-toggle="modal" data-bs-target="#editnoticeboard">
                  Edit
               </button> 
                </div>
                <div class="note-card mt-5">
                  <div class="gree-bg">
                      <p class="not-p">Lorem ipsum dolor sit amet  <br> <br>  <span class="dat-span"> Date</span></p>
                     
                  
                      <img src="./assets/img/Rectangle 28-3.png" alt="">
                  </div>
                  <button type="button" class="btn btn-primary mastrr mt-3" data-bs-toggle="modal" data-bs-target="#editnoticeboard">
                    Edit
                 </button>
                  </div>
                  <div class="note-card mt-5">
                    <div class="gree-bg">
                        <p class="not-p">Lorem ipsum dolor sit amet  <br> <br>  <span class="dat-span"> Date</span></p>
                       
                    
                        <img src="./assets/img/Rectangle 28.png" alt="">
                    </div>
                    <button type="button" class="btn btn-primary mastrr mt-3" data-bs-toggle="modal" data-bs-target="#editnoticeboard">
                      Edit
                   </button>
                    </div> -->
                      </div>
                      <!-- <div class="col-lg-5 ">
                          <img class="grgr" src="./assets/img/grgrgr 1.png" alt="">
                          
                      </div> -->
                     
                  </div>
                    </div>
              
              
                    <div class="container mob">
                      <div class="row">
                        <!-- <div class="col-lg-5 text-center mob mt-3">
                          <img class="" src="./assets/img/grgrgr 1-mb.png" alt="">
                          
                      </div> -->
                      <div class="col-lg-12 mb-5 ">
              <div class="note-card mt-5">
              <div class="gree-bg">
                  <p class="not-p">Lorem ipsum dolor sit amet  <br> <br>  <span class="dat-span"> Date</span></p>
                 
              <div ></div>
                  <img class="grey" src="assets/img/eee-mb.png" alt="">
              </div>
              <button type="button" class="btn btn-primary mastrr mt-3" data-bs-toggle="modal" data-bs-target="#editnoticeboard">
                Edit
             </button>
              </div>
              <div class="note-card mt-5">
                <div class="gree-bg">
                    <p class="not-p">Lorem ipsum dolor sit amet  <br> <br>  <span class="dat-span"> Date</span></p>
                   
                
                    <img class="grey" src="assets/img/eee-mb.png" alt="">
                </div>
                <button type="button" class="btn btn-primary mastrr mt-3" data-bs-toggle="modal" data-bs-target="#editnoticeboard">
                  Edit
               </button>
                </div>
                <div class="note-card mt-5">
                  <div class="gree-bg">
                      <p class="not-p">Lorem ipsum dolor sit amet  <br> <br>  <span class="dat-span"> Date</span></p>
                     
                  
                      <img class="grey" src="assets/img/eee-mb.png" alt="">
                  </div>
                  <button type="button" class="btn btn-primary mastrr mt-3" data-bs-toggle="modal" data-bs-target="#editnoticeboard">
                    Edit
                 </button>
                  </div>
                  <div class="note-card mt-5">
                    <div class="gree-bg">
                        <p class="not-p">Lorem ipsum dolor sit amet  <br> <br>  <span class="dat-span"> Date</span></p>
                       
                    
                        <img class="grey" src="assets/img/eee-mb.png" alt="">
                    </div>
                    <button type="button" class="btn btn-primary mastrr mt-3" data-bs-toggle="modal" data-bs-target="#editnoticeboard">
                      Edit
                   </button>
                    </div>
                      </div>
                      <div class="col-lg-5 des">
                          <img class="grgr" src="assets/img/grgrgr 1.png" alt="">
                          
                      </div>
                  </div>
                    </div>
                </div>
            </main>
        </div>
    </div>


     

    
    <!-- Add event Form -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Event</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <!-- Your form content goes here -->
            <form id="eventForm">
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Event name</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="name" placeholder="">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Event information</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="information" rows="3"></textarea>
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Event Amount</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="amount" placeholder="">
              </div>
              <div class="py-8">
                <label for="exampleFormControlTextarea1" class="form-label">Choose Thumbnail</label>
                <!-- This is a normal file input -->
                <input type="file" id="default" name="image"   class="form-control">
              </div>
              <div class="py-8">
                <label for="exampleFormControlTextarea1" class="form-label">Event Images</label>
                <!-- This is a normal file input -->
                <input type="file" id="default" name="eventImages"   class="form-control" multiple>
              </div>
              <div class="py-8">
                <label for="exampleFormControlTextarea1" class="form-label">Date</label>
                <!-- This is a normal file input -->
                <input type="datetime-local" id="default" name="date"   class="form-control">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit"  id="saveButton" class="btn btn-primary">Save changes</button>
              </div>
            </form>
          </div>
         
        </div>
      </div>
    </div>

  <!-- Add workshop Form -->
    <div class="modal fade" id="addworkshop" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Workshop</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <!-- Your form content goes here -->
            <form  action="" method="post" id="workForm">
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Event name</label>
                <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Event information</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="information" rows="3"></textarea>
              </div>
              <div class="py-8">
                <label for="exampleFormControlTextarea1" class="form-label">Choose Thumbnail</label>
                <!-- This is a normal file input -->
                <input type="file" name="image" id="default"  class="form-control">
              </div>
              <div class="py-8">
                <label for="exampleFormControlTextarea1" class="form-label">Event Images</label>
                <!-- This is a normal file input -->
                <input type="file" id="default" name="eventImages"   class="form-control" multiple>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </form>
          </div>
  
        </div>
      </div>
    </div>

      <!-- Add blog Form -->
      <div class="modal fade" id="addblog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Blog</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <!-- Your form content goes here -->
              <form action="" method="post" id="blogForm">
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Blog title</label>
                  <input type="text" class="form-control" id="exampleFormControlInput1" name="blogTitle" placeholder="">
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlTextarea1" class="form-label">Blog information</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" name="blogInformation" rows="3"></textarea>
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlTextarea1" class="form-label">Blog summary</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" name="blogSummary" rows="5"></textarea>
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlTextarea1" class="form-label">Author name</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" name="authorName" rows="3"></textarea>
                </div>
                <div class="py-8">
                  <label for="exampleFormControlTextarea1" class="form-label">Image</label>
                  <!-- This is a normal file input -->
                  <input type="file" name="image" id="default"  class="form-control">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
              </form>
            </div>
        
          </div>
        </div>
      </div>


      <!-- Add gallery Form -->
      <div class="modal fade" id="addgallery" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Gallery</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <!-- Your form content goes here -->
              <form action="" method="post" id="photoForm">
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Category name</label>
                  <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="">
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlTextarea1" class="form-label">Choose Thumbnail</label>
                  <!-- This is a normal file input -->
                  <input type="file" name="thumbnail" id="default"  class="form-control">
                </div>
                <div class="py-8">
                  <label for="exampleFormControlTextarea1" class="form-label" >Image</label>
                  <!-- This is a normal file input -->
                  <input type="file" name="image" id="default"  class="form-control" multiple>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
              </form>
            </div>
            
          </div>
        </div>
      </div>

<!-- edit events -->
    <div class="modal fade" id="editevents" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Event</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <!-- Your form content goes here -->
            <form action="" method="post" id="eventEditForm">
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Event name</label>
                <input type="text" class="form-control" id="exampleFormControlInput1"  name="name"  placeholder="">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Event information</label>
                <textarea class="form-control" id="exampleFormControlTextarea1"  name="information"  rows="3"></textarea>
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Event Amount</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="amount" placeholder="">
              </div>
              <div class="py-8">
                <label for="exampleFormControlTextarea1" class="form-label">Image</label>
                <!-- This is a normal file input -->
                <input type="file" name="image" id="default"  class="form-control">
              </div>
              <div class="py-8">
                <label for="exampleFormControlTextarea1" class="form-label">Date</label>
                <!-- This is a normal file input -->
                <input type="datetime-local" id="default" name="date"   class="form-control">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </form>
          </div>
     
        </div>
      </div>
    </div>


<!-- edit workshop -->
<div class="modal fade" id="editworkshop" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Workshop</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Your form content goes here -->
        <form>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Event name</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Event information</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
          <div class="py-8">
            <label for="exampleFormControlTextarea1" class="form-label">Image</label>
            <!-- This is a normal file input -->
            <input type="file" name="default" id="default"  class="form-control">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


<!-- edit blog -->
<div class="modal fade" id="editblog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit blog</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Your form content goes here -->
        <form action="" method="post" id="eventBlogForm">
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Blog name</label>
            <input type="text" class="form-control" id="exampleFormControlInput1"  name="blogTitle" placeholder="">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Blog information</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="blogInformation" rows="3"></textarea>
          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Blog summary</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="blogSummary" rows="5"></textarea>
          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Author name</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="authorName" rows="3"></textarea>
          </div>
          <div class="py-8">
            <label for="exampleFormControlTextarea1" class="form-label">Image</label>
            <!-- This is a normal file input -->
            <input type="file" name="image" id="default"  class="form-control">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
     
    </div>
  </div>
</div>

<!-- edit gallery -->

<div class="modal fade" id="editgallery" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Gallery</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Your form content goes here -->
        <form>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Category Name</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Edit Thumbnail</label>
            <!-- This is a normal file input -->
            <input type="file" name="default" id="default"  class="form-control">
          </div>
          <div class="py-8">
            <label for="exampleFormControlTextarea1" class="form-label">Edit Images</label>
                  <!-- This is a normal file input -->
                  <input type="file" name="image" id="default"  class="form-control" multiple>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
     
    </div>
  </div>
</div>



<!-- edit noticeboard -->

<div class="modal fade" id="editnoticeboard" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Gallery</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Your form content goes here -->
        <form action=""  id="noticeboardEditForm">
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Edit content</label>
            <input type="text"  name="content" class="form-control" id="exampleFormControlInput1" placeholder="">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Edit Date</label>
            <input type="text"  name="date" class="form-control" id="exampleFormControlInput2" placeholder="">
          </div>
          <div class="py-8">
            <label for="exampleFormControlTextarea1" class="form-label">Edit Image</label>
            <!-- This is a normal file input -->
            <input type="file" name="image" id="default"  class="form-control">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>
<script>
  function creategalleryCard(event) {
    console.log(event);
            const card = document.createElement("div");
            card.className = "col-lg-4";
            card.innerphp = `
          <h1 class="art-h mb-3">${event.name}</h1>
          <a href="#" onclick="viewgalleryDetails(${event.id})"> 
            <img class="girls-week" src="/backend/uploads/${event.thumbnail}" alt="${event.thumbnail}">
          </a>
                    `;
            return card;
        }


       function viewgalleryDetails(eventString) {

  // Store the event in localStorage
  localStorage.setItem('selectedgallery',eventString );

  // Redirect to the events-inner.php page
  window.location.href = "gallery-pages/creativewriting.php";
}


        // Function to render the event cards
        function rendertgalleryList(data) {
          localStorage.setItem('listgallery', JSON.stringify(data));
            const eventList = document.getElementById("galleryList");
            data.forEach(event => {
                const card = creategalleryCard(event);
                console.log("card",card);
                eventList.appendChild(card);
            });
        }
        const api = "<?php echo $api;?>";
     axios.get(api+'/getgallery')
                        .then(response => {
                            console.log(response.data);
                            rendertgalleryList(response.data)
                        })
                        .catch(error => {
                            // Handle errors here
                            console.error(error);
                        });


</script>

<script>
  // Function to delete a noticeboard item
  function deleteNoticeboardItem(tableName, itemId) {
    // Replace 'http://localhost:3003' with your API endpoint
           const api = "<?php echo $api;?>";
    const apiUrl = `${api}/delete/${tableName}/${itemId}`;

    console.log("apiUrl",apiUrl);
    // Make the DELETE request using Axios
    axios.delete(apiUrl)
      .then(response => {
        window.location.reload();
        console.log(response.data); // Handle the success response
      })
      .catch(error => {
        console.error(error); // Handle errors
      });
  }

  // Example: Delete a noticeboard item with table name 'noticeboard' and ID '123'
  // deleteNoticeboardItem('noticeboard', '123');
</script>

<script>

const user = localStorage.getItem("user");
console.log("user",user);
if(user!=null){
const role = JSON.parse(user).role
console.log("role",role);
if(role=="admin" && role !=undefined){
  ""
}else{
  window.location.href = "common-login.php";

}}
else{
  window.location.href = "common-login.php";

}

</script>



    <!-- JavaScript for content switching -->
    <script>
  
        function showDashboard() {
            hideAllContent();
            document.getElementById("dashboardContent").style.display = "block";
        }

        function showProfile() {
            hideAllContent();
            document.getElementById("profileContent").style.display = "block";
        }

        function showSettings() {
            hideAllContent();
            document.getElementById("settingsContent").style.display = "block";
        }

        function showBlog() {
            hideAllContent();
            document.getElementById("blogContent").style.display = "block";
        }

        function showReports() {
            hideAllContent();
            document.getElementById("reportsContent").style.display = "block";
        }

        function hideAllContent() {
            document.getElementById("dashboardContent").style.display = "none";
            document.getElementById("profileContent").style.display = "none";
            document.getElementById("settingsContent").style.display = "none";
            document.getElementById("reportsContent").style.display = "none";
        }
    </script>

<script>
  function createBlogCard(event) {
    console.log("++++++++++",event);
            const card = document.createElement("div");
            card.className = "col-lg-6 gir-row moz mt-5";
            card.innerphp = `
            <div class="col-lg-6 gir-row moz mt-5">
                    <div class="work-card text-center ">
                    <img src="./backend/uploads/${event.image}" alt="">
                     <div class="wor-1">${event.blogTitle}</div>
                     <p class="wor-p">${event.blogInformation}</p>
                     <p class="wor-p">- ${event.authorName}</p>
                     <button type="button" onclick=editFunction(${event.id}) class="btn btn-primary mastrr mt-3" data-bs-toggle="modal" data-bs-target="#editblog">
                      Edit
                   </button>  
                   <button type="button" onclick=deleteNoticeboardItem("blogs",${event.id}) class="btn btn-primary mastrr mt-3">
                      
                      Delete
                   </button>   
                    </div>
                  </div>

            `;
            return card;
        }

        // Function to render the event cards
        function renderBlogList(data) {
            const eventList = document.getElementById("blogList");
            data.blogs.forEach(event => {
                const card = createBlogCard(event);
                eventList.appendChild(card);
            });
        }
        const api = "<?php echo $api;?>";
     axios.get(api+'/getblogs')
                        .then(response => {
                            console.log(response.data);
                            renderBlogList(response.data)
                        })
                        .catch(error => {
                            // Handle errors here
                            console.error(error);
                        });


</script>
<script>
  function noticeboardCard(event) {
    console.log("++++++++++",event);
            const card = document.createElement("div");
            card.className = "col-lg-4 gir-row moz mt-5";
            card.innerphp = `
                  <div class="note-card mt-5">
              <div class="gree-bg">
                  <p class="not-p">${event.content}  <br> <br>  <span class="dat-span"> ${event.date}</span></p>
                 
              <div ></div>
                  <img class="grey" src="./backend/uploads/${event.image}" alt="">
              </div>
              <button type="button"  onclick=editnoticeboardFunction(${event.id}) class="btn btn-primary mastrr mt-3" data-bs-toggle="modal" data-bs-target="#editnoticeboard">
                Edit
             </button> 
              </div>

            `;
            return card;
        }

        // Function to render the event cards
        function noticeboardList(data) {
            const eventList = document.getElementById("noticeboardList");
            console.log("++++++++++",event);

            data.noticeboardItems.forEach(event => {
                const card = noticeboardCard(event);
                eventList.appendChild(card);
            });
        }
        const api = "<?php echo $api;?>";
     axios.get(api+'/noticeboard')
                        .then(response => {
                            console.log(response.data);
                            noticeboardList(response.data)
                        })
                        .catch(error => {
                            // Handle errors here
                            console.error(error);
                        });

          function editnoticeboardFunction(data){
            localStorage.setItem("noticeboardid", data)
          }


</script>
    <script>
      function createEventCard(event) {
          const card = document.createElement("div");
          card.className = "col-lg-6 gir-row  moz mt-5";
          card.innerphp = `<div class="eve-card text-center ">
                          <img style="width: 66%;" src="./backend/uploads/${event.image}" alt="${event.name}">
                          <div class="wor-1">${event.name}</div>
                          <p class="wor-p">${event.information}</p>
                          <button type="button" onclick=editFunction(${event.id}) class="btn btn-primary mastrr mt-3" data-bs-toggle="modal" data-bs-target="#editevents">
                            Edit
                          </button>
                          <button type="button" onclick=deleteNoticeboardItem("events",${event.id}) class="btn btn-primary mastrr mt-3">
                      
                      Delete
                   </button>  

                      </div>
          `;
          return card;
      }
   

      function renderEventList(data) {
          const eventList = document.getElementById("eventList");
          data.forEach(event => {
              const card = createEventCard(event);
              eventList.appendChild(card);
          });
      }
      const api = "<?php echo $api;?>";
      axios.get(api+'/get-all-events')
                      .then(response => {
                          console.log(response.data);
                          renderEventList(response.data)
                      })
                      .catch(error => {
                          console.error(error);
                      });

        function editFunction(data){
            localStorage.setItem("eventid", data)
          }
    </script>

<script>
  function createWorkCard(event) {
      const card = document.createElement("div");
      card.className = "col-lg-6 gir-row mt-5";
      card.innerphp = `<div class="work-card text-center ">
                      <img  src="./backend/uploads/${event.image}" alt="${event.name}">
                      <div class="wor-1">${event.name}</div>
                      <p class="wor-p">${event.information}</p>
                      <button type="button" onclick=deleteNoticeboardItem("workshop",${event.id}) class="btn btn-primary mastrr mt-3">
                  
                  Delete
               </button>  
                      </div>
            
      `;
      return card;
  }

  function renderWorkList(data) {
      const eventList = document.getElementById("workList");
      data.blogs.forEach(event => {
          const card = createWorkCard(event);
          eventList.appendChild(card);
      });
  }
  const api = "<?php echo $api;?>";
  axios.get(api+'/getworkshop')
                  .then(response => {
                      console.log(response.data);
                      renderWorkList(response.data)
                  })
                  .catch(error => {
                      console.error(error);
                  });

    function editWorkFunction(data){
        localStorage.setItem("workid", data)
      }
</script>
     <script>  
       document.getElementById('noticeboardEditForm').addEventListener('submit', function (event) {
              event.preventDefault();
            const formData = new FormData(event.target);
            console.log("formData++++",formData);

            // Convert the selected image to base64
            const imageFile = formData.get('image');
            if (imageFile) {
                const reader = new FileReader();
                reader.readAsDataURL(imageFile);

                reader.onload = function () {
                    const base64Image = reader.result;
                    formData.set('base64Image', JSON.stringify(base64Image));
                    console.log("formData",formData)
                    const id= localStorage.getItem("noticeboardid")
                    const api = "<?php echo $api;?>";
                    axios.put(`${api}/noticeboard/${id}`,  {content:formData.get('content'),date:formData.get('date'),image:base64Image})
                        .then(response => {
                            console.log("--------------",response.data);
                            window.location.reload();
                        })
                        .catch(error => {
                            // Handle errors here
                            console.error(error);
                        });
                };
            } else {
                alert('Please select an image');
            }
        });
      // Get form data
      function createBlogCardq(event) {
        console.log("++++++++++");

              event.preventDefault();
              console.log("++++++++++");

            const formData = new FormData(event.target);
            console.log("formData",formData);

            // Convert the selected image to base64
            const imageFile = formData.get('image');
            if (imageFile) {
                const reader = new FileReader();
                reader.readAsDataURL(imageFile);

                reader.onload = function () {
                    const base64Image = reader.result;
                    formData.set('base64Image', JSON.stringify(base64Image));
                    console.log("formData",formData)
			const api = "<?php echo $api;?>";
                    axios.post(api+'/noticeboard', {content:formData.get('content'),date:formData.get('date'),image:base64Image})
                        .then(response => {
                            console.log("--------------",response.data);
                            window.location.reload();

                        })
                        .catch(error => {
                            // Handle errors here
                            console.error(error);
                        });
                };
            } else {
                alert('Please select an image');
            }
        };


document.getElementById('eventForm').addEventListener('submit', function (event) {
  alert("test")

    event.preventDefault();
    const formData = new FormData(event.target);

    // Extract image files from the form data
    const imageFiles = formData.getAll('eventImages');
    const imageFile = formData.get('image');
    const filenames = []; // Array to store filenames
    if (imageFiles.length > 0) {
        const formImagesData =[];

        imageFiles.forEach((imageFile, index) => {
          const reader = new FileReader();
         reader.onload = function () {
          const base64Image = reader.result;
                    formData.set('base64Image', JSON.stringify(base64Image));
                    formImagesData.push(base64Image)
            if (index === imageFiles.length - 1) {
              sendFilenamesToBackend(formData ,formImagesData);
            }
    };

    reader.readAsDataURL(imageFile);
});
    } else {
        alert('Please select at least one image');
    }
});

function sendFilenamesToBackend(formData,formImagesData) {
  console.log("formData",formData);
  console.log("formImagesData",formImagesData);
  alert("test1")

            const imageFile = formData.get('image');
            if (imageFile) {
                const reader = new FileReader();
                reader.readAsDataURL(imageFile);

                reader.onload = function () {
                    const base64Image = reader.result;
                    formData.set('base64Image', JSON.stringify(base64Image));
                    console.log("formData",formData)
			const api = "<?php echo $api;?>";
                    axios.post(api+'/upload', {amount:formData.get('amount'),date:formData.get('date'),name:formData.get('name'),information:formData.get('information'),image:base64Image, images:formImagesData})
                        .then(response => {
                            console.log("--------------",response.data);
                            window.location.reload();

                        })
                        .catch(error => {
                            // Handle errors here
                            console.error(error);
                        });
                };
            } else {
                alert('Please select an image');
            }


    // axios.post('https://ologygirls.in:3000/upload', { filenames })
    //     .then(response => {
    //         console.log("--------------", response.data);
    //         window.location.reload();
    //     })
    //     .catch(error => {
    //         // Handle errors here
    //         console.error(error);
    //     });
}

       
        //  document.getElementById('eventForm').addEventListener('submit', function (event) {
        //       event.preventDefault();
        //     const formData = new FormData(event.target);
        //     console.log("formData",formData);

        //     // Convert the selected image to base64
        //     const imageFile = formData.get('image');
        //     const imageFiles = formData.getAll('eventImages');

        //     if (imageFile) {
        //         const reader = new FileReader();
        //         reader.readAsDataURL(imageFile);

        //         reader.onload = function () {
        //             const base64Image = reader.result;
        //             formData.set('base64Image', JSON.stringify(base64Image));
        //             console.log("formData",formData)

        //             axios.post('https://ologygirls.in:3000/upload', {amount:formData.get('amount'),date:formData.get('date'),name:formData.get('name'),information:formData.get('information'),image:base64Image})
        //                 .then(response => {
        //                     console.log("--------------",response.data);
        //                     window.location.reload();

        //                 })
        //                 .catch(error => {
        //                     // Handle errors here
        //                     console.error(error);
        //                 });
        //         };
        //     } else {
        //         alert('Please select an image');
        //     }
        // });
       
       
        document.getElementById('workForm').addEventListener('submit', function (event) {
              event.preventDefault();
            const formData = new FormData(event.target);
            console.log("formData",formData);


            // Convert the selected image to base64
            const imageFile = formData.get('image');
            const imageFiles = formData.getAll('eventImages');
            const filenames = []; // Array to store filenames
            const formImagesData =[];
            if (imageFiles.length > 0) {

                imageFiles.forEach((imageFile, index) => {
                  const reader = new FileReader();
                reader.onload = function () {
                  const base64Image = reader.result;
                            formData.set('base64Image', JSON.stringify(base64Image));
                            formImagesData.push(base64Image)
            };

            reader.readAsDataURL(imageFile);
        });
      }
            if (imageFile) {
                const reader = new FileReader();
                reader.readAsDataURL(imageFile);

                reader.onload = function () {
                    const base64Image = reader.result;
                    formData.set('base64Image', JSON.stringify(base64Image));
                    console.log("formData",formData)
			const api = "<?php echo $api;?>";
                    axios.post(api+'/addworkshop', {name:formData.get('name'),information:formData.get('information'),image:base64Image,images:formImagesData})
                        .then(response => {
                            console.log(response.data);
                            window.location.reload();

                        })
                        .catch(error => {
                            // Handle errors here
                            console.error(error);
                        });
                };
            } else {
                alert('Please select an image');
            }
        });
   
        document.getElementById('blogForm').addEventListener('submit', function (event) {
              event.preventDefault();
            const formData = new FormData(event.target);
            const imageFile = formData.get('image');
            if (imageFile) {
                const reader = new FileReader();
                reader.readAsDataURL(imageFile);

                reader.onload = function () {
                    const base64Image = reader.result;
                    formData.set('base64Image', JSON.stringify(base64Image));
                    console.log("formData",formData)
                    const api = "<?php echo $api;?>";
                    axios.post(api+'/addblog', {blogTitle:formData.get('blogTitle'),blogInformation:formData.get('blogInformation'),authorName:formData.get("authorName"),blogSummary :formData.get('blogSummary'),image:base64Image})
                        .then(response => {
                            console.log(response.data);
                            window.location.reload();

                        })
                        .catch(error => {
                            // Handle errors here
                            console.error(error);
                        });
                };
            } else {
                alert('Please select an image');
            }
        });
   
//         document.getElementById('photoForm').addEventListener('submit', function (event) {
//               event.preventDefault();
//             const formData = new FormData(event.target);
//             console.log("formData",formData);
//             const imageFile = formData.getAll('image');
//             const thumbnailFile = formData.get('thumbnail');
//     const filenames = []; // Array to store filenames
//     if (imageFile.length > 0) {
//         const formImagesData =[];

//         imageFile.forEach((imageFile, index) => {
//           const reader = new FileReader();
//          reader.onload = function () {
//           const base64Image = reader.result;
//                     formData.set('base64Image', JSON.stringify(base64Image));
//                     formImagesData.push(base64Image)
//               };

//               reader.readAsDataURL(imageFile);
//           });
//               }
//             if (thumbnailFile) {
//                 const reader = new FileReader();
// =                reader.readAsDataURL(thumbnailFile);
// =                reader.onload = function () {
//                   const base64Image = reader.result;
//                   formData.set('base64Image', JSON.stringify(base64Image));
//                 reader1.onload = function () {
//                     const base64thumbnail = reader1.result;
//                     formData.set('base64thumbnail', JSON.stringify(base64thumbnail));
//                     axios.post('https://ologygirls.in:3000/addgallery', {name:formData.get('name'),image:filenames,thumbnailFile:base64Image})
//                         .then(response => {
//                             console.log(response.data);
//                             window.location.reload();

//                         })
//                         .catch(error => {
//                             // Handle errors here
//                             console.error(error);
//                         });
//                 };
//             } }else {
//                 alert('Please select an image');
//             }
//         });
      

document.getElementById('photoForm').addEventListener('submit', function (event) {
    event.preventDefault();

    const formData = new FormData(event.target);
    const imageFiles = formData.getAll('image');
    const thumbnailFile = formData.get('thumbnail');

    if (imageFiles.length > 0) {
        const formImagesData = [];

        imageFiles.forEach((imageFile, index) => {
            const reader = new FileReader();

            reader.onload = function () {
                const base64Image = reader.result;
                formImagesData.push(base64Image);
                if (index === imageFiles.length - 1) {
                    processImagesAndSubmit(formData, formImagesData, thumbnailFile);
                }
            };

            reader.readAsDataURL(imageFile);
        });
    } else {
        alert('Please select at least one image');
    }
});

function processImagesAndSubmit(formData, formImagesData, thumbnailFile) {
    if (thumbnailFile) {
        const thumbnailReader = new FileReader();

        thumbnailReader.onload = function () {
            const base64Thumbnail = thumbnailReader.result;
            formData.set('base64thumbnail', JSON.stringify(base64Thumbnail));
            submitForm(formData, formImagesData,base64Thumbnail);
        };

        thumbnailReader.readAsDataURL(thumbnailFile);
    } else {
        submitForm(formData, formImagesData, "");
    }
}

function submitForm(formData, formImagesData,base64Thumbnail) {
    // Adjust your API endpoint as needed
    const api = "<?php echo $api;?>";
    axios.post(api+'/addgallery', {
        name: formData.get('name'),
        image: formImagesData,
        thumbnailFile: base64Thumbnail
    })
    .then(response => {
        console.log(response.data);
        window.location.reload();
    })
    .catch(error => {
        console.error('Error:', error);
        // Handle errors here
    });
}


      
        document.getElementById('eventEditForm').addEventListener('submit', function (event) {
              event.preventDefault();
            const formData = new FormData(event.target);
            console.log("formData",formData);

            // Convert the selected image to base64
            const imageFile = formData.get('image');
            if (imageFile) {
                const reader = new FileReader();
                reader.readAsDataURL(imageFile);

                reader.onload = function () {
                    const base64Image = reader.result;
                    formData.set('base64Image', JSON.stringify(base64Image));
                    console.log("formData",formData)
                    const id= localStorage.getItem("eventid")
                    const api = "<?php echo $api;?>";
                    axios.put(`${api}/update-event/${id}`, {amount:formData.get('amount'),date:formData.get('date'),name:formData.get('name'),information:formData.get('information'),image:base64Image})
                        .then(response => {
                            console.log("--------------",response.data);
                            window.location.reload();

                        })
                        .catch(error => {
                            // Handle errors here
                            console.error(error);
                        });
                };
            } else {
                alert('Please select an image');
            }
        });
        document.getElementById('eventBlogForm').addEventListener('submit', function (event) {
              event.preventDefault();
            const formData = new FormData(event.target);
            // Convert the selected image to base64
            const imageFile = formData.get('image');
            if (imageFile) {
                const reader = new FileReader();
                reader.readAsDataURL(imageFile);

                reader.onload = function () {
                    const base64Image = reader.result;
                    formData.set('base64Image', JSON.stringify(base64Image));
                    console.log("formData",formData)
                    const id= localStorage.getItem("eventid")
                    const api = "<?php echo $api;?>";
                    axios.put(`${api}/update-blog/${id}`, {blogTitle:formData.get('blogTitle'),blogInformation:formData.get('blogInformation'),authorName:formData.get("authorName"),image:base64Image,blogSummary:formData.get("blogSummary")})
                        .then(response => {
                            console.log("--------------",response.data);
                            window.location.reload();

                        })
                        .catch(error => {
                            // Handle errors here
                            console.error(error);
                        });
                };
            } else {
                alert('Please select an image');
            }
        });
        
   
   </script>

    <script src="assets/js/script.js"></script>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</php>
