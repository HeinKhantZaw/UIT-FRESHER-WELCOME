@extends('cards')
@section('content')

@if(!empty($king)) 
	<div style="padding-top: 60px;">
		<img src="{{URL::asset('ahnkingqueen/images/kingheader.jpg')}}" style="min-height: 180px;">
	</div><!-- slider -->
@elseif (!empty($queen))
	<div style="padding-top: 60px;">
		<img src="{{URL::asset('ahnkingqueen/images/queenheader.jpg')}}" style="min-height: 180px;">
	</div><!-- slider -->
@endif
	<section class="blog-area section">
		<div class="container">

			<div class="row">

	@if(!empty($king)) 

	<?php 
		if($king[0]->flag==1){
				$flag = 'enable';
			} elseif ($king[0]->flag==0) {
				$flag = 'disable';
			}
			elseif ($king[0]->flag==2) {
				$flag = 'show';
			}
	?>
		
		@if($flag=='enable')
			@foreach($king as $king) 
			
				<div class="col-lg-4 col-md-6">
					<div class="card h-100">
						<div class="single-post post-style-1">

							<div class="blog-image"><img src="uploads/{{$king->pic_path1}}" alt="Blog Image"></div>

							<div class="blog-info">

								<div class="avatar-area">
									<a class="avatar" href="#"><img src="uploads/{{$king->pic_path2}}" alt="Profile Image" style="margin-top: 0px;"></a>
								</div>

								<h4 style="padding-bottom: 10px;"><a href="#"><b>{{$king->id}}</b></a></h4>
								<h4 style="padding-bottom: 10px;"><a href="#"><b>{{$king->name}}</b></a></h4>
								<!-- <p style="text-align: center; padding: 10px 45px 26px 45px;"><i class="fab fa-facebook-square" style="padding-right: 20px; font-size: 17px;"></i>facebook.com/park.shiyoon.5</p> -->
								<form action="{{ URL::to('voteKing') }}" method="post">
										<input type="hidden" name="voted_id" value="{{$king->id}}">	
										<input type="hidden" value="{{ csrf_token() }}" name="_token"> 
										<button class="btn red" type="submit" onclick="return vote('{{$king->name}}')"><i class="ion-heart" style="padding-right: 15px;"></i><span>Vote</span></button>
								</form>									

							</div><!-- blog-info -->
						</div><!-- single-post -->
					</div><!-- card -->
				</div><!-- col-lg-4 col-md-6 -->
			@endforeach
		@elseif($flag=='disable')
			<h3>Votings are disabled.</h3>
		@elseif($flag=='show')
			<table class="table">
		    <thead>
		      <tr>
		        <th>No.</th>
		        <th>Name</th>
		        <th>Votes</th>
		      </tr>
		    </thead>
		    <tbody>
			@foreach($king as $king)
		      <tr>
		        <td>{{$king->id}}</td>
		        <td>{{$king->name}}</td>
		        <td>{{$king->votes}}</td>
		      </tr>
			@endforeach
		    </tbody>
		  </table>
		@endif

	@elseif (!empty($queen))
		<?php 
			if($queen[0]->flag==1){
					$flag = 'enable';
				} elseif ($queen[0]->flag==0) {
					$flag = 'disable';
				}
				elseif ($queen[0]->flag==2) {
					$flag = 'show';
				}
		?>
		@if($flag=='enable')
			@foreach($queen as $queen)
				<div class="col-lg-4 col-md-6">
					<div class="card h-100">
						<div class="single-post post-style-1">

							<div class="blog-image"><img src="uploads/{{$queen->pic_path1}}" alt="Blog Image"></div>

							<div class="blog-info">

								<div class="avatar-area">
									<a class="avatar" href="#"><img src="uploads/{{$queen->pic_path2}}" alt="Profile Image" style="margin-top: 0px;"></a>
								</div>

								<h4 style="padding-bottom: 10px;"><a href="#"><b>{{$queen->id}}</b></a></h4>
								<h4 style="padding-bottom: 10px;"><a href="#"><b>{{$queen->name}}</b></a></h4>
								<!-- <p style="text-align: center; padding: 10px 45px 26px 45px;"><i class="fab fa-facebook-square" style="padding-right: 20px; font-size: 17px;"></i>facebook.com/park.shiyoon.5</p> -->
								<form action="{{ URL::to('voteQueen') }}" method="post">
										<input type="hidden" name="voted_id" value="{{$queen->id}}">	
										<input type="hidden" value="{{ csrf_token() }}" name="_token"> 
										<button class="btn red" type="submit" onclick="return vote('{{$queen->name}}')"><i class="ion-heart" style="padding-right: 15px;"></i><span>Vote</span></button>
								</form>									
							</div><!-- blog-info -->
						</div><!-- single-post -->
					</div><!-- card -->
				</div><!-- col-lg-4 col-md-6 -->
			@endforeach
		@elseif($flag=='disable')
			<h3>Votings are disabled.</h3>
		@elseif($flag=='show')
			<table class="table">
		    <thead>
		      <tr>
		        <th>No.</th>
		        <th>Name</th>
		        <th>Votes</th>
		      </tr>
		    </thead>
		    <tbody>
			@foreach($queen as $queen)
		      <tr>
		        <td>{{$queen->id}}</td>
		        <td>{{$queen->name}}</td>
		        <td>{{$queen->votes}}</td>
		      </tr>
			@endforeach
		    </tbody>
		  </table>
		@endif
	@endif
			</div><!-- row -->

		</div><!-- container -->
	</section><!-- section -->

@endsection

