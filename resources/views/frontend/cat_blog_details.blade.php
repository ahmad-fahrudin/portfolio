@extends('frontend.main_master')
@section('title')
    Category BLOG Details | AHMAD FAHRUDIN Website
@endsection

@section('content')
    <!-- breadcrumb-area -->
    <section class="breadcrumb__wrap">
        <div class="container custom-container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8 col-md-10">
                    <div class="breadcrumb__wrap__content">
                        <h2 class="title">{{ $catname->blog_category }}</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Blog</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="breadcrumb__wrap__icon">
            <ul>
                <li><img src="{{ asset('frontend/assets/img/icons/breadcrumb_icon01.png') }}" alt=""></li>
                <li><img src="{{ asset('frontend/assets/img/icons/breadcrumb_icon02.png') }}" alt=""></li>
                <li><img src="{{ asset('frontend/assets/img/icons/breadcrumb_icon03.png') }}" alt=""></li>
                <li><img src="{{ asset('frontend/assets/img/icons/breadcrumb_icon04.png') }}" alt=""></li>
                <li><img src="{{ asset('frontend/assets/img/icons/breadcrumb_icon05.png') }}" alt=""></li>
                <li><img src="{{ asset('frontend/assets/img/icons/breadcrumb_icon06.png') }}" alt=""></li>
            </ul>
        </div>
    </section>
    <!-- breadcrumb-area-end -->


    <!-- blog-area -->
    <section class="standard__blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    @foreach ($blogpost as $item)
                        <div class="standard__blog__post">
                            <div class="standard__blog__thumb">
                                <a href="{{ route('blog.details', $item->id) }}"><img src="{{ asset($item->blog_image) }}"
                                        alt=""></a>
                            </div>
                            <div class="standard__blog__content">
                                <div class="blog__post__avatar">
                                    <div class="thumb"><img src="{{ asset($item->blog_image) }}" alt=""></div>
                                    <span class="post__by">By : <a href="#">Ahmad Fahrudin</a></span>
                                </div>
                                <h2 class="title"><a
                                        href="{{ route('blog.details', $item->id) }}">{{ $item->blog_title }}</a></h2>
                                <p>{!! Str::limit($item->blog_description, 250) !!}</p>
                                <ul class="blog__post__meta">
                                    <li><i
                                            class="fal fa-calendar-alt"></i>{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endforeach
                    <div class="pagination-wrap">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#"><i
                                            class="far fa-long-arrow-left"></i></a></li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">...</a></li>
                                <li class="page-item"><a class="page-link" href="#"><i
                                            class="far fa-long-arrow-right"></i></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-4">
                    <aside class="blog__sidebar">
                        <div class="widget">
                            <form action="#" class="search-form">
                                <input type="text" placeholder="Search">
                                <button type="submit"><i class="fal fa-search"></i></button>
                            </form>
                        </div>
                        <div class="widget">
                            <h4 class="widget-title">Recent Blog</h4>
                            <ul class="rc__post">
                                @foreach ($allblogs as $all)
                                    <li class="rc__post__item">
                                        <div class="rc__post__thumb">
                                            <a href="{{ route('blog.details', $all->id) }}"><img
                                                    src="{{ asset($all->blog_image) }}" alt=""></a>
                                        </div>
                                        <div class="rc__post__content">
                                            <h5 class="title"><a
                                                    href="{{ route('blog.details', $all->id) }}">{{ $all->blog_title }}</a>
                                            </h5>
                                            <span class="post-date"><i
                                                    class="fal fa-calendar-alt"></i>{{ Carbon\Carbon::parse($all->created_at)->diffForHumans() }}</span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="widget">
                            <h4 class="widget-title">Categories</h4>
                            <ul class="sidebar__cat">
                                @foreach ($categories as $id => $blog_category)
                                    <li class="sidebar__cat__item"><a
                                            href="{{ route('category.blog', $id) }}">{{ $blog_category }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!-- blog-area-end -->
    <section class="breadcrumb__wrap">
    </section>
    <!-- contact-area -->
    <section class="homeContact">
        <div class="container">
            <div class="homeContact__wrap">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="section__title">
                            <span class="sub-title">04 - Say hello</span>
                            <h2 class="title">Any questions? Feel free <br> to contact</h2>
                        </div>
                        <div class="homeContact__content">
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                                suffered alteration in some form</p>
                            <h2 class="mail"><a href="mailto:Info@webmail.com">Info@webmail.com</a></h2>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="homeContact__form">
                            <form action="{{ route('store.message') }}" method="POST">
                                @csrf
                                <input type="text" placeholder="Enter name*" name="name">
                                <input type="email" placeholder="Enter mail*" name="email">
                                <input type="number" placeholder="Enter number*" name="number">
                                <textarea name="message" placeholder="Enter Massage*" name="message"></textarea>
                                <button type="submit">Send Message</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-area-end -->
@endsection
