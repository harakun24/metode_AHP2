<?=$this->extend('template')?>
<?=$this->section('content')?>
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix py-3">
                <h4 class="page-title pull-left">Dashboard</h4>
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
        <div class="col-lg-12">
            <div class="row mt-2">
                <div class="col-md-4 m-0">
                    <div class="card">
                        <div class="seo-fact sbg2">
                            <div class="p-4 d-flex justify-content-between align-items-center">
                                <div class="seofct-icon"><i class="ti-blackboard"></i> Kriteria</div>
                                <h2><?=count($kriteria);?></h2>
                            </div>
                            <div class="p-4 d-flex flex-wrap">
                                <?php foreach ($kriteria as $k): ?>
                                <span class="mx-1 px-4 badge badge-pill badge-warning p-2">
                                    <?=$k['kriteria_nama'];?>
                                </span>
                                <?php endforeach?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 m-0">
                    <div class="card">
                        <div class="seo-fact sbg3">
                            <div class="p-4 d-flex justify-content-between align-items-center">
                                <div class="seofct-icon"><i class="ti-server"></i> Subkriteria</div>
                                <h2><?=count($sub);?></h2>
                            </div>
                            <div class="p-4 d-flex" style="overflow-x:scroll">
                                <?php foreach ($kriteria as $k): ?>
                                <?php foreach ($sub as $s): ?>
                                <?php if ($s['kriteria_id'] == $k['kriteria_id']): ?>

                                <span style="margin-top:-20px" class="mx-1 px-4 badge badge-pill badge-warning p-2">
                                    <?=$s['sub_nama'];?><span
                                        class="badge py-1 badge-dark px-2 ml-2"><?=$k['kriteria_nama'];?></span>
                                </span>
                                <?php endif?>
                                <?php endforeach?>
                                <?php endforeach?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 m-0">
                    <div class="card">
                        <div class="seo-fact sbg1">
                            <div class="p-4 d-flex justify-content-between align-items-center">
                                <div class="seofct-icon"><i class="ti-bar-chart"></i> Jurusan</div>
                                <h2><?=count($jurusan);?></h2>
                            </div>
                            <div class="p-4 d-flex" style="overflow-x:scroll">
                                <?php foreach ($jurusan as $k): ?>

                                <span class="mx-1 px-4 badge badge-pill badge-warning p-2">
                                    <?=$k['jurusan_nama'];?>
                                </span>
                                <?php endforeach?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Peserta</h4>
                    <div class="table-responsive">
                        <table class="table text-center table-bordered" id="peserta">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>NISN</th>
                                    <th>Nama</th>
                                    <th>jenis kelamin</th>
                                    <th>Alamat</th>
                                    <th>Minat</th>
                                    <th>hasil</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($peserta as $p): ?>
                                <tr>
                                    <td><?=$p['peserta_id'];?></td>
                                    <td><?=$p['peserta_nisn'];?></td>
                                    <td><?=$p['peserta_nama'];?></td>
                                    <td><?=$p['peserta_jk'];?></td>
                                    <td><?=$p['peserta_alamat'];?></td>
                                    <td>
                                        <?php if ($p['minat']): ?>
                                        <span class="mx-1 px-4 badge badge-pill badge-success p-2">
                                            sudah mengisi
                                        </span>
                                        <?php else: ?>
                                        <span class="mx-1 px-4 badge badge-pill badge-warning p-2">
                                            menunggu
                                        </span>
                                        <?php endif?>
                                    </td>
                                    <td>
                                        <?php
$ahp = new \App\Controllers\Ahp();
$hasil = $ahp->hasil->where([
    'peserta' => $p['peserta_id'],
])->first();
?>
                                        <?php if ($hasil == null): ?>
                                        <span class="mx-1 px-4 badge badge-pill badge-secondary p-2">
                                            belum ada
                                        </span>
                                        <?php else: ?>
                                        <span class="mx-1 px-4 badge badge-pill badge-success p-2">
                                            <?=$ahp->jurusan->where([
    'jurusan_id' => $hasil['jurusan'],
])->first()['jurusan_nama'];?>
                                        </span>
                                        <?php endif?>
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
<script>
window.onload = function() {
    $('#peserta').DataTable();
}
</script>
<?=$this->endSection()?>