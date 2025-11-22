@extends('layouts.admin')
@section('title', 'Chatbot — Skena Aktor')

@section('content')
<!-- Chatbot View -->
      <section id="view-chatbot" class="view" style="">
        <div class="section-title">
          <h2>Pengaturan Chatbot AI</h2>
          <div>
            <button class="btn btn-primary" onclick="trainChatbot()">Latih Model (Demo)</button>
            <button class="btn btn-ghost" onclick="clearChatLogs()">Bersihkan Log</button>
          </div>
        </div>

        <div class="card">
          <h3>Data Pelatihan (FAQ & Respon)</h3>
          <div style="margin-top:12px">
            <textarea id="qaPairs" class="input textarea" placeholder="Masukkan pasangan Q/A, satu per baris, pisah dengan '||' contoh: Apa itu Skena Aktor?||Skena Aktor adalah..."></textarea>
            <div style="display:flex;gap:8px;margin-top:8px">
              <button class="btn btn-primary" onclick="saveQAPairs()">Simpan Data</button>
              <button class="btn btn-ghost" onclick="loadQAPairs()">Muat Data</button>
            </div>
          </div>
        </div>

        <div class="card mt-12">
          <h3>Simulasi Chat</h3>
          <div id="chatWindow" style="border:1px solid rgba(15,23,42,0.04);padding:12px;border-radius:10px;height:280px;overflow:auto;background:#fff"></div>
          <div style="display:flex;gap:8px;margin-top:8px">
            <input id="chatInput" class="input" placeholder="Tanya chatbot..." />
            <button class="btn btn-primary" onclick="sendChat()">Kirim</button>
          </div>
        </div>
      </section>
      @endsection

{{-- @push('scripts')
<script>
    {!! file_get_contents(base_path('resources/raw/js-chatbot.js')) !!}
</script>
@endpush --}}
