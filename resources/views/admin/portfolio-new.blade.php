@extends('admin-layouts.master')
@section('content')
      <form  method="POST" action="{{ route('admin.portfolio-form') }}">
        @csrf
          <input type="text" name="title">
          <textarea name="description" id="" cols="30" rows="10"></textarea>

          <button type="submit" class="btn btn-primary"> Save </button>
      </form>
@endsection

@section('scripts')
@endsection 