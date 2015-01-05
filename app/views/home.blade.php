@extends('layout')
@section('content')
		<div class="row" style='margin-top:100px!important'>
			<div class="col-md-3"></div>
				<div class="col-md-1"></div>
				<div class="col-md-5">
					
					{{ Form::open(array('action' => 'ConfsController@store', 'method'=>'post')) }}

					<h2>New configuration:</h2>
					{{ Form::label('title', 'Title') }}
						{{ Form::text('title') }}
						
						{{ Form::submit("Submit") }}
					{{ Form::close() }}
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
