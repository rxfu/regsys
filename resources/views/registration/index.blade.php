@extends('app')

@section('content')
<div class="row">
	<div class="col-sm-12">
		<h1 class="page-header">报名列表</h1>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="panel-title">
					<div class="text-right">
						<a href="{{ url('registration/export') }}" title="导出列表"  role="button" class="btn btn-success">导出列表</a>
					</div>
				</div>
			</div>
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>#</th>
						<th>姓名</th>
						<th>性别</th>
						<th>所在学院</th>
						<th>联系电话</th>
						<th>联系邮箱</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($registrations as $registration)
						<tr>
							<td>{{ $registration->id }}</td>
							<td>{{ $registration->name }}</td>
							<td>{{ $registration->sex }}</td>
							<td>{{ $registration->department }}</td>
							<td>{{ $registration->phone }}</td>
							<td>{{ $registration->email }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@stop