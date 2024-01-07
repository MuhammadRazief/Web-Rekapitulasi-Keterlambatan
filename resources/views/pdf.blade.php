
    <div>
        <h2>Surat Pernyataan Keterlambatan</h2>
        <p>Yang bertanda tangan di bawah ini:</p>
        <div style="margin-bottom: 15px;">
            <label for="Students" style="display: inline-block; width: 150px;">Nis:</label>
            <span>{{ explode(' - ', $latest->name)[0] }}</span>
        </div>
        <div style="margin-bottom: 15px;">
            <label for="Students" style="display: inline-block; width: 150px;">Nama:</label>
            <span>{{ explode(' - ', $latest->name)[1] }}</span>
        </div>
        <div style="margin-bottom: 15px;">
            <label for="Students" style="display: inline-block; width: 150px;">Rombel:</label>
            <span>{{ $latest->rombel_id }}</span>
        </div>
        <div style="margin-bottom: 15px;">
            <label for="Students" style="display: inline-block; width: 150px;">Rayon:</label>
            <span>{{ $latest->rayon_id }}</span>
        </div>
        <div style="margin-bottom: 15px;">
            <p>Demi kebenaran, saya menyatakan bahwa keterangan di atas adalah benar adanya.</p>
        </div>
        <div style="margin-bottom: 15px;">
            <p>Mengetahui,</p>
            <p>Nama Penanggung Jawab</p>
        </div>
    </div>
