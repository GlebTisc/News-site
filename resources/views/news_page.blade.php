<x-template>
    <script src="{{asset('/js/comments.js')}}" defer></script>
    <div class="main-container f-column">
        <div class="news-page-container">
            <div class="news">
                <p class="news-heading medium-font bold">{{$news->heading}}</p>
                <div class="content">
                    <div class="second-part">
                        <div class="main">
                            @if(!empty($news->image))
                                <img src="/{{$news->image}}" alt="">
                            @endif
                            <p class="text medium-font">{{$news->content}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="top-border views">
            <img src="{{asset('icons/seo-social-web-network-internet_232_icon-icons.com_61542.png')}}" alt="eye">
            <span class="medium-font">{{$news->views}}</span>
        </div>

        <div class="comments-form">
            @auth
                <span class="news-heading medium-font bold">Leave a comment</span>
                <form action="/add" method="POST">
                    @csrf
                    <input type="hidden" value="{{$news->id}}" name="news_id">
                    <textarea name="comment" id=""></textarea>
                    <x-error name="comment" />
                    <div>
                        <button>Post</button>
                    </div>
                </form>
            @else
                <span class="news-heading medium-font bold">please <a href="/login">authorize</a> to leave a comment</span>
            @endauth
        </div>

        <div class="comments">
            @if($news->comment()->count() > 0)
                <span class="news-heading medium-font bold">Comments</span>
                @foreach($news->comment as $comment)
                    <div class="comment">
                        <div class="heading">
                            <p class="medium-font bold">FROM: <span>{{$comment->user->username}}</span></p>
                        </div>
                        <div class="content">
                            <span class="small-font secondary-text bold">{{$comment->comment}}</span>
                        </div>
                    </div>
                @endforeach
            @else
                <span class="medium-font bold">No comments yet :(</span>
            @endif
        </div>
    </div>

    <hr>
</x-template>
