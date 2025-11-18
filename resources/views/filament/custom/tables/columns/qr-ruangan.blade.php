@php
    $qrUrl = route('kebersihan.scan', ['ruangan_id' => $record->id]);
    $qr = "https://api.qrserver.com/v1/create-qr-code/?size=100x100&data=" . urlencode($qrUrl);
@endphp

<div class="flex flex-col items-center">
    <img src="{{ $qr }}" alt="QR {{ $record->nama_ruangan }}" class="w-20 h-20" />
</div>