@extends('layout')
@section('content')
		<div class="row" style='margin-top:100px!important'>
			<div class="col-md-3"></div>
				<div class="col-md-5">
					
					{{ Form::open(array('action' => 'ConfsController@store', 'method'=>'post')) }}

					<h2>New Configuration</h2>
					<p class="help-block">Let's begin with a title:</p>
					{{ Form::label('conf_title', 'Title') }}
						{{ Form::text('conf_title') }}
						
						{{ Form::submit("Submit") }}
					{{ Form::close() }}
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@stop
