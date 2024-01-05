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



    <!-- collection -->
    <section id="collection" class="py-5">
        <div class="container">
            <div class="title text-center mt-5">
                <h2 class="position-relative d-inline-block">Product</h2>
            </div>

            <div class="row g-0">
                <div class="collection-list mt-4 row gx-0 gy-3">
                    <div class="col-md-12 col-lg-12 col-xl-12 p-2 best flex justify-content-center">
                        <div class="collection-img position-relative">
                            <img src="{{ asset('/storage/images/product/'.$product->image) }}" class="w-100 " style="height:800px">
                            <span
                                class="position-absolute bg-primary text-white d-flex align-items-center justify-content-center">sale</span>
                        </div>
                        <div class="text-center">

                            <p class="text-capitalize my-1">{{ $product->name ?? '' }}</p>

                        </div>
                        <!-- Feedback Icon Button -->

                    </div>

                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h3> Feedback & Comments </h3>
                            </div>
                            <div class="card-body">
                                <div class="feedback-item mb-3">
                                    @foreach($product->product_feedback as $data)
                                        <div class="d-flex mb-2">
                                            <img src="{{ asset('assets/media/avatars/blank.png') }}" alt="User" class="rounded-circle" style="width: 60px; height: 60px; margin-right: 12px;">
                                            <div>
                                                <div class="fw-bold">
                                                    {{ $data->getUser->name ?? '' }}
                                                </div>
                                                <div class="text-muted small">
                                                    {{ optional($data->created_at)->isYesterday() ? 'Yesterday at ' . optional($data->created_at)->format('g:i A') : optional($data->created_at)->format('M j, Y \a\t g:i A') }}
                                                </div>
                                                <p>
                                                    {{ $data->description ?? '' }}
                                                </p>

                                            </div>


                                        </div>

                                        <div class="reply-form   mb-3 ms-5">
                                            <div class="d-flex align-items-center mb-5">
                                                <a href="{{ route('feedback.count',$data->id) }}" class="btn p-0 border-0 text-primary vote-button" >
                                                    <i class="fas fa-vote-yea"></i>
                                                    Vote
                                                </a>
                                                <span id="vote-count">{{ $data->getFeedbackVoteCount() }}</span>


                                            </div>
                                            <form class="form" method="Post"  action="{{ route('product.productFeedbackComment') }}" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="product_feedback_id" value="{{ $data->id }}">
                                                <input type="hidden" name="parent_id" value="0">
                                                <input class="form-control mb-2" name="comment" rows="1" placeholder="Write a reply..."></input>

                                                <button type="submit" class="btn btn-primary btn-sm post-reply">Post Reply</button>
                                            </form>
                                        </div>
                                        @if(count($data->getComment) > 0 )
                                            <div class="row mb-5">
                                                    <div class="col-sm-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                Comments
                                                            </div>
                                                            <div class="card-body">
                                                                @foreach($data->getComment as $comment)

                                                                    <img src="{{ asset('assets/media/avatars/blank.png') }}" alt="User" class="rounded-circle"
                                                                         style="width: 60px; height: 60px; margin-right: 12px;">
                                                                    <div>
                                                                        <div class="fw-bold">
                                                                            {{ $comment->getUser->name ?? '' }}
                                                                        </div>
                                                                        <div class="text-muted small">
                                                                            {{ optional($comment->created_at)->isYesterday() ? 'Yesterday at ' . optional($comment->created_at)->format('g:i A') : optional($comment->created_at)->format('M j, Y \a\t g:i A') }}
                                                                        </div>
                                                                        <p>
                                                                            {{ $comment->comment ?? '' }}
                                                                        </p>


                                                                    </div>
                                                                @endforeach

                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                        @endif
                                    @endforeach

                                </div>
                            </div>

                        </div>
                    </div>
                </div>




            </div>
        </div>
    </section>
    <!-- end of collection -->

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
    <div class="modal fade" id="feedbackModal" tabindex="-1" aria-labelledby="feedbackModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="feedbackModalLabel">Feedback</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="feedbackForm">
                        <div class="mb-3">
                            <label for="feedbackTitle" class="form-label">Title</label>
                            <input type="text" class="form-control" id="feedbackTitle" required>
                        </div>
                        <div class="mb-3">
                            <label for="feedbackCategory" class="form-label">Category</label>
                            <select class="form-select" id="feedbackCategory" required>
                                <option value="">Choose...</option>
                                <option value="bug">Bug Report</option>
                                <option value="feature">Feature Request</option>
                                <option value="improvement">Improvement</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="feedbackDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="feedbackDescription" rows="3" required></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn bg-primary text-white border border-primary"
                        form="feedbackForm">Submit Feedback</button>
                </div>
            </div>
        </div>
    </div>

    <!-- View Feedback Modal -->
    <div class="modal fade" id="viewFeedbackModal" tabindex="-1" aria-labelledby="viewFeedbackModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewFeedbackModalLabel">View Feedback</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="feedbackItems">
                    <div class="feedback-item mb-3">
                        <div class="d-flex mb-2">
                            <img src="https://img.freepik.com/free-photo/young-bearded-man-with-striped-shirt_273609-5677.jpg?w=996&t=st=1704346895~exp=1704347495~hmac=4700270e7e8a972f2bef5bd026e32136ac33489968951d563263f2b44f9003f6" alt="User" class="rounded-circle"
                                style="width: 60px; height: 60px; margin-right: 12px;">
                            <div>
                                <div class="fw-bold">Carles Nilson</div>
                                <div class="text-muted small">Yesterday at 5:06 PM</div>
                                <p>Outlines keep you honest. They stop you from indulging in poorly thought-out
                                    metaphors about driving and keep you focused on the overall structure of your post.
                                </p>
                                <div class="d-flex align-items-center">
                                    <button class="btn p-0 border-0 text-black me-4 reply-button">Reply</button>
                                    <button class="btn p-0 border-0 me-4 like-button">
                                        <i class="far fa-thumbs-up"></i> Like
                                    </button>
                                    <button class="btn p-0 border-0 text-primary vote-button">
                                        <i class="fas fa-vote-yea"></i> Vote
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="reply-form d-none mb-3 ms-5">
                            <input type="text" class="form-control mb-2" id="feedbackTitle" required placeholder="Name">
                            <textarea class="form-control mb-2" rows="1" placeholder="Write a reply..."></textarea>
                            <button class="btn btn-primary btn-sm post-reply">Post Reply</button>
                        </div>
                        <div class="d-flex mb-2">
                            <img src="https://img.freepik.com/free-photo/horizontal-portrait-smiling-happy-young-pleasant-looking-female-wears-denim-shirt-stylish-glasses-with-straight-blonde-hair-expresses-positiveness-poses_176420-13176.jpg?w=996&t=st=1704348318~exp=1704348918~hmac=b1e7c2d3859a1ddc3ee1bd9f260320a2c21748f4e1e1f9a03bc01cf77d6441ae" alt="User" class="rounded-circle"
                                style="width: 60px; height: 60px; margin-right: 12px;">
                            <div>
                                <div class="fw-bold">Carles Nilson</div>
                                <div class="text-muted small">Yesterday at 5:06 PM</div>
                                <p>Outlines keep you honest. They stop you from indulging in poorly thought-out
                                    metaphors about driving and keep you focused on the overall structure of your post.
                                </p>
                                <div class="d-flex align-items-center">
                                    <button class="btn p-0 border-0 text-black me-4 reply-button">Reply</button>
                                    <button class="btn p-0 border-0 me-4 like-button">
                                        <i class="far fa-thumbs-up"></i> Like
                                    </button>
                                    <button class="btn p-0 border-0 text-primary vote-button">
                                        <i class="fas fa-vote-yea"></i> Vote
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="reply-form d-none mb-3 ms-5">
                            <input type="text" class="form-control mb-2" id="feedbackTitle" required placeholder="Name">
                            <textarea class="form-control mb-2" rows="1" placeholder="Write a reply..."></textarea>
                            <button class="btn btn-primary btn-sm post-reply">Post Reply</button>
                        </div>
                        <div class="replies ms-5"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jquery -->
    <script src="{{ asset('assets/js/jquery-3.6.0.js') }}"></script>
    <!-- isotope js -->
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
    <!-- bootstrap js -->
    <script src="{{ asset('assets/bootstrap-5.0.2-dist/js/bootstrap.min.js') }}"></script>
    <!-- custom js -->
    <script src="{{ asset('assets/js/script.js') }}"></script>

    <!-- Custom JS -->
    <script>
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
</body>

</html>
