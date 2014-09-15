<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>{{trans('pages.password_reset')}}</h2>

		<p>{{trans('pages.to_reset_your_password')}}, <a href="{{ URL::to('users') }}/{{ $userId }}/reset/{{ urlencode($resetCode) }}">{{trans('pages.click_here')}}.</a>  {{trans('pages.click_here')}}. {{trans('pages.if_you_did_not_request_a_password_reset')}}</p>
		<p>{{trans('pages.or_point_your_browser_to_this_address')}}: <br /> {{ URL::to('users') }}/{{ $userId }}/reset/{{ urlencode($resetCode) }}</p>
		<p>{{trans('pages.thank_you')}}, <br />
			 {{trans('pages.the_admin_team')}}</p>
	</body>
</html>
