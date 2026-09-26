@extends('layouts.app')

@section('content')
<div class="container py-4" style="max-width: 750px;">
    
    <div class="card border-0 shadow-lg rounded-4 overflow-hidden bg-white">
        <!-- Header na kulay Purple na -->
        <div class="p-4 text-white position-relative" style="background: linear-gradient(135deg, #6f42c1 0%, #4e2a84 100%);">
            <div class="position-absolute top-0 end-0 p-3 opacity-10">
                <i class="bi bi-plus-circle-fill" style="font-size: 6rem;"></i>
            </div>
            <div class="position-relative z-1">
                <div class="d-flex align-items-center gap-2 mb-1">
                    <i class="bi bi-plus-circle fs-4"></i>
                    <h3 class="fw-bold mb-0">Add New Task</h3>
                </div>
                <p class="text-white-50 small mb-0">Fill in the details below to create a new task for your workspace.</p>
            </div>
        </div>

        <div class="card-body p-4 p-md-5">
            <form action="{{ url('/tasks') }}" method="POST">
                @csrf

                <!-- Task Name -->
                <div class="mb-4">
                    <label for="task_name" class="form-label fw-bold text-dark small text-uppercase" style="font-size: 11px; letter-spacing: 0.5px;">Task Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control rounded-pill px-3 py-2.5 shadow-sm border-2 @error('task_name') is-invalid @enderror" id="task_name" name="task_name" value="{{ old('task_name') }}" placeholder="e.g., Study Laravel framework" required>
                    @error('task_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Description -->
                <div class="mb-4">
                    <label for="description" class="form-label fw-bold text-dark small text-uppercase" style="font-size: 11px; letter-spacing: 0.5px;">Description</label>
                    <textarea class="form-control rounded-4 p-3 shadow-sm border-2 @error('description') is-invalid @enderror" id="description" name="description" rows="4" placeholder="Enter task description or notes here...">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Due Date -->
                <div class="mb-4">
                    <label for="due_date" class="form-label fw-bold text-dark small text-uppercase" style="font-size: 11px; letter-spacing: 0.5px;">Due Date</label>
                    <input type="date" class="form-control rounded-pill px-3 py-2.5 shadow-sm border-2 @error('due_date') is-invalid @enderror" id="due_date" name="due_date" value="{{ old('due_date') }}">
                    @error('due_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Buttons -->
                <div class="d-flex justify-content-end gap-2 pt-3 border-top">
                    <a href="{{ url('/tasks') }}" class="btn btn-light px-4 rounded-pill fw-semibold border">Cancel</a>
                    <!-- Button na kulay Purple na rin -->
                    <button type="submit" class="btn text-white px-4 rounded-pill fw-semibold shadow-sm" style="background-color: #6f42c1; transition: opacity 0.2s;">
                        <i class="bi bi-check-lg me-1"></i> Save Task
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection