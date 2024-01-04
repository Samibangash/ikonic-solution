
<div class="reply-form  mb-3 ms-5">
    <p>{{ $subcategories->comment ?? '' }}</p>

    <form class="form" method="Post"  action="{{ route('product.productFeedbackComment') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="product_feedback_id" value="{{ $data->id }}">
        <input type="hidden" name="parent_id" value="{{ $subcategories->id }}">
        <input class="form-control mb-2" name="comment" rows="1" placeholder="Write a reply..."></input>
        <button type="submit" class="btn btn-primary btn-sm post-reply">Post Reply</button>
    </form>

</div>
<div class="replies ms-5"></div>


@if(count($subcategories['subcategory']) > 0)
    @foreach($subcategories['subcategory'] as $subcategory)
        @include('Product.feedback_comment', ['subcategories'=>$subcategory, 'level' => ($level + 2)])
    @endforeach
@endif
