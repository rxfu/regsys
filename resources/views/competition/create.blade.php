@extends('app')

@section('content')
<div class="row">
	<div class="col-sm-12">
		<h1 class="page-header">创建活动</h1>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<form action="{{ url('competition/store') }}" method="POST" role="form" class="form-horizontal" enctype="multipart/form-data">
			{!! csrf_field() !!}
			<div class="form-group">
				<label for="title" class="col-md-2 control-label">标题</label>
				<div class="col-md-10">
					<input type="text" name="title" id="title" class="form-control" placeholder="标题">
				</div>
			</div>
			<div class="form-group">
				<label for="description" class="col-md-2 control-label">描述</label>
				<div class="col-md-10">
					<textarea name="description" id="description" class="form-control" rows="10" placeholder="描述"></textarea>
				</div>
			</div>
			<div class="form-group">
				<label for="is_active" class="col-md-2 control-label">是否启用</label>
				<div class="col-md-10">
					<label class="radio-inline">
						<input type="radio" name="is_active" value="1" checked>&nbsp;启用
					</label>
					<label class="radio-inline">
						<input type="radio" name="is_active" value="0">&nbsp;禁用
					</label>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-offset-2 col-md-10">
					<button type="submit" class="btn btn-success" title="添加">添加</button>
				</div>
			</div>
		</form>
	</div>
</div>
@stop