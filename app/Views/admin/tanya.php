<?=$this->extend('template')?>
<?=$this->section('content')?>
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix py-3">
                <h4 class="page-title pull-left">Kelola pertanyaan</h4>
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

                    <h4 class="header-title">pertanyaan <button id="tambah" class="ml-1 btn btn-primary btn-xs">tambah
                            <span class="ml-1 ti-plus"></span></button></h4>
                    <div class=" table-responsive">
                        <table class="table text-center table-bordered" id="peserta">
                            <thead>
                                <tr>
                                    <th>Pertanyaan</th>
                                    <th>Jawaban</th>
                                    <th>aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($tanya as $k): ?>
                                <tr>
                                    <td><?=$k['pertanyaan'];?></td>
                                    <td>
                                        <div class="d-flex flex-column justify-content-start align-items-start"
                                            style="transform:scale(0.7);">
                                            <button onclick="jawab(<?=$k['pertanyaan_id'];?>)"
                                                class="mx-1 btn btn-primary btn-sm"><span class="ti-pencil-alt"></span>
                                                tambah</button>
                                            <ul class="mt-2" style="width:100%">
                                                <?php foreach ($jawab as $j): ?>
                                                <?php if ($j['pertanyaan'] == $k['pertanyaan_id']): ?>

                                                <li class="my-1 d-flex align-items-center justify-content-between">
                                                    <?=$j['pilihan'];?>
                                                    (<?=$j['nilai'];?>)
                                                    <div class="d-flex justify-content-center">
                                                        <button onclick="edit_jawab(<?=$j['pilihan_id'];?>)"
                                                            class="mx-1 btn btn-success btn-sm"><span
                                                                class="fa fa-pencil"></span>
                                                        </button>
                                                        <button onclick="hapus_jawab(<?=$j['pilihan_id'];?>)"
                                                            class="mx-1 btn btn-danger btn-sm">
                                                            <span class="fa fa-times"></span></button>
                                                    </div>
                                                </li>
                                                <?php endif?>
                                                <?php endforeach?>
                                            </ul>
                                        </div>
                                    </td>
                                    <td style="width:4%">
                                        <div class="d-flex justify-content-center" style="transform:scale(0.7);">
                                            <button onclick="edit(<?=$k['pertanyaan_id'];?>)"
                                                class="mx-1 btn btn-success btn-sm"><span class="ti-pencil-alt"></span>
                                                edit</button>
                                            <button onclick="hapus(<?=$k['pertanyaan_id'];?>)"
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
let jurusan = <?=json_encode($jurusan);?>;

function edit(id) {
    fetch('/ahp/tanya/get/' + id)
        .then(e => e.json())
        .then(e => {
            Swal.fire({
                title: 'ubah data',
                html: `
            <form action="/ahp/tanya/edit/${id}" method="post">
                        <div class="input-group">
                            <label class="text-left col-12 p-0 mx-0 my-2" for="nama">Pertanyaan</label>
                            <textarea id="nama" name="pertanyaan" class="form-control">${e.pertanyaan}</textarea>
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

function edit_jawab(id) {
    fetch('/ahp/jawab/get/' + id)
        .then(e => e.json())
        .then(e => {
            let h = `
            <form action="/ahp/jawab/edit/${id}" method="post">
                        <div class="input-group">
                            <label class="text-left col-12 p-0 mx-0 my-2" for="nama">Jawaban</label>
                            <input value="${e.pilihan}" id="nama" name="jawaban" class="form-control"/>
                            <div class="text-danger"></div>
                        </div>
                        <div class="input-group">
                            <label class="text-left col-12 p-0 mx-0 my-2" for="jurusan">Jawaban</label>
                            <select id="jurusan" name="jurusan" class="form-control">`;
            jurusan.forEach((k, v) => {
                h +=
                    `<option value="${k.jurusan_id}" ${e.jurusan==k.jurusan_id?'selected':''}>${k.jurusan_nama}</option>`;
            });
            h += `</select>
                            <div class="text-danger"></div>
                        </div>
                        <div class="input-group">
                            <label class="text-left col-12 p-0 mx-0 my-2" for="nilai">Nilai</label>
                            <input value="${e.nilai}" type="number" id="nilai" min="0" name="nilai" class="form-control"/>
                            <div class="text-danger"></div>
                        </div>
                        <div class="col-12 p-0 mt-4">
                            <input class="btn btn-primary btn-xs py-2 col-12" type="submit" value="kirim">
                        </div>
                    </form>`;
            Swal.fire({
                title: 'ubah data',
                html: h,
                showConfirmButton: false,
            })
        });
}

function jawab(id) {
    let h = `
            <form action="/ahp/jawab/tambah/${id}" method="post">
                        <div class="input-group">
                            <label class="text-left col-12 p-0 mx-0 my-2" for="nama">Jawaban</label>
                            <input id="nama" name="jawaban" class="form-control"/>
                            <div class="text-danger"></div>
                        </div>
                        <div class="input-group">
                            <label class="text-left col-12 p-0 mx-0 my-2" for="jurusan">Jawaban</label>
                            <select id="jurusan" name="jurusan" class="form-control">`;
    jurusan.forEach((k, v) => {
        h += `<option value="${k.jurusan_id}">${k.jurusan_nama}</option>`;
    });
    h += `</select>
                            <div class="text-danger"></div>
                        </div>
                        <div class="input-group">
                            <label class="text-left col-12 p-0 mx-0 my-2" for="nilai">Nilai</label>
                            <input type="number" id="nilai" min="0" name="nilai" class="form-control"/>
                            <div class="text-danger"></div>
                        </div>
                        <div class="col-12 p-0 mt-4">
                            <input class="btn btn-primary btn-xs py-2 col-12" type="submit" value="kirim">
                        </div>
                    </form>`;
    Swal.fire({
        title: 'ubah data',
        html: h,
        showConfirmButton: false,
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
            window.location.href = "/ahp/tanya/hapus/" + id;
        } else if (result.isDenied) {
            // Swal.fire('Changes are not saved', '', 'info')
        }
    })
}

function hapus_jawab(id) {
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
            window.location.href = "/ahp/jawab/hapus/" + id;
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
            <form action="<?=route_to('add_tanya');?>" method="post">
                        <div class="input-group">
                            <label class="text-left col-12 p-0 mx-0 my-2" for="nama">Pertanyaan</label>
                            <textarea id="nama" name="pertanyaan" class="form-control"></textarea>
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


    $('#peserta').DataTable({
        "pageLength": 4
    });
}
</script>
<?=$this->endSection()?>