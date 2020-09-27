<nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="profile-image">
                  <img class="img-xs rounded-circle" src="{{ asset('assets/images/faces/face8.jpg') }}" alt="profile image">
                  <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                  <p class="profile-name">Allen Moreno</p>
                  <p class="designation">Premium user</p>
                </div>
              </a>
            </li>
            <li class="nav-item nav-category">Main Menu</li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.index') }}">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#manage_product" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Manage Products</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="manage_product">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.products.list') }}">Products List</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.product.create') }}">Product Create</a>
                  </li>
                  
                </ul>
              </div>
            </li>

             <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#products_categories" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Manage Category</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="products_categories">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.categories') }}">Manage Category</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.categories.create') }}">Add Category</a>
                  </li>
                  
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#manage_orders" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Manage Orders</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="manage_orders">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.orders') }}">Manage Orders</a>
                  </li>
                </ul>
              </div>
            </li>

             <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#manage_slider" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Manage Sliders</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="manage_slider">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.slider') }}">Manage Slider</a>
                  </li>
                </ul>
              </div>
            </li>



            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#products_brands" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Manage Brands</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="products_brands">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.brands') }}">Manage Brand</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.brands.create') }}">Add Brand</a>
                  </li>
                  
                </ul>
              </div>
            </li>

             <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#divisions_sidebar" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Manage Divisions</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="divisions_sidebar">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                  
                    <a class="nav-link" href="{{ route('admin.divisions') }}">Divisions List</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.division.create') }}">Add Divisions</a>
                  </li>
                  
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#district_sidebar" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Manage Districts</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="district_sidebar">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                  
                    <a class="nav-link" href="{{ route('admin.district') }}">Divisions List</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.district.create') }}">Add District</a>
                  </li>
                  
                </ul>
              </div>
            </li>


           {{--  <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Basic UI Elements</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pages/ui-features/typography.html">Typography</a>
                  </li>
                </ul>
              </div>
            </li> --}}
            
          
          </ul>
        </nav>