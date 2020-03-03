
@include('partials.error')

<h1>index verified</h1>

{{ Form::open(['route' => 'verified.store']) }}

<label>Name</label>
{{ Form::text('name', old('name', $user->name ?? ''), ['class' => '']) }}
<label>email</label>
{{ Form::email('email', old('email', $user->email ?? ''), ['class' => '']) }}
<label>Password</label>
<input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
<label>Confirm Password</label>
<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
<label>Language</label>
{{ Form::select('lang', Config::get('languages'), old('lang', $user->lang ?? ''), ['class' => '']) }}
{{ Form::submit('Save', ['name' => 'submit'], ['class' => '']) }}
{{ Form::close() }}

{{--'name', 'email', 'password', 'lang',--}}
