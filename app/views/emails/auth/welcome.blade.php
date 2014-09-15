<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>{{trans('pages.welcome')}}</h2>

		<p><b>{{trans('pages.user')}}:</b> {{{ $email }}}</p>
		<p>{{trans('pages.to_activate_your_account')}}, <a href="{{ URL::to('users') }}/{{ $userId }}/activate/{{ urlencode($activationCode) }}">{{trans('pages.click_here')}}.</a></p>
		<p>{{trans('pages.or_point_your_browser_to_this_address')}}: <br /> {{ URL::to('users') }}/{{ $userId }}/activate/{{ urlencode($activationCode) }}</p>
		<p>{{trans('pages.thank_you')}}, <br />
			 {{trans('pages.the_admin_team')}}</p>
	</body>
</html>
