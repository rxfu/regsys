@extends('app')

@section('content')
<div class="row">
	<div class="col-sm-12">
		<h1 class="page-header">编辑活动</h1>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<form action="{{ url('competition', $competition) }}" method="POST" role="form" class="form-horizontal" enctype="multipart/form-data">
			{!! method_field('put') !!}
			{!! csrf_field() !!}
			<div class="form-group">
				<label for="title" class="col-md-2 control-label">标题</label>
				<div class="col-md-10">
					<input type="text" name="title" id="title" class="form-control" placeholder="标题" value="{{ $competition->title }}">
				</div>
			</div>
			<div class="form-group">
				<label for="description" class="col-md-2 control-label">描述</label>
				<div class="col-md-10">
					<textarea name="description" id="description" class="form-control" rows="10" placeholder="描述">{{ strip_tags($competition->description) }}</textarea>
				</div>
			</div>
			<div class="form-group">
				<label for="is_active" class="col-md-2 control-label">是否启用</label>
				<div class="col-md-10">
					<label class="radio-inline">
						<input type="radio" name="is_active" value="1"{{ $competition->is_active == 1 ? ' checked' : '' }}>&nbsp;启用
					</label>
					<label class="radio-inline">
						<input type="radio" name="is_active" value="0"{{ $competition->is_active == 0 ? ' checked' : '' }}>&nbsp;禁用
					</label>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-offset-2 col-md-10">
					<button type="submit" class="btn btn-success" title="更新">更新</button>
				</div>
			</div>
		</form>
	</div>
</div>
@stop