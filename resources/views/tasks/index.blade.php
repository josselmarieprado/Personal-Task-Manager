@extends('layouts.app')

@section('content')

<!-- Top Metrics Ticker Row -->
<div class="row g-4 mb-4">
    <div class="col-md-4">
        <div class="glass-card p-4 d-flex align-items-center justify-content-between" style="border-left: 4px solid #8b5cf6;">
            <div>
                <span class="text-uppercase fw-bold text-muted" style="font-size: 11px; letter-spacing: 0.05em;">Total Tasks</span>
                <h2 class="fw-extrabold mt-1 mb-0" style="color: #2d1b4e;">{{ $totalTasks ?? 0 }}</h2>
            </div>
            <div class="rounded-4 p-3 d-flex align-items-center justify-content-center shadow-sm" style="background: #f5f3ff; color: #7c3aed; width: 52px; height: 52px;">
                <i class="bi bi-grid-1x2 fs-4"></i>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="glass-card p-4 d-flex align-items-center justify-content-between" style="border-left: 4px solid #f59e0b;">
            <div>
                <span class="text-uppercase fw-bold text-muted" style="font-size: 11px; letter-spacing: 0.05em;">Pending / In Progress</span>
                <h2 class="fw-extrabold text-warning mt-1 mb-0">{{ $pendingTasks ?? 0 }}</h2>
            </div>
            <div class="rounded-4 p-3 d-flex align-items-center justify-content-center shadow-sm" style="background: #fef3c7; color: #d97706; width: 52px; height: 52px;">
                <i class="bi bi-hourglass-split fs-4"></i>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="glass-card p-4 d-flex align-items-center justify-content-between" style="border-left: 4px solid #10b981;">
            <div>
                <span class="text-uppercase fw-bold text-muted" style="font-size: 11px; letter-spacing: 0.05em;">Completed Tasks</span>
                <h2 class="fw-extrabold text-success mt-1 mb-0">{{ $completedTasks ?? 0 }}</h2>
            </div>
            <div class="rounded-4 p-3 d-flex align-items-center justify-content-center shadow-sm" style="background: #ecfdf5; color: #059669; width: 52px; height: 52px;">
                <i class="bi bi-check-circle fs-4"></i>
            </div>
        </div>
    </div>
</div>

<!-- Main Table Card Container -->
<div class="glass-card p-4">
    
    <!-- Table Header Toolbar -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4 pb-3 border-bottom border-light">
        <div>
            <h5 class="fw-bold mb-1" style="color: #2d1b4e;">Your Task Feed</h5>
            <p class="text-muted small mb-0">Here is the complete list of tasks stored in your PRADO database.</p>
        </div>
        <div>
            <a href="{{ url('/tasks/create') }}" class="btn text-white px-4 py-2.5 rounded-pill fw-bold shadow-sm d-flex align-items-center gap-2" style="background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%);">
                <i class="bi bi-plus-lg"></i> Create New Task
            </a>
        </div>
    </div>

    <!-- Data Table / Feed Wrapper -->
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="text-uppercase text-secondary" style="font-size: 11px; letter-spacing: 0.06em; background: #faf5ff;">
                <tr>
                    <th class="py-3 px-3 rounded-start text-dark fw-bold">Task Title & Details</th>
                    <th class="py-3 text-dark fw-bold">Status</th>
                    <th class="py-3 text-dark fw-bold">Due Date</th>
                    <th class="py-3 text-end rounded-end px-3 text-dark fw-bold">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tasks as $task)
                    <tr>
                        <td class="px-3 py-3">
                            <div class="fw-bold mb-1 {{ $task->status == 'Completed' ? 'text-decoration-line-through text-muted' : '' }}" style="color: #2d1b4e;">
                                {{ $task->task_name }}
                            </div>
                            <div class="text-muted small text-truncate" style="max-width: 350px; font-size: 12px;">
                                {{ $task->description ?? 'No extra notes provided.' }}
                            </div>
                        </td>
                        <td>
                            @if($task->status == 'Completed')
                                <span class="badge px-3 py-1.5 rounded-pill fw-bold shadow-sm" style="background: #ecfdf5; color: #059669; font-size: 11px;">
                                    <i class="bi bi-check-circle-fill me-1"></i> COMPLETED
                                </span>
                            @else
                                <span class="badge px-3 py-1.5 rounded-pill fw-bold shadow-sm" style="background: #fef3c7; color: #d97706; font-size: 11px;">
                                    <i class="bi bi-clock-fill me-1"></i> PENDING
                                </span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex align-items-center gap-1.5 text-secondary small fw-medium">
                                <i class="bi bi-calendar-event text-purple" style="color: #8b5cf6;"></i>
                                {{ $task->due_date ? date('M d, Y', strtotime($task->due_date)) : 'No deadline' }}
                            </div>
                        </td>
                        <td class="text-end px-3">
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ url('/tasks/' . $task->id . '/edit') }}" class="btn btn-sm px-3 rounded-pill fw-semibold d-flex align-items-center gap-1 shadow-sm" style="background: #f5f3ff; color: #7c3aed; border: 1px solid #ddd6fe;">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <form action="{{ url('/tasks/' . $task->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this task?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm px-3 rounded-pill fw-semibold d-flex align-items-center gap-1 shadow-sm bg-danger bg-opacity-10 text-danger border-0">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-5">
                            <div class="my-3">
                                <div class="rounded-circle d-inline-flex p-4 shadow-sm" style="background: #f5f3ff;">
                                    <i class="bi bi-journal-check display-4" style="color: #8b5cf6;"></i>
                                </div>
                            </div>
                            <h6 class="fw-bold mb-1" style="color: #2d1b4e;">No tasks found yet</h6>
                            <p class="text-muted small mb-4">Your workspace is clean and ready. Start adding your goals!</p>
                            <a href="{{ url('/tasks/create') }}" class="btn text-white px-4 py-2 rounded-pill fw-semibold shadow-sm" style="background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%);">
                                Add Your First Task
                            </a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

@endsection