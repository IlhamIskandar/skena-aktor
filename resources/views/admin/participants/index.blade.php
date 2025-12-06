@extends('layouts.admin')
@section('title', 'Participants — Skena Aktor')

@section('content')

<div class="container-fluid p-0">

    <!-- Banner Header -->
    <div class="card border-0 rounded-4 mb-4 bg-warning shadow-sm">
        <div class="card-body p-4">
            <div class="row align-items-center">

                <div class="col-lg-6 mb-3 mb-lg-0">
                    <h2 class="fw-bold mb-1">Manajemen Peserta</h2>
                    <p class="mb-0 opacity-75">Lihat, Atur dan Export Data Peserta</p>
                </div>

                <div class="col-lg-6">
                    <div class="row g-2">
                        <div class="col-md-6 col-12">
                            <select class="form-select bg-white border-0">
                                <option>Status</option>
                                <option value="user">User</option>
                                <option value="member">Member</option>
                            </select>
                        </div>
                        <div class="col-md-3 col-6">
                            <button class="btn btn-light w-100 fw-medium border-0">Excel</button>
                        </div>
                        <div class="col-md-3 col-6">
                            <button class="btn btn-light w-100 fw-medium border-0">PDF</button>
                        </div>

                        <div class="col-12">
                            <input type="text" class="form-control border-0" placeholder="Search">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Table Section -->
    <div class="card border-1 rounded-4 shadow-sm">
        <div class="card-body p-4">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="border rounded-pill px-3 py-2 fw-semibold">
                    Total Peserta: {{ $participants->total() }}
                </div>

                <a href="{{ route('admin.participants.create') }}"
                   class="btn btn-warning rounded-pill px-4 fw-semibold text-dark">
                    <i class="bi bi-plus-circle me-1"></i> Add User
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light border-light">
                        <tr>
                            <th class="py-3 ps-3">Nama</th>
                            <th class="py-3">Email</th>
                            <th class="py-3">No Telp</th>
                            <th class="py-3">Role</th>
                            <th class="py-3">Tanggal Daftar</th>
                            <th class="py-3 text-end pe-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse($participants as $p)
                            <tr>
                                <td class="ps-3 border-bottom">{{ $p->name }}</td>
                                <td class="border-bottom">{{ $p->email }}</td>
                                <td class="border-bottom">{{ $p->no_telp ?? '-' }}</td>
                                <td class="border-bottom text-capitalize">{{ $p->role }}</td>
                                <td class="border-bottom">
                                    {{ $p->created_at?->format('d M Y') }}
                                </td>

                                <td class="text-end pe-3 border-bottom">

                                    <a href="{{ route('admin.participants.edit', $p->id) }}" class="text-primary me-2 text-decoration-none">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    {{-- Delete button --}}
                                    <a href="#"
                                    class="text-danger me-2"
                                    data-bs-toggle="modal"
                                    data-bs-target="#deleteModal"
                                    data-id="{{ $p->id }}"
                                    data-name="{{ $p->name }}">
                                        <i class="bi bi-trash"></i>
                                    </a>

                                    {{-- <form action="{{ route('admin.participants.destroy', $p->id) }}"
                                          method="POST"
                                          class="d-inline"
                                          onsubmit="return confirm('Apakah yakin ingin menghapus peserta ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn p-0 text-danger border-0 bg-transparent">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form> --}}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4">
                                    Tidak ada peserta terdaftar.
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
                <!-- Delete Confirmation Modal -->
                <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content rounded-4 shadow">

                            <div class="modal-header bg-danger text-white rounded-top-4">
                                <h5 class="modal-title">Hapus Peserta?</h5>
                                <button class="btn-close btn-close-white"
                                        data-bs-dismiss="modal"></button>
                            </div>

                            <div class="modal-body">
                                <p>Apakah Anda yakin ingin menghapus peserta:</p>
                                <h6 id="deleteUserName" class="fw-bold text-danger"></h6>
                            </div>

                            <div class="modal-footer border-0">
                                <button class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">
                                    Batal
                                </button>

                                <form id="deleteForm" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger rounded-pill">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

            <div class="mt-3">
                {{ $participants->links() }}
            </div>

        </div>
    </div>
</div>
<script>
    const deleteModal = document.getElementById('deleteModal');

    deleteModal.addEventListener('show.bs.modal', function(event) {
        let button = event.relatedTarget;
        let name = button.getAttribute("data-name");
        let id   = button.getAttribute("data-id");

        // Set nama user ke modal text
        document.getElementById("deleteUserName").textContent = name;

        // Set action form delete
        document.getElementById("deleteForm").action =
            `/admin/participants/${id}`;
    });
</script>

@endsection
