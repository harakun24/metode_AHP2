<?=$this->extend('template')?>
<?=$this->section('content')?>
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix py-3">
                <h4 class="page-title pull-left">Kelola kriteria</h4>
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
                <div class="card-body">

                    <h4 class="header-title">Kriteria <button id="tambah" class="ml-1 btn btn-primary btn-xs">tambah
                            <span class="ml-1 ti-plus"></span></button></h4>
                    <div class=" table-responsive">
                        <table class="table text-center table-bordered" id="peserta">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Kriteria</th>
                                    <th>aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($kriteria as $k): ?>
                                <tr>
                                    <td>K-<?=$k['kriteria_id'];?></td>
                                    <td><?=$k['kriteria_nama'];?></td>
                                    <td style="width:4%">
                                        <div class="d-flex justify-content-center" style="transform:scale(0.7);">
                                            <button onclick="edit(<?=$k['kriteria_id'];?>)"
                                                class="mx-1 btn btn-success btn-sm"><span class="ti-pencil-alt"></span>
                                                edit</button>
                                            <button onclick="hapus(<?=$k['kriteria_id'];?>)"
                                                class="mx-1 btn btn-danger btn-sm">
                                                <span class="ti-trash"></span> hapus</button>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach?>
                            </tbody>
                        </table>
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
function edit(id) {
    fetch('/ahp/kriteria/get/' + id)
        .then(e => e.json())
        .then(e => {
            Swal.fire({
                title: 'ubah data',
                html: `
            <form action="/ahp/kriteria/edit/${id}" method="post">
                        <div class="input-group">
                            <label class="text-left col-12 p-0 mx-0 my-2" for="nama">Nama</label>
                            <input value="${e.kriteria_nama}" class="form-control" name="nama" type="text" id="nama">
                            <div class="text-danger"></div>
                        </div>
                        <div class="col-12 p-0 mt-4">
                            <input class="btn btn-primary btn-xs py-2 col-12" type="submit" value="kirim">
                        </div>
                    </form>
      `,
                showConfirmButton: false,
            })
        });
}

function hapus(id) {
    Swal.fire({
        title: 'perhatian',
        icon: 'question',
        text: 'Mengingatkan data akan dihapus permanen dari sistem, yakin ingin melanjutkan?',
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: `Lanjut`,
        denyButtonText: `Batal`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            window.location.href = "/ahp/kriteria/hapus/" + id;
        } else if (result.isDenied) {
            // Swal.fire('Changes are not saved', '', 'info')
        }
    })
}
window.onload = function() {
    <?php if (session()->getFlashData('save')): ?>
    Swal.fire({
        icon: 'success',
        text: 'berhasil menambah data',
        showConfirmButton: false,
        timer: 1800
    })
    <?php endif?>

    <?php if (session()->getFlashData('edit')): ?>
    Swal.fire({
        icon: 'success',
        text: 'berhasil mengubah data',
        showConfirmButton: false,
        timer: 1800
    })
    <?php endif?>

    <?php if (session()->getFlashData('del')): ?>
    Swal.fire({
        icon: 'success',
        text: 'berhasil mmeghapus data',
        showConfirmButton: false,
        timer: 1800
    })
    <?php endif?>
    $("#tambah").click(e => {
        Swal.fire({
            title: 'tambah data',
            html: `
            <form action="<?=route_to('add_kriteria');?>" method="post">
                        <div class="input-group">
                            <label class="text-left col-12 p-0 mx-0 my-2" for="nama">Nama</label>
                            <input class="form-control" name="nama" type="text" id="nama">
                            <div class="text-danger"></div>
                        </div>
                        <div class="col-12 p-0 mt-4">
                            <input class="btn btn-primary btn-xs py-2 col-12" type="submit" value="kirim">
                        </div>
                    </form>
      `,
            showConfirmButton: false,
        })
    });


    $('#peserta').DataTable();
}
</script>
<?=$this->endSection()?>