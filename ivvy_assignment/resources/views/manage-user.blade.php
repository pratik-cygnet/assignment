@extends('layouts.default')
@section('content')
		        <div class="pull-right">
					<button type="button" class="btn btn-success" onclick="window.location.href='/create-users'">
						  Create User
					</button>
		        </div>
		    </div>
		</div>

		<table class="table table-bordered">
			<thead>
			    <tr>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Date of Birth</th>
				<th>Gender</th>
				<th width="200px">Action</th>
			    </tr>
			</thead>
			<tbody>
			</tbody>
		</table>

		<ul id="pagination" class="pagination-sm"></ul>

	</div>
@stop