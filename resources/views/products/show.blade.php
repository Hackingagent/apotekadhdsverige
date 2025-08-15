@extends('layouts.app')

@section('content')
<div class="py-5 bg-light">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/products">Products</a></li>
                <li class="breadcrumb-item"><a href="/products/category/{{ $product->category->slug }}">{{ $product->category->name }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
            </ol>
        </nav>

        <div class="row mt-4">
            <div class="col-lg-5">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img src="{{ $product->image }}" alt="{{ $product->name }}" class="img-fluid" style="max-height: 400px;">
                    </div>
                </div>
                <div class="d-flex justify-content-center gap-2">
                    <button class="btn btn-outline-secondary">
                        <i class="far fa-heart"></i> Wishlist
                    </button>
                    <button class="btn btn-outline-secondary">
                        <i class="fas fa-share-alt"></i> Share
                    </button>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="card mb-4">
                    <div class="card-body">
                        @if($product->is_prescription_required)
                        <div class="alert alert-warning mb-4">
                            <i class="fas fa-exclamation-triangle me-2"></i> This product requires a valid prescription from a licensed healthcare provider.
                        </div>
                        @endif

                        <h1 class="h2 fw-bold">{{ $product->name }}</h1>
                        <div class="d-flex align-items-center mb-3">
                            <div class="rating text-warning me-2">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <span class="text-muted">({{ $product->reviews_count }} reviews)</span>
                        </div>

                        <div class="mb-4">
                            <span class="h3 fw-bold text-primary">${{ $product->price }}</span>
                            @if($product->compare_at_price)
                            <span class="text-decoration-line-through text-muted ms-2">${{ $product->compare_at_price }}</span>
                            @endif
                        </div>

                        <div class="mb-4">
                            <div class="d-flex align-items-center mb-2">
                                <span class="fw-bold me-2">Availability:</span>
                                @if($product->stock > 0)
                                <span class="text-success"><i class="fas fa-check-circle me-1"></i> In Stock ({{ $product->stock }} available)</span>
                                @else
                                <span class="text-danger"><i class="fas fa-times-circle me-1"></i> Out of Stock</span>
                                @endif
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <span class="fw-bold me-2">Category:</span>
                                <a href="/products/category/{{ $product->category->slug }}" class="text-primary">{{ $product->category->name }}</a>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="fw-bold me-2">SKU:</span>
                                <span>{{ $product->sku }}</span>
                            </div>
                        </div>

                        <p class="mb-4">{{ $product->description }}</p>

                        <div class="mb-4">
                            <h5 class="fw-bold mb-3">Key Features:</h5>
                            <ul>
                                @foreach(explode("\n", $product->features) as $feature)
                                <li>{{ $feature }}</li>
                                @endforeach
                            </ul>
                        </div>

                        @if($product->stock > 0)
                        <div class="d-flex align-items-center mb-4">
                            <div class="input-group me-3" style="width: 120px;">
                                <button class="btn btn-outline-secondary minus-btn" type="button">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <input type="text" class="form-control text-center quantity-input" value="1" min="1" max="{{ $product->stock }}">
                                <button class="btn btn-outline-secondary plus-btn" type="button">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                            <button class="btn btn-primary flex-grow-1 add-to-cart" data-id="{{ $product->id }}">
                                <i class="fas fa-cart-plus me-2"></i> Add to Cart
                            </button>
                        </div>
                        @endif

                        <div class="d-flex flex-wrap gap-2">
                            <button class="btn btn-outline-secondary">
                                <i class="fas fa-question-circle me-2"></i> Ask a Question
                            </button>
                            <button class="btn btn-outline-secondary">
                                <i class="fas fa-file-prescription me-2"></i> Upload Prescription
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <ul class="nav nav-tabs card-header-tabs" id="productTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="details-tab" data-bs-toggle="tab" data-bs-target="#details" type="button">Details</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="directions-tab" data-bs-toggle="tab" data-bs-target="#directions" type="button">Directions</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="ingredients-tab" data-bs-toggle="tab" data-bs-target="#ingredients" type="button">Ingredients</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button">Reviews ({{ $product->reviews_count }})</button>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="productTabsContent">
                            <div class="tab-pane fade show active" id="details" role="tabpanel">
                                {!! $product->details !!}
                            </div>
                            <div class="tab-pane fade" id="directions" role="tabpanel">
                                {!! $product->directions !!}
                            </div>
                            <div class="tab-pane fade" id="ingredients" role="tabpanel">
                                {!! $product->ingredients !!}
                            </div>
                            <div class="tab-pane fade" id="reviews" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="text-center mb-4">
                                            <div class="display-4 fw-bold text-primary mb-2">{{ $product->average_rating }}</div>
                                            <div class="rating text-warning mb-2">
                                                @for($i = 1; $i <= 5; $i++)
                                                    @if($i <= floor($product->average_rating))
                                                    <i class="fas fa-star"></i>
                                                    @elseif($i - 0.5 <= $product->average_rating)
                                                    <i class="fas fa-star-half-alt"></i>
                                                    @else
                                                    <i class="far fa-star"></i>
                                                    @endif
                                                @endfor
                                            </div>
                                            <p class="text-muted">Based on {{ $product->reviews_count }} reviews</p>
                                        </div>

                                        <div class="mb-4">
                                            <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#reviewModal">
                                                <i class="fas fa-pen me-2"></i> Write a Review
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        @foreach($product->reviews as $review)
                                        <div class="mb-4 pb-4 border-bottom">
                                            <div class="d-flex justify-content-between mb-2">
                                                <h6 class="fw-bold mb-0">{{ $review->user->name }}</h6>
                                                <small class="text-muted">{{ $review->created_at->format('M d, Y') }}</small>
                                            </div>
                                            <div class="rating text-warning small mb-2">
                                                @for($i = 1; $i <= 5; $i++)
                                                    @if($i <= $review->rating)
                                                    <i class="fas fa-star"></i>
                                                    @else
                                                    <i class="far fa-star"></i>
                                                    @endif
                                                @endfor
                                            </div>
                                            <h6 class="fw-bold">{{ $review->title }}</h6>
                                            <p>{{ $review->comment }}</p>
                                        </div>
                                        @endforeach

                                        @if($product->reviews->isEmpty())
                                        <div class="text-center py-4">
                                            <i class="fas fa-comment-slash text-muted fs-1 mb-3"></i>
                                            <p class="text-muted">No reviews yet. Be the first to review this product!</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if($relatedProducts->isNotEmpty())
        <div class="row mt-5">
            <div class="col-12">
                <h3 class="fw-bold mb-4">You May Also Like</h3>
                <div class="row g-4">
                    @foreach($relatedProducts as $product)
                    <div class="col-md-6 col-lg-3">
                        <div class="card product-card h-100">
                            @if($product->is_prescription_required)
                            <div class="badge bg-danger position-absolute top-0 start-0 m-2">Rx Only</div>
                            @endif
                            <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <a href="/products/category/{{ $product->category->slug }}" class="text-muted small">{{ $product->category->name }}</a>
                                    <div class="rating small text-warning">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <span class="text-muted ms-1">({{ $product->reviews_count }})</span>
                                    </div>
                                </div>
                                <h5 class="card-title"><a href="/products/{{ $product->slug }}" class="text-dark">{{ $product->name }}</a></h5>
                                <p class="card-text text-muted small">{{ Str::limit($product->description, 60) }}</p>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <span class="fw-bold text-primary">${{ $product->price }}</span>
                                    @if($product->stock > 0)
                                    <button class="btn btn-sm btn-outline-primary add-to-cart" data-id="{{ $product->id }}">
                                        <i class="fas fa-cart-plus"></i> Add
                                    </button>
                                    @else
                                    <span class="badge bg-secondary">Out of Stock</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

<!-- Review Modal -->
<div class="modal fade" id="reviewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Write a Review</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="reviewForm">
                    <div class="mb-3">
                        <label class="form-label">Rating</label>
                        <div class="rating-input">
                            <input type="radio" id="star5" name="rating" value="5">
                            <label for="star5"><i class="fas fa-star"></i></label>
                            <input type="radio" id="star4" name="rating" value="4">
                            <label for="star4"><i class="fas fa-star"></i></label>
                            <input type="radio" id="star3" name="rating" value="3">
                            <label for="star3"><i class="fas fa-star"></i></label>
                            <input type="radio" id="star2" name="rating" value="2">
                            <label for="star2"><i class="fas fa-star"></i></label>
                            <input type="radio" id="star1" name="rating" value="1">
                            <label for="star1"><i class="fas fa-star"></i></label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="reviewTitle" class="form-label">Title</label>
                        <input type="text" class="form-control" id="reviewTitle" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="reviewComment" class="form-label">Your Review</label>
                        <textarea class="form-control" id="reviewComment" name="comment" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Review</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Quantity controls
    document.querySelectorAll('.minus-btn').forEach(button => {
        button.addEventListener('click', function() {
            const input = this.parentNode.querySelector('.quantity-input');
            let value = parseInt(input.value);
            if (value > 1) {
                input.value = value - 1;
            }
        });
    });

    document.querySelectorAll('.plus-btn').forEach(button => {
        button.addEventListener('click', function() {
            const input = this.parentNode.querySelector('.quantity-input');
            const max = parseInt(input.getAttribute('max'));
            let value = parseInt(input.value);
            if (value < max) {
                input.value = value + 1;
            }
        });
    });

    // Rating input
    document.querySelectorAll('.rating-input input').forEach(radio => {
        radio.addEventListener('change', function() {
            const stars = this.parentNode.parentNode.querySelectorAll('label');
            stars.forEach((star, index) => {
                if (index < parseInt(this.value)) {
                    star.innerHTML = '<i class="fas fa-star"></i>';
                } else {
                    star.innerHTML = '<i class="far fa-star"></i>';
                }
            });
        });
    });
</script>
@endpush