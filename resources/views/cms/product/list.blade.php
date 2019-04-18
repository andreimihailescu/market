@extends('layouts.CMS.cms')

@section('content')
    {{ json_encode($products) }}
@endsection
