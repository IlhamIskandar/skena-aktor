@extends('layouts.admin')
@section('title', 'Participants — Skena Aktor')

@section('content')
<!-- Page 1: Manajemen Peserta List -->
        <div id="listPage">
            <!-- Header Section -->
            <div class="header-section">
                <h1 class="header-title">Manajemen Peserta</h1>
                <p class="header-subtitle">Lihat, Atur dan Export Data Peserta</p>
                <div class="header-actions">
                    <input type="text" class="form-control search-box" placeholder="Search">
                    <button class="btn btn-excel">Excel</button>
                    <button class="btn btn-pdf">PDF</button>
                    <select class="form-select status-dropdown">
                        <option>All Status</option>
                        <option>Active</option>
                        <option>Inactive</option>
                    </select>
                </div>
            </div>

            <!-- Content Card -->
            <div class="content-card">
                <div class="card-header-custom">
                    <div class="section-title">All Participant</div>
                    <button class="btn-add-user" id="addUserBtn">
                        <i class="bi bi-plus-circle"></i>
                        Add User
                    </button>
                </div>

                <!-- Table -->
                <div class="table-responsive">
                    <table class="table-custom">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Registration date</th>
                                <th>actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>John Doe</td>
                                <td>john@example.com</td>
                                <td>+62 812-3456-7890</td>
                                <td>15 Nov 2025</td>
                                <td>
                                    <div class="action-icons">
                                        <i class="bi bi-trash" onclick="deleteRow(this)"></i>
                                        <i class="bi bi-pencil-square" onclick="editRow(this)"></i>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Jane Smith</td>
                                <td>jane@example.com</td>
                                <td>+62 813-4567-8901</td>
                                <td>14 Nov 2025</td>
                                <td>
                                    <div class="action-icons">
                                        <i class="bi bi-trash" onclick="deleteRow(this)"></i>
                                        <i class="bi bi-pencil-square" onclick="editRow(this)"></i>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Ahmad Rizki</td>
                                <td>ahmad@example.com</td>
                                <td>+62 814-5678-9012</td>
                                <td>13 Nov 2025</td>
                                <td>
                                    <div class="action-icons">
                                        <i class="bi bi-trash" onclick="deleteRow(this)"></i>
                                        <i class="bi bi-pencil-square" onclick="editRow(this)"></i>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Footer -->
            <div class="footer">
                © 2025 Skena Aktor. All rights reserved.
            </div>
        </div>
@endsection

{{-- @push('scripts')
<script>
    {!! file_get_contents(base_path('resources/raw/js-participants.js')) !!}
</script>
@endpush --}}
