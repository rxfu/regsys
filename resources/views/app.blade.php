<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>报名系统 - {{ $title or '广西师范大学' }}</title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
		<!-- Optional theme -->
		<link rel="stylesheet" href="{{ asset('css/bootstrap-theme.min.css') }}">
		<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	</head>
	<body>
		<header id="header" class="page-header">
			<h1 class="text-center">{{ $title or '广西师范大学' }}</h1>
		</header><!-- /header -->

		<main class="container">
            @if (session('status'))
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ session('status') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>注意：</strong>出错啦！
                    <<ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
			<div class="text-right">
            @if (Auth::check())
				欢迎你，{{ Auth::user()->username }}！
				<ul class="nav nav-pills">
					<li role="presentation">
						<a href="{{ url('register/list') }}" title="活动管理">活动管理</a>
					</li>
					<li role="presentation">
						<a href="{{ url('auth/change') }}" title="修改密码">修改密码</a>
					</li>
					<li role="presentation">
						<a href="{{ url('auth/logout') }}" title="登出">登出</a>
					</li>
				</ul>
			@else
				<a href="{{ url('auth/login') }}" title="管理">管理</a>
            @endif
			</div>
			@yield('content')
		</main>

		<footer id="footer" class="page-footer">
			<address>
				&copy 2016{{ '2016' == date('Y') ? '' : '-' . date('Y') }} 广西师范大学教务处.版权所有.
			</address>
		</footer>

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="{{ asset('js/jquery.min.js') }}"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<!-- Latest compiled and minified JavaScript -->
		<script src="{{ asset('js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('js/app.js') }}"></script>
	</body>
</html>