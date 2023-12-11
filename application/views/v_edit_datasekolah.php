<div class="col-sm-7">
    <div class="panel panel-primary">
        <div class="panel-heading">
            Lokasi Sekolah
        </div>
        <div class="panel-body">
            <div id="mapid" style="height: 500px;"></div>



        </div>
    </div>
</div>

<div class="col-sm-5">
    <div class="panel panel-primary">
        <div class="panel-heading">
            Input Data
        </div>
        <div class="panel-body">
           <?php 
           //validasi data tidak boleh kosong
           echo validation_errors('<div class="alert alert-danger alert-dismissable">
           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');

           //notifikasi pesan data berhasil disimpan
            if ($this->session->flashdata('pesan')) {
                echo '<div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                echo $this->session->flashdata('pesan');
                echo '</div>';
            }

           echo form_open('sekolah/edit/'.$sekolah->id_sekolah); 
           ?>

    <div class="form-group">
        <label>Nama Sekolah</label>
        <input name="nama_sekolah" placeholder="Nama Sekolah" value="<?= $sekolah->nama_sekolah ?>" class="form-control" />
    </div>

    <div class="form-group">
        <label>Jenjang</label>
        <select name="jenjang" class="form-control">
            <option value="<?= $sekolah->jenjang ?>"><?= $sekolah->jenjang ?></option>
            <option value="SD">SD</option>
            <option value="SMP">SMP</option>
            <option value="SMA/SMK">SMA/SMK</option>
        </select>
    </div>

    <div class="form-group">
        <label>Alamat</label>
        <input name="alamat" placeholder="Alamat" value="<?= $sekolah->alamat ?>" class="form-control" />
    </div>

    <div class="form-group">
        <label>Status</label>
        <select name="status_sekolah" class="form-control">
            <option value="<?= $sekolah->status_sekolah ?>"><?= $sekolah->status_sekolah ?></option>
            <option value="Negeri">Negeri</option>
            <option value="Swasta">Swasta</option>
        </select>
    </div>

    <div class="form-group">
        <label>Akreditasi</label>
        <input name="akreditasi" placeholder="Akreditasi" value="<?= $sekolah->akreditasi ?>" class="form-control" />
    </div>

    <div class="form-group">
        <label>Latitude</label>
        <input id="Latitude" name="latitude" placeholder="Latitude" value="<?= $sekolah->latitude ?>" class="form-control" readonly/>
    </div>

    <div class="form-group">
        <label>Longitude</label>
        <input id="Longitude" name="longitude" placeholder="Longitude" value="<?= $sekolah->longitude ?>" class="form-control" readonly/>
    </div>

    <div class="form-group">
        <label>Keterangan</label>
        <input name="ket" placeholder="Keterangan" value="<?= $sekolah->ket ?>" class="form-control" />
    </div>

    <div class="form-group">
        <label></label>
        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
        <button type="reset" class="btn btn-sm btn-success">Reset</button>
    </div>


           <?php echo form_close(); ?>
        </div>
    </div>
</div>




<script>
var curLocation=[0,0];
if (curLocation[0]==0 && curLocation[1]==0) {
	curLocation =[<?= $sekolah->latitude ?>, <?= $sekolah->longitude ?>];	
}

var mymap = L.map('mapid').setView([<?= $sekolah->latitude ?>, <?= $sekolah->longitude ?>], 14);
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
			id: 'mapbox/streets-v11'
}).addTo(mymap);

mymap.attributionControl.setPrefix(false);
var marker = new L.marker(curLocation, {
	draggable:'true'
});

marker.on('dragend', function(event) {
var position = marker.getLatLng();
marker.setLatLng(position,{
	draggable : 'true'
	}).bindPopup(position).update();
	$("#Latitude").val(position.lat);
	$("#Longitude").val(position.lng).keyup();
});

$("#Latitude, #Longitude").change(function(){
	var position =[parseInt($("#Latitude").val()), parseInt($("#Longitude").val())];
	marker.setLatLng(position, {
	draggable : 'true'
	}).bindPopup(position).update();
	mymap.panTo(position);
});
mymap.addLayer(marker);

</script>