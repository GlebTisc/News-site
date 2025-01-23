<x-template>
    <script src="{{asset("js/carousel.js")}}" defer></script>
    <div class="main-container">
        <div class="half">
            <div class="carousel">
                <div class="carousel-buttons">

                </div>
                @foreach($categories as $category)
                    @foreach($category->news as $news )
                        @if(!empty($news->image))
                            <div class="carousel-item clickable" id="news{{$news->id}}">
                                <img src="{{$news->image}}" alt="">
                                <div class="description">
                                    <div class="content">
                                        <p class="small-font">in: <span>{{$category->name}}</span>
                                            | {{$news->getDate($news->date)}}
                                        </p>
                                        <p class="bold medium-font">{{$news->heading}}</p>
                                        <p class="small-font">{{$news->content}}</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endforeach
            </div>
            <div class="container">
                @for($i = 0; $i < floor(count($categories) / 2); $i++)
                    <div class="news">
                        <div class="news-heading medium-font bold">
                            <span>{{$categories[$i]->name}}</span>
                        </div>
                        <div class="content">
                            <div class="main-part clickable" id="news{{$categories[$i]->news()->first()->id}}">
                                <img src="{{$categories[$i]->news()->first()->image}}" alt="" width="90%">
                                <p class="medium-font bold mt-0 heading">{{$categories[$i]->news()->first()->heading}}</p>
                                <span class="news-date small-font">–{{$categories[$i]->news()->first()->getDate($categories[$i]->news()->first()->date)}}</span>
                                <p class="text small-font">{{$categories[$i]->news()->first()->content}}</p>
                            </div>
                            @if(count($categories[$i]->news) > 1)
                                <div class="second-part">
                                @for($j = 1; $j < count($categories[$i]->news->values()); $j++)
                                        @if($j == 1)
                                            <div class="main clickable" id="news{{$categories[$i]->news->values()[$j]->id}}">
                                                <img src="{{$categories[$i]->news->values()[$j]->image}}" alt="">
                                                <p class="medium-font bold mt-0">{{$categories[$i]->news->values()[$j]->heading}}</p>
                                                <p class="text small-font">{{$categories[$i]->news->values()[$j]->content}}</p>
                                            </div>
                                        @else
                                            <div class="top-border clickable" id="news{{$categories[$i]->news->values()[$j]->id}}">
                                                <p class="medium-font bold mt-0">{{$categories[$i]->news->values()[$j]->heading}}</p>
                                                <p class="text small-font">{{$categories[$i]->news->values()[$j]->content}}</p>
                                            </div>
                                        @endif
                                @endfor
                                </div>
                            @endif
                        </div>
                    </div>
                @endfor
            </div>
        </div>
        <div class="half no-border">
            <div class="news">
                <div>
                    <div class="news-heading bold medium-font arrows">
                        <span>FEATURED NEWS</span>
                        <div class="carousel-arrows">
                            <div>
                                <span class="left-arrow"></span>
                            </div>
                            <div>
                                <span class="right-arrow"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content carousel">
                    @php
                        $counter = 0;
                    @endphp

                    @foreach($sliderNews as $news)
                        @if(empty($news->image))
                            @continue
                        @endif
                        @if($counter % 3 == 0 || $counter == 0)
                            <div class="carousel-page">
                        @endif
                        <div class="carousel-card clickable" id="news{{$news->id}}">
                            <img src="{{$news->image}}" alt="img">
                            <p class="medium-font bold">{{$news->heading}}</p>
                            <span class="news-date small-font">–{{$news->getDate($news->date)}}</span>
                            <p class="text small-font">{{$news->content}}</p>
                        </div>
                        @if(($counter + 1) % 3 == 0 && $counter != 0)
                            </div>
                        @endif
                        @php
                            $counter++;
                        @endphp
                    @endforeach
                    </div>
                </div>
            </div>
            <div class="top-border news-content">
                <div class="right-border">
                    @for($i = floor(count($categories) / 2); $i < count($categories); $i++)
                        <div class="news-heading bold medium-font">
                            <span>{{$categories[$i]->name}}</span>
                        </div>
                        <div class="news">
                            <div class="content clickable" id="news{{$categories[$i]->news->first()->id}}">
                                <img src="{{$categories[$i]->news->first()->image}}" alt="">
                                <p class="medium-font bold">{{$categories[$i]->news->first()->heading}}</p>
                                <span class="news-date small-font">–{{$categories[$i]->news->first()->getDate($categories[$i]->news->first()->date)}}</span>
                                <p class="text small-font">{{$categories[$i]->news->first()->content}}</p>
                            </div>
                        </div>
                        @if(count($categories[$i]->news->values()) > 1)
                            @for($j = 1; $j < count($categories[$i]->news->values()); $j++)
                                <div class="news top-border main clickable" id="news{{$categories[$i]->news->values()[$j]->id}}">
                                    <img src="{{$categories[$i]->news->values()[$j]->image}}" class="@if($i == count($categories) - 1) {{"bigger-img"}} @endif" alt="">
                                    <p class="medium-font bold mt-0">{{$categories[$i]->news->values()[$j]->heading}}</p>
                                    <p class="text small-font">{{$categories[$i]->news->values()[$j]->content}}</p>
                                </div>
                            @endfor
                        @endif
                    @endfor
                </div>
                <div class="videos">
                    <div class="news-heading bold medium-font">
                        <span>VIDEO</span>
                    </div>
                    <div class="news">
                        <div class="content">
                            <p class="medium-font bold mt-0">Make Your Own Video Game With No</p>
                            <span class="news-date small-font">–October 26, 2013</span>
                            <div class="video-container">
                                <button class="play"></button>
                                <video muted loop>
                                    <source src="videos/6981411-hd_1920_1080_25fps.mp4" type="video/mp4">
                                </video>
                            </div>
                        </div>
                    </div>
                    <div class="news top-border">
                        <div class="content">
                            <p class="medium-font bold mt-0">Make Your Own Video Game With No</p>
                            <span class="news-date small-font">–October 26, 2013</span>
                            <div class="video-container">
                                <button class="play"></button>
                                <video muted loop>
                                    <source src="videos/3129671-uhd_3840_2160_30fps.mp4" type="video/mp4">
                                </video>
                            </div>
                        </div>
                    </div>
                    <div class="news top-border main">
                        <div class="content">
                            <p class="medium-font bold mt-0">Make Your Own Video Game With No</p>
                            <span class="news-date small-font">–October 26, 2013</span>
                            <div class="video-container">
                                <button class="play"></button>
                                <video muted loop>
                                    <source src="videos/854923-hd_1920_1080_25fps.mp4" type="video/mp4">
                                </video>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr>
</x-template>
