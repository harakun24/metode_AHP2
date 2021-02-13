<?=$this->extend('template')?>
<?=$this->section('content')?>
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix py-3">
                <h4 class="page-title pull-left">Nilai siswa</h4>
                <ul class="breadcrumbs pull-left">
                    <li><span>&nbsp;</span></li>
                </ul>
            </div>
        </div>

    </div>
</div>
<!-- page title area end -->
<div class="main-content-inner">
    <div class="row">
        <!-- seo fact area start -->


        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body d-flex flex-wrap justify-content-between">
                    <select class="form-control col-sm-7 col-lg-9" oninput="update(this)">
                        <option value="0">--pilih siswa--</option>
                        <?php foreach ($siswa as $s): ?>
                        <option value="<?=$s['peserta_id'];?>">
                            <?=$s['peserta_nama'];?></option>
                        <?php endforeach?>
                    </select>
                    <div class="alert-success alert col-sm-4 col-lg-2" style="opacity: 0;" id="alert">
                        <i class="fa fa-check-circle"></i>
                        tersimpan
                    </div>
                    <div class="col-12 mt-1 d-flex flex-wrap justify-content-start" id="un">
                    </div>
                    <div class="col-12 mt-1 d-flex flex-wrap justify-content-start" id="prestasi">

                    </div>
                </div>
            </div>
        </div>
        <!-- testimonial area end -->
    </div>
</div>
<link rel="stylesheet" href="/assets/css/swal2.css" />
<script src="/assets/js/swal2.js"></script>
<script>
function update(t) {
    console.log(t.value);
    $("#un").html("");
    $("#prestasi").html("");
    if (t.value > 0) {
        fetch(`<?=route_to('nilai_siswa');?>/${t.value}`)
            .then(r => r.json())
            .then(r => {
                str = "";
                str2 = "";
                i = 0;
                r.res.forEach((v, k) => {
                    str += `
                <div class="form-group col-lg-2 col-sm-12">
                    <label for="un-${++i}">${v.sub_nama}</label>
                    <input oninput="ganti(${v.nilai_id},this)" value="${v.nilai}" id="un-${++i}" type="number" class="form-control">
                </div>
            `;
                });
                r.res2.forEach((v, k) => {
                    str2 += `
                <div class="form-group col-lg-2 col-sm-12">
                    <label>${v.jurusan_nama}</label>
                    <select oninput="ganti(${v.nilai_id},this,'jurusan')" class="form-control">
                    `;
                    r.sub.forEach((vk, k) => {
                        str2 += `
                        <option value="${vk.sub_id}" ${v.nilai==vk.sub_id?'selected':''}>
                        ${vk.sub_nama}</option>`;
                    });
                    str2 += `</select>
                </div>
            `;
                });
                $("#un").html("<h4 class='col-12'>UN</h4>" + str);
                $("#prestasi").html("<h4 class='col-12'>Prestasi</h4>" + str2);
            });
    }
}

function ganti(n, t, j = "update") {
    fetch(`<?=route_to('nilai_siswa');?>/${j}/${n}/${t.value}`)
        .then(r => r.json())
        .then(r => {
            if (r.res == 200) {
                alert = document.getElementById("alert");
                alert.style.opacity = 1;
                setTimeout(() => {
                    alert.style.opacity = 0;
                }, 2000);
            }
        });
}
window.onload = function() {

}
</script>
<?=$this->endSection()?>