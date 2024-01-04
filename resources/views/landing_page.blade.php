<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ikonic solution</title>
    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{ asset('assets/bootstrap-5.0.2-dist/css/bootstrap.min.css') }}">
    <!-- custom css -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-2 fixed-top">
        <div class="container">
            <a class="navbar-brand d-flex justify-content-between align-items-center order-lg-0" href="index.html">
                <span class="text-uppercase fw-lighter ms-2">Ikonic solution</span>
            </a>

            <div class="order-lg-2 nav-btns">
                <a href="#" class="btn mt-3 text-uppercase">Register</a>
                <button type="button" class="btn position-relative">
                    <i class="fa fa-search"></i>
                </button>
            </div>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse order-lg-1" id="navMenu">
                <ul class="navbar-nav mx-auto text-center">
                    <li class="nav-item px-2 py-2">
                        <a class="nav-link text-uppercase text-dark" href="#header">home</a>
                    </li>
                    <li class="nav-item px-2 py-2">
                        <a class="nav-link text-uppercase text-dark" href="#collection">collection</a>
                    </li>
                    <li class="nav-item px-2 py-2">
                        <a class="nav-link text-uppercase text-dark" href="#blogs">Login</a>
                    </li>
                    <li class="nav-item px-2 py-2">
                        <a class="nav-link text-uppercase text-dark" href="#about">about us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- end of navbar -->

    <!-- header -->
    <header id="header" class="vh-100 carousel slide" data-bs-ride="carousel" style="padding-top: 104px;">
        <div class="container h-100 d-flex align-items-center carousel-inner">
            <div class="text-center carousel-item active">
                <h2 class="text-capitalize text-white">best collection</h2>
                <h1 class="text-uppercase py-2 fw-bold text-white">new arrivals</h1>
                <a href="#" class="btn mt-3 text-uppercase">shop now</a>
            </div>
            <div class="text-center carousel-item">
                <h2 class="text-capitalize text-white">best price & offer</h2>
                <h1 class="text-uppercase py-2 fw-bold text-white">new season</h1>
                <a href="#" class="btn mt-3 text-uppercase">buy now</a>
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#header" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </header>
    <!-- end of header -->

    <!-- collection -->
    <section id="collection" class="py-5">
        <div class="container">
            <div class="title text-center">
                <h2 class="position-relative d-inline-block">Products</h2>
            </div>

            <div class="row g-0">
                <div class="collection-list mt-4 row gx-0 gy-3">
                    @foreach($product as $data)
                        <div class="col-md-6 col-lg-3 col-xl-3 p-2 best">
                            <div class="collection-img position-relative">
                                <img src="{{ asset('/storage/images/product/'.$data->image) }}" class="w-100">
                                <span
                                    class="position-absolute bg-primary text-white d-flex align-items-center justify-content-center">sale</span>
                            </div>
                            <div class="text-center">
                                <p class="text-capitalize my-1">{{ $data->name ?? '' }}</p>
                                <span class="fw-bold">{{ $data->price ?? '' }}</span>
                            </div>
                            <!-- Feedback Icon Button -->
                            <button type="button" class="border-0 rounded" data-bs-toggle="modal"
                                    data-bs-target="#feedbackModal" data-product-id="{{ $data->id }}">
                                <i class="fas fa-comment-dots text-primary"></i>
                            </button>
                            <a href="{{ route('product.view',$data->id) }}" class="border-0 rounded" >
                                <i class="fas fa-eye text-primary"></i>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- end of collection -->



    <!-- blogs -->
    <section id="offers" class="py-5">
        <div class="container">
            <div
                class="row d-flex align-items-center justify-content-center text-center justify-content-lg-start text-lg-start">
                <div class="offers-content">
                    <span class="text-white">Discount Up To 40%</span>
                    <h2 class="mt-2 mb-4 text-white">Grand Sale Offer!</h2>
                    <a href="#" class="btn">Buy Now</a>
                </div>
            </div>
        </div>
    </section>
    <!-- end of blogs -->

    <!-- blogs -->
    <section id="blogs" class="py-5">
        <div class="container">
            <div class="title text-center py-5">
                <h2 class="position-relative d-inline-block">Our Latest Blog</h2>
            </div>

            <div class="row g-3">
                <div class="card border-0 col-md-6 col-lg-4 bg-transparent my-3">
                    <img src="images/blog_1.jpg" alt="">
                    <div class="card-body px-0">
                        <h4 class="card-title">Lorem ipsum, dolor sit amet consectetur adipisicing</h4>
                        <p class="card-text mt-3 text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Eveniet aspernatur repudiandae nostrum dolorem molestias odio. Sit fugit adipisci omnis quia
                            itaque ratione iusto sapiente reiciendis, numquam officiis aliquid ipsam fuga.</p>
                        <p class="card-text">
                            <small class="text-muted">
                                <span class="fw-bold">Author: </span>John Doe
                            </small>
                        </p>
                        <a href="#" class="btn">Read More</a>
                    </div>
                </div>

                <div class="card border-0 col-md-6 col-lg-4 bg-transparent my-3">
                    <img src="images/blog_2.jpg" alt="">
                    <div class="card-body px-0">
                        <h4 class="card-title">Lorem ipsum, dolor sit amet consectetur adipisicing</h4>
                        <p class="card-text mt-3 text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Eveniet aspernatur repudiandae nostrum dolorem molestias odio. Sit fugit adipisci omnis quia
                            itaque ratione iusto sapiente reiciendis, numquam officiis aliquid ipsam fuga.</p>
                        <p class="card-text">
                            <small class="text-muted">
                                <span class="fw-bold">Author: </span>John Doe
                            </small>
                        </p>
                        <a href="#" class="btn">Read More</a>
                    </div>
                </div>

                <div class="card border-0 col-md-6 col-lg-4 bg-transparent my-3">
                    <img src="images/blog_3.jpg" alt="">
                    <div class="card-body px-0">
                        <h4 class="card-title">Lorem ipsum, dolor sit amet consectetur adipisicing</h4>
                        <p class="card-text mt-3 text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Eveniet aspernatur repudiandae nostrum dolorem molestias odio. Sit fugit adipisci omnis quia
                            itaque ratione iusto sapiente reiciendis, numquam officiis aliquid ipsam fuga.</p>
                        <p class="card-text">
                            <small class="text-muted">
                                <span class="fw-bold">Author: </span>John Doe
                            </small>
                        </p>
                        <a href="#" class="btn">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end of blogs -->

    <!-- about us -->
    <section id="about" class="py-5">
        <div class="container">
            <div class="row gy-lg-5 align-items-center">
                <div class="col-lg-6 order-lg-1 text-center text-lg-start">
                    <div class="title pt-3 pb-5">
                        <h2 class="position-relative d-inline-block ms-4">About Us</h2>
                    </div>
                    <p class="lead text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis, ipsam.
                    </p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem fuga blanditiis, modi
                        exercitationem quae quam eveniet! Minus labore voluptatibus corporis recusandae accusantium
                        velit, nemo, nobis, nulla ullam pariatur totam quos.</p>
                </div>
                <div class="col-lg-6 order-lg-0">
                    <img src="https://img.freepik.com/free-photo/bags-with-gifts-top-copy-space_23-2148288233.jpg?w=996&t=st=1704346319~exp=1704346919~hmac=abb54e6034eb4866955f9ff5a79ab96ce5093a8430a431322396a13f1bfb038d"
                        alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
    <!-- end of about us -->
    <!-- newsletter -->
    <section id="newsletter" class="py-5">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center">
                <div class="title text-center pt-3 pb-5">
                    <h2 class="position-relative d-inline-block ms-4">Newsletter Subscription</h2>
                </div>

                <p class="text-center text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus rem
                    officia accusantium maiores quisquam dolorum?</p>
                <div class="input-group mb-3 mt-3">
                    <input type="text" class="form-control" placeholder="Enter Your Email ...">
                    <button class="btn btn-primary" type="submit">Subscribe</button>
                </div>
            </div>
        </div>
    </section>
    <!-- end of newsletter -->

    <!-- footer -->
    <footer class="bg-dark py-5">
        <div class="container">
            <div class="row text-white g-4">
                <div class="col-md-6 col-lg-3">
                    <a class="text-uppercase text-decoration-none brand text-white" href="index.html">Ikonic
                        solution</a>
                    <p class="text-white text-muted mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Nostrum mollitia quisquam veniam odit cupiditate, ullam aut voluptas velit dolor ipsam?</p>
                </div>

                <div class="col-md-6 col-lg-3">
                    <h5 class="fw-light">Links</h5>
                    <ul class="list-unstyled">
                        <li class="my-3">
                            <a href="#" class="text-white text-decoration-none text-muted">
                                <i class="fas fa-chevron-right me-1"></i> Home
                            </a>
                        </li>
                        <li class="my-3">
                            <a href="#" class="text-white text-decoration-none text-muted">
                                <i class="fas fa-chevron-right me-1"></i> Collection
                            </a>
                        </li>
                        <li class="my-3">
                            <a href="#" class="text-white text-decoration-none text-muted">
                                <i class="fas fa-chevron-right me-1"></i> Blogs
                            </a>
                        </li>
                        <li class="my-3">
                            <a href="#" class="text-white text-decoration-none text-muted">
                                <i class="fas fa-chevron-right me-1"></i> About Us
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-6 col-lg-3">
                    <h5 class="fw-light mb-3">Contact Us</h5>
                    <div class="d-flex justify-content-start align-items-start my-2 text-muted">
                        <span class="me-3">
                            <i class="fas fa-map-marked-alt"></i>
                        </span>
                        <span class="fw-light">
                            Albert Street, New York, AS 756, United States of America
                        </span>
                    </div>
                    <div class="d-flex justify-content-start align-items-start my-2 text-muted">
                        <span class="me-3">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span class="fw-light">
                            attire.support@gmail.com
                        </span>
                    </div>
                    <div class="d-flex justify-content-start align-items-start my-2 text-muted">
                        <span class="me-3">
                            <i class="fas fa-phone-alt"></i>
                        </span>
                        <span class="fw-light">
                            +9786 6776 236
                        </span>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <h5 class="fw-light mb-3">Follow Us</h5>
                    <div>
                        <ul class="list-unstyled d-flex">
                            <li>
                                <a href="#" class="text-white text-decoration-none text-muted fs-4 me-4">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-white text-decoration-none text-muted fs-4 me-4">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-white text-decoration-none text-muted fs-4 me-4">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-white text-decoration-none text-muted fs-4 me-4">
                                    <i class="fab fa-pinterest"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end of footer -->
    <!-- Feedback Modal -->
    <div class="modal fade" id="feedbackModal" tabindex="-1"  aria-labelledby="feedbackModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="feedbackModalLabel">Feedback</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="form" method="Post"  action="{{ route('product.productFeedback') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="feedbackTitle" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" id="feedbackTitle" required>
                        </div>
                        <div class="mb-3">
                            <label for="feedbackCategory" class="form-label">Category</label>
                            <select class="form-select" id="feedbackCategory" name="category_id" required>
                                <option value="">Choose...</option>
                                <option value="1">Bug Report</option>
                                <option value="2">Feature Request</option>
                                <option value="3">Improvement</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="feedbackDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="feedbackDescription" name="description" rows="3" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="productId" name="product_id" value="">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn bg-primary text-white border border-primary" >Submit Feedback</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/jquery-3.6.0.js') }}"></script>
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <!-- isotope js -->
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
    <!-- bootstrap js -->
    <script src="{{ asset('assets/bootstrap-5.0.2-dist/js/bootstrap.min.js') }}"></script>
    <!-- custom js -->
    <script src="{{ asset('assets/js/script.js') }}"></script>

    <!-- Custom JS -->
    <script>
        $('#feedbackModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var productId = button.data('product-id');
            $('#productId').val(productId);
        });
        $(document).ready(function () {
            $(document).on('click', '.reply-button', function () {
                $(this).closest('.feedback-item').find('.reply-form').toggleClass('d-none');
            });

            $(document).on('click', '.post-reply', function () {
                var replyText = $(this).prev('textarea').val().trim();
                if (replyText) {
                    var currentDate = new Date();
                    var replyDiv = $('<div/>', {
                        'class': 'border rounded p-2 my-2'
                    }).text(replyText);

                    $('<div/>', {
                        'class': 'text-muted small',
                        'text': 'User Name - ' + currentDate.toLocaleString()
                    }).prependTo(replyDiv);

                    $(this).closest('.feedback-item').find('.replies').append(replyDiv);

                    $(this).prev('textarea').val('');
                    $(this).closest('.reply-form').addClass('d-none');
                }
            });
        });

    </script>
    <x-flash :type="session()->get('type')" :title="session()->get('title')" :message="session()->get('message')" />
</body>

</html>
