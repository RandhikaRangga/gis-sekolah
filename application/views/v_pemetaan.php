<i>** Klik pada icon untuk melihat detail **<i><br><br>
<div id="mapid" style="height: 500px;"></div>

<script>
    var mymap = L.map('mapid').setView([-6.484498598021927, 106.83387749776995], 14);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11',

    }).addTo(mymap);

    var icon_sekolah = L.icon({
        iconUrl: '<?= base_url('icon/sekolah1.png') ?>',
        iconSize:     [35, 45], // size of the icon
    });
    <?php foreach ($sekolah as $key => $value) { ?>
        L.marker([<?= $value->latitude ?>, <?= $value->longitude ?>],{icon:icon_sekolah}).addTo(mymap)
        .bindPopup("<b>Nama Sekolah: <?= $value->nama_sekolah ?></b><br/>"+
        "Jenjang: <?= $value->jenjang ?></br>" +
        "Alamat: <?= $value->alamat ?></br>"+
        "Status: <?= $value->status_sekolah ?></br>"+
        "Akreditasi: <?= $value->akreditasi ?></br>");
    <?php } ?>
    

</script>

<!-- L.marker([<?= $value->latitude ?>, <?= $value->longitude ?>],{icon:icon_sekolah}).addTo(mymap)
        .bindPopup("<b>Nama Sekolah: <?= $value->nama_sekolah ?></b><br/>"+
        "Jenjang: <?= $value->jenjang ?></br>" +
        "Alamat: <?= $value->alamat ?></br>"+
        "Status: <?= $value->status_sekolah ?></br>"+
        "Akreditasi: <?= $value->akreditasi ?></br>"); -->