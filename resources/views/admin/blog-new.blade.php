@extends('admin-layouts.master')
@section('content')
      <form  method="POST" action="{{ route('admin.blog-form') }}" enctype="multipart/form-data">
        @csrf
          <input type="text" name="name">
          <input type="text" name="tags">
           <input type="file" name="thumbnail" id="thumbnail">
          <input type="text" name="attachments">
          <textarea name="description" id="" cols="30" rows="10"></textarea>

          <button type="submit" class="btn btn-primary"> Save </button>
      </form>
@endsection

@section('scripts')

<script>
  $(document).ready(function(){
  });
</script>
@endsection 