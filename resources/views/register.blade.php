@extends('app')

@section('content')
<div class="row">
	<div class="col-sm-12">
		<h1 class="page-header">活动报名</h1>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<form action="{{ url('register/register') }}" method="POST" class="form-horizontal" role="form">
					{!! csrf_field() !!}
					<div class="form-group">
						<label for="name" class="col-sm-2 control-label">姓名</label>
						<div class="col-sm-10">
						 	<input type="text" name="name" id="name" class="form-control" placeholder="姓名">
						</div>
					</div>
					<div class="form-group">
						<label for="sex" class="col-sm-2 control-label">性别</label>
						<div class="col-sm-10">
						 	<input type="text" name="sex" id="sex" class="form-control" placeholder="性别">
						</div>
					</div>
					<div class="form-group">
						<label for="department" class="col-sm-2 control-label">所在学院</label>
						<div class="col-sm-10">
						 	<input type="text" name="department" id="department" class="form-control" placeholder="所在学院">
						</div>
					</div>
					<div class="form-group">
						<label for="phone" class="col-sm-2 control-label">联系电话</label>
						<div class="col-sm-10">
						 	<input type="text" name="phone" id="phone" class="form-control" placeholder="联系电话">
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="col-sm-2 control-label">联系邮箱</label>
						<div class="col-sm-10">
						 	<input type="text" name="email" id="email" class="form-control" placeholder="联系邮箱">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10 text-center">
							<button type="submit" class="btn btn-primary">报名</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@stop