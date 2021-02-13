<?=$this->extend('template')?>
<?=$this->section('content')?>
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix py-3">
                <h4 class="page-title pull-left">Kelola user</h4>
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

                    <h4 class="header-title">Peserta <button id="tambah" class="ml-1 btn btn-primary btn-xs">tambah
                            <span class="ml-1 ti-plus"></span></button></h4>
                    <div class=" table-responsive">
                        <table class="table text-center table-bordered" id="peserta">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>username</th>
                                    <th>password</th>
                                    <th>aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $u): ?>
                                <tr>
                                    <td>USR-<?=$u['admin_id'];?></td>
                                    <td><?=$u['admin_nama'];?></td>
                                    <td><?=$u['admin_uname'];?></td>
                                    <td><?php foreach (str_split($u['admin_pass']) as $p): ?>
                                        &#8226;
                                        <?php endforeach?>
                                    </td>
                                    <td style="width:4%">
                                        <div class="d-flex justify-content-center" style="transform:scale(0.7);">
                                            <button onclick="edit(<?=$u['admin_id'];?>)"
                                                class="mx-1 btn btn-success btn-sm"><span class="ti-pencil-alt"></span>
                                                edit</button>
                                            <?php if ($u['admin_nama'] != $user): ?>

                                            <button onclick="hapus(<?=$u['admin_id'];?>)"
                                                class="mx-1 btn btn-danger btn-sm">
                                                <span class="ti-trash"></span> hapus</button>
                                            <?php else: ?>
                                            <button class="mx-1 btn btn-secondary btn-sm" disabled>
                                                <span class="ti-trash"></span> hapus</button>
                                            <?php endif?>
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
    fetch('/ahp/user/get/' + id)
        .then(e => e.json())
        .then(e => {
            Swal.fire({
                title: 'ubah data',
                html: `
            <form action="/ahp/user/edit/${id}" method="post">
                        <div class="input-group">
                            <label class="text-left col-12 p-0 mx-0 my-2" for="nama">Nama</label>
                            <input value="${e.admin_nama}" class="form-control" name="nama" type="text" id="nama">
                            <div class="text-danger"></div>
                        </div>
                        <div class="input-group">
                            <label class="text-left col-12 p-0 mx-0 my-2" for="uname">username</label>
                            <input value="${e.admin_uname}" class="form-control" name="uname" type="text" id="uname">
                            <div class="text-danger"></div>
                        </div>
                        <div class="input-group">
                            <label class="text-left col-12 p-0 mx-0 my-2" for="pass">password</label>
                            <input value="${e.admin_pass}" class="form-control" name="pass" type="password" id="pass">
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
            window.location.href = "/ahp/user/hapus/" + id;
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
            <form action="<?=route_to('add_user');?>" method="post">
                        <div class="input-group">
                            <label class="text-left col-12 p-0 mx-0 my-2" for="nama">Nama</label>
                            <input class="form-control" name="nama" type="text" id="nama">
                            <div class="text-danger"></div>
                        </div>
                        <div class="input-group">
                            <label class="text-left col-12 p-0 mx-0 my-2" for="uname">username</label>
                            <input class="form-control" name="uname" type="text" id="uname">
                            <div class="text-danger"></div>
                        </div>
                        <div class="input-group">
                            <label class="text-left col-12 p-0 mx-0 my-2" for="pass">password</label>
                            <input class="form-control" name="pass" type="password" id="pass">
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