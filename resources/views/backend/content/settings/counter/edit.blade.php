@extends('backend.layouts.app')

@section('title', 'Edit Counter')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0 mb-4" style="border-radius: 12px;">
                <div class="card-header bg-white py-3 border-0 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 font-weight-bold" style="color: #1e293b;">
                        <i class="fas fa-edit text-primary mr-2"></i>Edit Counter #{{ $counter->id }}
                    </h5>
                    <a href="{{ route('admin.setting.counter') }}" class="btn btn-sm btn-secondary" style="border-radius: 6px;">
                        <i class="fas fa-arrow-left mr-1"></i> Back to List
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.setting.counter.update') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $counter->id }}">

                        <div class="form-group mb-3">
                            <label class="font-weight-600 text-dark">Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" value="{{ $counter->title }}" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label class="font-weight-600 text-dark">Count Number / Value <span class="text-danger">*</span></label>
                            <input type="text" name="count_number" value="{{ $counter->count_number }}" class="form-control" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="font-weight-600 text-dark">Section / Placement <span class="text-danger">*</span></label>
                                    <select class="form-control" name="type" required>
                                        <option value="bottom" @if ($counter->type == 'bottom') selected @endif>Bottom Section (Modern Counter Cards)</option>
                                        <option value="top" @if ($counter->type == 'top') selected @endif>Top Section (About Us Who We Are)</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="font-weight-600 text-dark">Card Color (For Bottom Section)</label>
                                    <select class="form-control" name="color">
                                        <option value="orange" @if ($counter->color == 'orange') selected @endif>Orange</option>
                                        <option value="green" @if ($counter->color == 'green') selected @endif>Green</option>
                                        <option value="blue" @if ($counter->color == 'blue') selected @endif>Blue</option>
                                        <option value="purple" @if ($counter->color == 'purple') selected @endif>Purple</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="font-weight-600 text-dark">Display Order</label>
                                    <input type="number" name="order" class="form-control" value="{{ $counter->order }}" min="0">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="font-weight-600 text-dark">Status</label>
                                    <select class="form-control" name="is_active">
                                        <option value="1" @if ($counter->is_active == 1) selected @endif>Active</option>
                                        <option value="0" @if ($counter->is_active == 0) selected @endif>Deactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label class="font-weight-600 text-dark">Icon / Image</label>
                            @if ($counter->image)
                                <div class="mb-3 p-2 border rounded d-inline-block bg-light">
                                    <img src="{{ asset('/setting/banner/' . $counter->image) }}"
                                         alt="{{ $counter->title }}"
                                         style="max-width: 120px; max-height: 120px; object-fit: contain; border-radius: 8px;">
                                    <div class="small text-muted mt-1">Current file: {{ $counter->image }}</div>
                                </div>
                            @endif
                            <input type="file" name="image" class="form-control-file border p-2 rounded" style="width: 100%;">
                            <small class="text-muted">Upload a new image only if you want to replace the current one.</small>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('admin.setting.counter') }}" class="btn btn-light border px-4 font-weight-bold" style="border-radius: 8px;">
                                Cancel
                            </a>
                            <button type="submit" class="btn btn-primary px-4 font-weight-bold" style="border-radius: 8px;">
                                <i class="fas fa-check-circle mr-1"></i> Update Counter
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
