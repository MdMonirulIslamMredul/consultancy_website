@extends('backend.layouts.app')

@section('title', ' Edit About Management')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <form class="form-horizontal" action="{{ route('admin.about.settings.update') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <input type="hidden" name="about_id" value="{{ $about->id }}">

            {{-- Main About Content Card --}}
            <div class="card shadow-sm border-0 mb-4" style="border-radius: 12px;">
                <div class="card-header bg-white py-3 border-0 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 font-weight-bold" style="color: #1e293b;">
                        <i class="fas fa-edit text-primary mr-2"></i>Edit About Page Information
                    </h5>
                    <a href="{{ route('admin.about.settings') }}" class="btn btn-sm btn-outline-secondary" style="border-radius: 6px;">
                        <i class="fas fa-arrow-left mr-1"></i> Back to About
                    </a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label class="font-weight-600 text-dark">Banner Image</label>
                                @if($about->banner_img)
                                    <div class="mb-2">
                                        <img id="currentBanner" src="{{ asset('/setting/about/' . $about->banner_img) }}" alt="Banner" style="max-height: 100px; border-radius: 8px; border: 1px solid #e2e8f0;">
                                    </div>
                                @endif
                                <input type="file" name="banner_image" class="form-control-file border p-2 rounded" style="width: 100%;" id="bannerImageInput">
                                <img id="bannerImagePreview" src="#" alt="Banner Preview" style="max-height: 120px; display:none; margin-top:10px; border-radius: 8px; border: 1px solid #cbd5e1;">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label class="font-weight-600 text-dark">About Main Image</label>
                                @if($about->about_image)
                                    <div class="mb-2">
                                        <img id="currentAboutImg" src="{{ asset('/setting/about/' . $about->about_image) }}" alt="About Image" style="max-height: 100px; border-radius: 8px; border: 1px solid #e2e8f0;">
                                    </div>
                                @endif
                                <input type="file" name="about_image" class="form-control-file border p-2 rounded" style="width: 100%;" id="aboutImageInput">
                                <img id="aboutImagePreview" src="#" alt="About Preview" style="max-height: 120px; display:none; margin-top:10px; border-radius: 8px; border: 1px solid #cbd5e1;">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group mb-3">
                                <label class="font-weight-600 text-dark">Header Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" class="form-control" value="{{ $about->title }}" placeholder="e.g. ESTABLISHING YOUR PATHWAY TO SUCCESS" required>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group mb-3">
                                <label class="font-weight-600 text-dark">Short Description / Subtitle</label>
                                <textarea class="form-control" rows="3" name="short_description" placeholder="Enter short summary description...">{{ $about->short_description ?? null }}</textarea>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group mb-3">
                                <label class="font-weight-600 text-dark">Full Details (Why Choose Us)</label>
                                <textarea class="editor form-control" rows="6" name="description">{!! $about->description ?? null !!}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Strengths Section Card --}}
            <div class="card shadow-sm border-0 mb-4" style="border-radius: 12px;">
                <div class="card-header bg-white py-3 border-0 d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="mb-0 font-weight-bold" style="color: #1e293b;">
                            <i class="fas fa-shield-alt text-danger mr-2"></i>Our Strengths (What Sets Us Apart)
                        </h5>
                        <small class="text-muted">Manage the 4 key strengths displayed on the About Us page</small>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        {{-- Strength 1 --}}
                        @php
                            $s1Img = $about->strength_one_icon ? (file_exists(public_path('setting/about/' . $about->strength_one_icon)) ? asset('setting/about/' . $about->strength_one_icon) : asset('setting/brand/' . $about->strength_one_icon)) : asset('setting/brand/hybrid.png');
                        @endphp
                        <div class="col-lg-6 col-md-6 mb-4">
                            <div class="p-3 border rounded" style="background: #f8fafc; border-radius: 10px;">
                                <div class="d-flex align-items-center mb-3">
                                    <span class="badge badge-primary mr-2" style="font-size: 13px;">Strength 1</span>
                                    <h6 class="mb-0 font-weight-bold text-dark">Card #1</h6>
                                </div>

                                <div class="form-group mb-2">
                                    <label class="font-weight-600 text-dark">Icon / Image</label>
                                    <div class="d-flex align-items-center mb-2">
                                        <img id="s1Preview" src="{{ $s1Img }}" alt="Strength 1 Icon" style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover; border: 2px solid #e2e8f0; margin-right: 12px;">
                                        <input type="file" name="strength_one_icon" class="form-control-file border p-1 rounded" style="width: 100%;" onchange="previewStrengthImage(this, 's1Preview')">
                                    </div>
                                </div>

                                <div class="form-group mb-2">
                                    <label class="font-weight-600 text-dark">Title</label>
                                    <input type="text" name="strength_one_title" class="form-control" value="{{ $about->strength_one_title ?? 'Reliable' }}" placeholder="e.g. Reliable">
                                </div>

                                <div class="form-group mb-0">
                                    <label class="font-weight-600 text-dark">Details</label>
                                    <textarea name="strength_one_details" class="form-control" rows="3" placeholder="Enter strength description...">{{ $about->strength_one_details ?? 'Our service is fully customer-centric and focused on bringing the best results and a smile of satisfaction on your face.' }}</textarea>
                                </div>
                            </div>
                        </div>

                        {{-- Strength 2 --}}
                        @php
                            $s2Img = $about->strength_two_icon ? (file_exists(public_path('setting/about/' . $about->strength_two_icon)) ? asset('setting/about/' . $about->strength_two_icon) : asset('setting/brand/' . $about->strength_two_icon)) : asset('setting/brand/best_price.jpg');
                        @endphp
                        <div class="col-lg-6 col-md-6 mb-4">
                            <div class="p-3 border rounded" style="background: #f8fafc; border-radius: 10px;">
                                <div class="d-flex align-items-center mb-3">
                                    <span class="badge badge-primary mr-2" style="font-size: 13px;">Strength 2</span>
                                    <h6 class="mb-0 font-weight-bold text-dark">Card #2</h6>
                                </div>

                                <div class="form-group mb-2">
                                    <label class="font-weight-600 text-dark">Icon / Image</label>
                                    <div class="d-flex align-items-center mb-2">
                                        <img id="s2Preview" src="{{ $s2Img }}" alt="Strength 2 Icon" style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover; border: 2px solid #e2e8f0; margin-right: 12px;">
                                        <input type="file" name="strength_two_icon" class="form-control-file border p-1 rounded" style="width: 100%;" onchange="previewStrengthImage(this, 's2Preview')">
                                    </div>
                                </div>

                                <div class="form-group mb-2">
                                    <label class="font-weight-600 text-dark">Title</label>
                                    <input type="text" name="strength_two_title" class="form-control" value="{{ $about->strength_two_title ?? 'Affordable Price' }}" placeholder="e.g. Affordable Price">
                                </div>

                                <div class="form-group mb-0">
                                    <label class="font-weight-600 text-dark">Details</label>
                                    <textarea name="strength_two_details" class="form-control" rows="3" placeholder="Enter strength description...">{{ $about->strength_two_details ?? 'Affordability and quality are always on top of our agenda, with customer convenience given top priority.' }}</textarea>
                                </div>
                            </div>
                        </div>

                        {{-- Strength 3 --}}
                        @php
                            $s3Img = $about->strength_three_icon ? (file_exists(public_path('setting/about/' . $about->strength_three_icon)) ? asset('setting/about/' . $about->strength_three_icon) : asset('setting/brand/' . $about->strength_three_icon)) : asset('setting/brand/quality.png');
                        @endphp
                        <div class="col-lg-6 col-md-6 mb-4">
                            <div class="p-3 border rounded" style="background: #f8fafc; border-radius: 10px;">
                                <div class="d-flex align-items-center mb-3">
                                    <span class="badge badge-primary mr-2" style="font-size: 13px;">Strength 3</span>
                                    <h6 class="mb-0 font-weight-bold text-dark">Card #3</h6>
                                </div>

                                <div class="form-group mb-2">
                                    <label class="font-weight-600 text-dark">Icon / Image</label>
                                    <div class="d-flex align-items-center mb-2">
                                        <img id="s3Preview" src="{{ $s3Img }}" alt="Strength 3 Icon" style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover; border: 2px solid #e2e8f0; margin-right: 12px;">
                                        <input type="file" name="strength_three_icon" class="form-control-file border p-1 rounded" style="width: 100%;" onchange="previewStrengthImage(this, 's3Preview')">
                                    </div>
                                </div>

                                <div class="form-group mb-2">
                                    <label class="font-weight-600 text-dark">Title</label>
                                    <input type="text" name="strength_three_title" class="form-control" value="{{ $about->strength_three_title ?? 'High Quality Service' }}" placeholder="e.g. High Quality Service">
                                </div>

                                <div class="form-group mb-0">
                                    <label class="font-weight-600 text-dark">Details</label>
                                    <textarea name="strength_three_details" class="form-control" rows="3" placeholder="Enter strength description...">{{ $about->strength_three_details ?? 'Premium quality, industry-leading guidance to help students achieve their maximum potential.' }}</textarea>
                                </div>
                            </div>
                        </div>

                        {{-- Strength 4 --}}
                        @php
                            $s4Img = $about->strength_four_icon ? (file_exists(public_path('setting/about/' . $about->strength_four_icon)) ? asset('setting/about/' . $about->strength_four_icon) : asset('setting/brand/' . $about->strength_four_icon)) : asset('setting/brand/eco.jpg');
                        @endphp
                        <div class="col-lg-6 col-md-6 mb-4">
                            <div class="p-3 border rounded" style="background: #f8fafc; border-radius: 10px;">
                                <div class="d-flex align-items-center mb-3">
                                    <span class="badge badge-primary mr-2" style="font-size: 13px;">Strength 4</span>
                                    <h6 class="mb-0 font-weight-bold text-dark">Card #4</h6>
                                </div>

                                <div class="form-group mb-2">
                                    <label class="font-weight-600 text-dark">Icon / Image</label>
                                    <div class="d-flex align-items-center mb-2">
                                        <img id="s4Preview" src="{{ $s4Img }}" alt="Strength 4 Icon" style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover; border: 2px solid #e2e8f0; margin-right: 12px;">
                                        <input type="file" name="strength_four_icon" class="form-control-file border p-1 rounded" style="width: 100%;" onchange="previewStrengthImage(this, 's4Preview')">
                                    </div>
                                </div>

                                <div class="form-group mb-2">
                                    <label class="font-weight-600 text-dark">Title</label>
                                    <input type="text" name="strength_four_title" class="form-control" value="{{ $about->strength_four_title ?? 'Green Energy' }}" placeholder="e.g. Green Energy">
                                </div>

                                <div class="form-group mb-0">
                                    <label class="font-weight-600 text-dark">Details</label>
                                    <textarea name="strength_four_details" class="form-control" rows="3" placeholder="Enter strength description...">{{ $about->strength_four_details ?? 'We are committed to promoting sustainable and eco-friendly solutions for a better future.' }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-white text-right py-3">
                    <button type="submit" class="btn btn-info px-4 font-weight-bold" style="border-radius: 8px;">
                        <i class="fas fa-save mr-1"></i> Update About
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@push('after-styles')
{{ style(asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css')) }}
@endpush

@push('after-scripts')
{!! script(asset('assets/plugins/tinymce/jquery.tinymce.min.js')) !!}
{!! script(asset('assets/plugins/tinymce/tinymce.min.js')) !!}
{!! script(asset('assets/plugins/tinymce/editor-helper.js')) !!}
{!! script(asset('assets/plugins/moment/moment.js')) !!}
{!! script(asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')) !!}

<script>
    $(document).ready(function() {
        simple_editor('.editor', 350);
    });

    function previewImage(input, previewId) {
        const file = input.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.getElementById(previewId);
                preview.src = e.target.result;
                preview.style.display = "block";
            };
            reader.readAsDataURL(file);
        }
    }

    function previewStrengthImage(input, imgId) {
        const file = input.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.getElementById(imgId);
                img.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }

    document.getElementById('bannerImageInput')?.addEventListener('change', function() {
        previewImage(this, 'bannerImagePreview');
    });

    document.getElementById('aboutImageInput')?.addEventListener('change', function() {
        previewImage(this, 'aboutImagePreview');
    });
</script>
@endpush

@endsection
