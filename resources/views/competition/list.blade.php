@extends('app')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<div class="panel-title">
			<div class="text-right">活动
				<a href="{{ url('competition/add') }}" title="添加活动"  role="button" class="btn btn-success">添加活动</a>
			</div>
		</div>
	</div>

	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>#</th>
				<th>活动名称</th>
				<th>活动描述</th>
				<th>是否启用</th>
				<th colspan="5">操作</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($competitions as $competition)
				<tr>
					<td>{{ $competition->id }}</td>
					<td>{{ $competition->title }}</td>
					<td>{{ $competition->description }}</td>
					<td>{{ $competition->is_active ? '是' : '否' }}</td>
					<td>
						<a href="{{ url('register/list', $competition->id) }}" title="报名列表" role="button" class="btn btn-info">报名列表</a>
					</td>
					<td>
						<a href="{{ url('competition/show', $competition->id) }}" title="查看" role="button" class="btn btn-warning">查看</a>
					</td>
					<td>
						<a href="{{ url('competition/edit', $competition->id) }}" title="编辑" role="button" class="btn btn-primary">编辑</a>
					</td>
					<td>
						<form action="{{ url('competition/delete', $competition->id) }}" method="POST" role="form" name="delete" onsubmit="return confirm('此活动相关的报名信息将全部删除不可恢复，你确定要删除这个活动吗？')">
							{!! method_field('delete') !!}
							{!! csrf_field() !!}
							<button type="submit" class="btn btn-danger">删除</button>
						</form>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
@stop