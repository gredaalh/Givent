@if ($errors->any())
    <div class="pt-3"></div>
    <div class="alert alert-danger"></div>
    <ul>
        @foreach ($errors->all() as $item)
        <li>{{ $item }}</li>
        @endforeach
    </ul>
@endif


@if (Session::has('success'))
<div class="pt-3"></div>
<div class="alert alert-succsess">
{{ session::get('success') }}
</div>
@endif