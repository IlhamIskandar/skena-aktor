@extends('layouts.home.app')

@section('content')
<div class="container py-5">

    <!-- Header -->
    <div class="text-center mb-5">
        <h2 class="fw-bold">Skena Aktor AI Chatbot</h2>
        <p class="text-muted">Tanyakan apa pun tentang program, benefit, pendaftaran, dan informasi komunitas.</p>
    </div>

    <!-- Chat Container -->
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-sm">
                <div class="card-body p-4" style="height: 450px; overflow-y: auto;" id="chatWindow">

                    <!-- Welcome message -->
                    <div class="d-flex mb-4">
                        <div class="bg-warning text-white p-3 rounded-3">
                            Hai! Saya chatbot AI Skena Aktor. Ada yang bisa saya bantu? 😊
                        </div>
                    </div>

                </div>

                <!-- Chat Input -->
                <div class="card-footer bg-white border-top">

                    <form id="chatForm" class="d-flex">
                        <input type="text" id="chatInput"
                               class="form-control me-2"
                               placeholder="Ketik pesan kamu..." required>

                        <button class="btn btn-warning px-4" type="submit">
                            Kirim
                        </button>
                    </form>

                </div>
            </div>

        </div>
    </div>

</div>

@endsection
