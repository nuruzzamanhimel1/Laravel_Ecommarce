<ul class="list-group">
	@php 
		$categorys = App\models\Category::orderBy('id','desc')->where('parent_id',NULL)->with(['parent'])->get();
	@endphp
	@foreach( $categorys as $parent )
		 <li class="list-group-item
			@if(Route::is('categories.show'))
				@if($parent->id == $id)
					active
				@endif
			@endif
		 ">
		 	<a href="{{ route('categories.show',$parent->id) }}" class="btn btn-default"><img src="{{ asset('images/categories/'.$parent->image) }}" alt="{{ $parent->name }}" width="50">
		 			{{ $parent->name }}</a>
		 	 <a class="btn btn-info float-right" data-toggle="collapse" href="{{ '#main'.$parent->id }}" role="button" aria-expanded="false" aria-controls="collapseExample">
			    	<i class="fas fa-arrow-down"></i>
			  </a>
		 </li>

			  <ul class="collapse
				{{-- Model Function call in laravel --}}
				@if(Route::is('categories.show'))
					@if(App\models\Category::showSubParentOnCategories($id,$parent->id))
						show
					@endif
				@endif
				
			   list-group" id="{{ 'main'.$parent->id }}">
			  	@php 
			  		$sub_category = App\models\Category::orderBy('id','desc')->where('parent_id',$parent->id)->with(['parent'])->get();
			  	@endphp
			  	@foreach($sub_category as $sub_parent)
					 <li class="list-group-item border-0
						@if(Route::is('categories.show'))
							@if($sub_parent->id == $id)
								active
							@endif
						@endif
					 ">
						<h3 class="d-inline"><span class="badge badge-warning"> <i class="fas fa-long-arrow-alt-right"></i></span></h3>
						 <a href="{{ route('categories.show',$sub_parent->id) }}">
							<img src="{{ asset('images/categories/'.$sub_parent->image) }}" alt="{{ $sub_parent->name }}" width="50">
		 				{{ $sub_parent->name }}
						</a>
			  		 </li>
			  	@endforeach
			  	
			  </ul>

	@endforeach
				 
				 
</ul>