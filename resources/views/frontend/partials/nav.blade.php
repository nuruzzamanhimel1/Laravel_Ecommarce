	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  
	  	<div class="container">
	  		<a class="navbar-brand" href="{{ route('index') }}">Laravel Ecommarce</a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>

			  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			    <ul class="navbar-nav mr-auto">
			      <li class="nav-item active">
			        <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="{{ route('products') }}">All Products</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="{{ route('contuct') }}">Contuct</a>
			      </li>

			       <li class="nav-item">
			        <a class="nav-link" href="{{ route('admin.index') }}">Admin</a>
			      </li>
					<li>
						<form class="form-inline my-2 my-lg-0" action="{{ route('search') }}" method="GET">
			      <div class="input-group mb-3">
					  <input type="text" class="form-control" name="search_text" placeholder="Search the product(e.g. egges, milk)">
					  <div class="input-group-append">
					    <button class="btn btn-outline-secondary" type="submit" name="submit" id="button-addon2"><i class="fas fa-search"></i></button>
					  </div>
					</div>
			    </form>
					</li>
			    
			    </ul>

			     <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                    	<li class="nav-item">
                            <a class="nav-link" href="{{ route('carts') }}"> 
                            	<button class="btn btn-danger">
                            		Card 
                            		<span class="badge badge-warning">
                            			{{ App\models\Card::totalItems() }}
                            		</span>
                            	</button>
                            	
                            </a>
                        </li>
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    @if(Auth::check())
                                    <img src="{{ App\Helpers\ImageHelper::getUserImage(Auth::user()->id ) }}" alt="Auth Image" style="width:50px;">
                                    	 {{ Auth::user()->username }} 
                                    @endif
                                   <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                	 <a class="dropdown-item" href="{{ route('user.dashboard') }}">{{ __(' My Dashboard') }}</a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
			    

			  </div>
	  	</div>

	</nav>