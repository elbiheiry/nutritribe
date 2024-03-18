@foreach($blogs as $blog)
    <div class="col-lg-4 col-md-6 wow fadeInUp">
        <div class="blog-item">
            <div class="blog-img">
                <div class="date">
                    {{$blog->created_at->format('d M')}}
                </div>
                <img src="{{asset('storage/app/blog/thumbnail/'.$blog->image)}}">
                <ul class="tags">
                    @foreach(explode("," , $blog->tags) as $tag)
                        <li> #{{$tag}}</li>
                    @endforeach
                </ul>
            </div><!--End blog Img-->
            <div class="blog-cont">
                <a href="{{route('site.blog.single' ,['slug' => $blog->slug])}}"
                   class="title"> {{$blog->title}}</a>
                <p>{!! strip_tags(\Str::limit($blog->description ,100)) !!}</p>
                <ul class="info">
                    <li><i class="fa fa-comment"></i> {{$blog->comments->count()}} comment</li>
                    <li><i class="fa fa-share-alt"></i> {{$blog->share}} share</li>
                </ul>
            </div><!--End Blog Cont-->
        </div><!--End Blog Item-->
    </div><!--End col-->
@endforeach