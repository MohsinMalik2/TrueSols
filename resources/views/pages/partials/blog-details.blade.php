
<div class="text-center">
    <img src="{{asset('storage/blog-images/'.$blog->thumbnail)}}" class="img-fluid rounded-custom" alt="{{$blog->title}}">
</div>

{!! $blog->content !!}

<div class="my-3 row">
    <div class="col-md-4">
        <p class="fw-bold">Category: 
            <small class="fw-normal d-inline-block text-primary badge bg-primary-soft">{{$blog->category}}</small>
        </p>
    </div>
    <div class="col-md-8 text-end">
        <p class="fw-bold">Tags: 
            @php
                $str = $blog->tags;
                $arr = explode(",",$str);
            @endphp
            @foreach($arr as $tags)
                <small class="fw-normal d-inline-block text-dark badge bg-warning-soft">{{$tags}}</small>
            @endforeach
        </p>
    </div>
    <div class="col-md-12">
        <p class="fw-bold">Published at: 
            <small class="fw-normal"> {{date("F d, Y", strtotime($blog->created_at))}} </small>
        </p>
    </div>
</div>
@section('scripts')
<script>
     $(document).ready(function(){
        

        $('.blog-details-wrap').find('h1').addClass('fw-bold display-5');
        $('.blog-details-wrap').find('ul').addClass('content-list list-unstyled');
        $('.blog-details-wrap').find("blockquote").addClass('bg-white custom-shadow p-5 mt-5 rounded-custom border-4 border-primary border-top');
        $('.blog-details-wrap').find('img').addClass('img-fluid mt-4 rounded-custom');
    });
</script>
@endsection