@extends('app')

@section('content')
<div class="row">
	<div class="col-sm-12">
		<h1 class="page-header">查看活动</h1>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default">
			<table class="table table-striped">
				<tr>
					<th class="col-md-4 text-right">活动名称</th>
					<td class="col-md-8 text-left">{{ $competition->title }}</td>
				</tr>
				<tr>
					<th class="col-md-4 text-right">活动描述</th>
					<td class="col-md-8 text-left">{{ $competition->description }}</td>
				</tr>
				<tr>
					<th class="col-md-4 text-right">是否启用</th>
					<td class="col-md-8 text-left">{{ $competition->is_active ? '是' : '否' }}</td>
				</tr>
			</table>
			<div class="col-md-offset-4 col-md-8">
				<a href="{{ url('competition/{competition}/edit', $competition) }}" class="btn btn-primary" role="button" title="编辑">编辑</a>
			</div>
		</div>
	</div>
</div>
@stop