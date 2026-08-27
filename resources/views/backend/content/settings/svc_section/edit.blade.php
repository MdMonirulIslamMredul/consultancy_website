@extends('backend.layouts.app')

@section('title', 'Edit Service Card')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0 mb-4" style="border-radius: 12px;">
                <div class="card-header bg-white py-3 border-0 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 font-weight-bold" style="color: #1e293b;">
                        <i class="fas fa-edit text-primary mr-2"></i>Edit Service Card #{{ $service->id }}
                    </h5>
                    <a href="{{ route('admin.setting.svc_section') }}" class="btn btn-sm btn-secondary" style="border-radius: 6px;">
                        <i class="fas fa-arrow-left mr-1"></i> Back to List
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.setting.svc_section.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $service->id }}">

                        <div class="form-group mb-3">
                            <label class="font-weight-600 text-dark">Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" value="{{ $service->title }}" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label class="font-weight-600 text-dark">FontAwesome Icon Class <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white" id="iconPreview">
                                        <i class="{{ $service->icon }} text-primary"></i>
                                    </span>
                                </div>
                                <input type="text" name="icon" id="iconInput" class="form-control"
                                       value="{{ $service->icon }}" required>
                            </div>
                            <small class="text-muted">
                                Presets:
                                <a href="javascript:void(0)" onclick="setIcon('fa-regular fa-lightbulb')">Lightbulb</a> |
                                <a href="javascript:void(0)" onclick="setIcon('fa-solid fa-passport')">Passport</a> |
                                <a href="javascript:void(0)" onclick="setIcon('fa-solid fa-file-circle-check')">File Check</a> |
                                <a href="javascript:void(0)" onclick="setIcon('fa-solid fa-graduation-cap')">Graduation Cap</a> |
                                <a href="javascript:void(0)" onclick="setIcon('fa-solid fa-globe')">Globe</a> |
                                <a href="javascript:void(0)" onclick="setIcon('fa-solid fa-handshake')">Handshake</a>
                            </small>
                        </div>

                        <div class="form-group mb-3">
                            <label class="font-weight-600 text-dark">Description <span class="text-danger">*</span></label>
                            <textarea name="description" class="form-control" rows="4" required>{{ $service->description }}</textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="font-weight-600 text-dark">Display Order</label>
                                    <input type="number" name="order" class="form-control" value="{{ $service->order }}" min="0">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="font-weight-600 text-dark">Status</label>
                                    <select class="form-control" name="is_active">
                                        <option value="1" @if ($service->is_active == 1) selected @endif>Active</option>
                                        <option value="0" @if ($service->is_active == 0) selected @endif>Deactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <a href="{{ route('admin.setting.svc_section') }}" class="btn btn-light border px-4 font-weight-bold" style="border-radius: 8px;">
                                Cancel
                            </a>
                            <button type="submit" class="btn btn-primary px-4 font-weight-bold" style="border-radius: 8px;">
                                <i class="fas fa-check-circle mr-1"></i> Update Service Card
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function setIcon(iconClass) {
            document.getElementById('iconInput').value = iconClass;
            document.getElementById('iconPreview').innerHTML = '<i class="' + iconClass + ' text-primary"></i>';
        }

        document.getElementById('iconInput').addEventListener('input', function() {
            var val = this.value.trim();
            if(val) {
                document.getElementById('iconPreview').innerHTML = '<i class="' + val + ' text-primary"></i>';
            }
        });
    </script>
@endsection
