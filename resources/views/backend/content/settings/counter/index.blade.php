@extends('backend.layouts.app')

@section('title', 'Counter Settings')

@section('content')
    <div class="row">
        <!-- Add New Counter Form -->
        <div class="col-lg-12">
            <div class="card shadow-sm border-0 mb-4" style="border-radius: 12px;">
                <div class="card-header bg-white py-3 border-0 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 font-weight-bold" style="color: #1e293b;">
                        <i class="fas fa-plus-circle text-primary mr-2"></i>Add New Counter
                    </h5>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('admin.setting.counter.store') }}"
                        enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group mb-3">
                                    <label class="font-weight-600 text-dark">Title <span class="text-danger">*</span></label>
                                    <input type="text" name="title" class="form-control" placeholder="e.g. Projects Done, Countries" required>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <div class="form-group mb-3">
                                    <label class="font-weight-600 text-dark">Count Number / Value <span class="text-danger">*</span></label>
                                    <input type="text" name="count_number" class="form-control" placeholder="e.g. 50+, 10,000+, 9+, 26+" required>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <div class="form-group mb-3">
                                    <label class="font-weight-600 text-dark">Section / Placement <span class="text-danger">*</span></label>
                                    <select class="form-control" name="type" required>
                                        <option value="bottom">Bottom Section (Modern Counter Cards)</option>
                                        <option value="top">Top Section (About Us Who We Are)</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <div class="form-group mb-3">
                                    <label class="font-weight-600 text-dark">Card Color (For Bottom Section)</label>
                                    <select class="form-control" name="color">
                                        <option value="orange">Orange</option>
                                        <option value="green">Green</option>
                                        <option value="blue">Blue</option>
                                        <option value="purple">Purple</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <div class="form-group mb-3">
                                    <label class="font-weight-600 text-dark">Display Order</label>
                                    <input type="number" name="order" class="form-control" value="0" min="0">
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <div class="form-group mb-3">
                                    <label class="font-weight-600 text-dark">Status</label>
                                    <select class="form-control" name="is_active">
                                        <option value="1">Active</option>
                                        <option value="0">Deactive</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label class="font-weight-600 text-dark">Icon / Image (Optional for Top, Recommended for Bottom)</label>
                                    <input type="file" name="image" class="form-control-file border p-2 rounded" style="width: 100%;">
                                    <small class="text-muted">Recommended: PNG/JPG icon or illustration (e.g. done.jpg, staf.png, trust.jpg, satisfied.jpg)</small>
                                </div>
                            </div>
                        </div>

                        <div class="text-right mt-2">
                            <button type="submit" class="btn btn-primary px-4 font-weight-bold" style="border-radius: 8px;">
                                <i class="fas fa-save mr-1"></i> Save Counter
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Counters List Table -->
        <div class="col-lg-12">
            <div class="card shadow-sm border-0" style="border-radius: 12px;">
                <div class="card-header bg-white py-3 border-0 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 font-weight-bold" style="color: #1e293b;">
                        <i class="fas fa-list text-primary mr-2"></i>All Counters ({{ count($counters) }})
                    </h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0" style="width:100%">
                            <thead class="thead-light">
                                <tr>
                                    <th class="border-top-0" style="width: 70px;">Image</th>
                                    <th class="border-top-0">Title</th>
                                    <th class="border-top-0">Count Value</th>
                                    <th class="border-top-0">Section</th>
                                    <th class="border-top-0">Color</th>
                                    <th class="border-top-0">Order</th>
                                    <th class="border-top-0">Status</th>
                                    <th class="border-top-0 text-right" style="width: 150px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($counters as $item)
                                    <tr>
                                        <td>
                                            @if ($item->image)
                                                <img src="{{ asset('/setting/banner/' . $item->image) }}"
                                                     alt="{{ $item->title }}"
                                                     style="width: 50px; height: 50px; object-fit: cover; border-radius: 8px; border: 1px solid #e2e8f0;">
                                            @else
                                                <div style="width: 50px; height: 50px; background: #f1f5f9; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #94a3b8;">
                                                    <i class="fas fa-image"></i>
                                                </div>
                                            @endif
                                        </td>
                                        <td class="font-weight-bold text-dark">{{ $item->title }}</td>
                                        <td>
                                            <span class="badge badge-pill badge-primary px-3 py-2" style="font-size: 14px;">
                                                {{ $item->count_number }}
                                            </span>
                                        </td>
                                        <td>
                                            @if ($item->type == 'top')
                                                <span class="badge badge-info px-2 py-1">Top (About Us)</span>
                                            @else
                                                <span class="badge badge-warning px-2 py-1 text-dark">Bottom (Cards)</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->color)
                                                <span class="badge badge-secondary text-capitalize px-2 py-1">{{ $item->color }}</span>
                                            @else
                                                <span class="text-muted">—</span>
                                            @endif
                                        </td>
                                        <td>{{ $item->order }}</td>
                                        <td>
                                            @if ($item->is_active == 1)
                                                <span class="badge badge-success px-2 py-1">Active</span>
                                            @else
                                                <span class="badge badge-danger px-2 py-1">Deactive</span>
                                            @endif
                                        </td>
                                        <td class="text-right">
                                            <a href="{{ route('admin.setting.counter.edit', $item->id) }}"
                                               class="btn btn-sm btn-outline-primary mr-1"
                                               style="border-radius: 6px;" title="Edit">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <a href="{{ route('admin.setting.counter.destroy', $item->id) }}"
                                               class="btn btn-sm btn-outline-danger"
                                               onclick="return confirm('Are you sure you want to delete this counter?');"
                                               style="border-radius: 6px;" title="Delete">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center py-4 text-muted">No counters found. Add one above.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
