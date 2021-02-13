<?=$this->extend('templatesiswa')?>
<?=$this->section('content')?>

<!-- page title area end -->
<div class="main-content-inner">
    <div class="row">
        <!-- seo fact area start -->


        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <?php if ($minat['minat']): ?>
                    <h4 class="mb-2"> Jurusan yang direkomendasikan:</h4>
                    <?php
$ahp = new \App\Controllers\Ahp();
$jurusan = $ahp->jurusan->findAll();
$mk = $ahp->matrik(
    $ahp->kriteria->findAll(),
    'mk',
    ['k1', 'k2'],
    'kriteria_id'
);
$k = $ahp->kriteria->findAll();
for ($i = 0; $i < count($k); $i++) {
    $sk = $ahp->sub->where(['kriteria_id' => $k[$i]['kriteria_id']])->findAll();
    $k[$i]['matrik'] = $ahp->matrik(
        $sk,
        'ms',
        ['sub1', 'sub2'],
        'sub_id'
    );
}
$sub = $ahp->sub->where([
    'kriteria_id' => $ahp->kriteria->where([
        'kriteria_nama' => 'UN',
    ])->first()['kriteria_id'],
])->findAll();
for ($i = 0; $i < count($sub); $i++) {
    $sk = $ahp->jurusan->findAll();
    $sub[$i]['matrik'] = $ahp->matrik(
        $sk,
        'mj',
        ['jurusan1', 'jurusan2'],
        'jurusan_id',
        $sub[$i]['sub_id']
    );
}
for ($i = 0; $i < count($jurusan); $i++) {
    $j = 0;
    for ($j; $j < count($k); $j++) {
        if ($k[$j]['kriteria_nama'] == "UN") {
            break;
        }

    }
    $un = 0;
    foreach ($sub as $s) {
        $nilai = $ahp->ns->where([
            'peserta' => $ahp->admin::$session->get("userid"),
            'sub' => $s['sub_id'],
        ])->first()['nilai'];
        $un += ($nilai / count($jurusan)) * $s['matrik']['eigen']['avg'][$i];
    }
    $jurusan[$i]['un'] = round($mk['eigen']['avg'][$j] * ($un), 4);

    $j = 0;
    for ($j; $j < count($k); $j++) {
        if ($k[$j]['kriteria_nama'] == "MINAT") {
            break;
        }

    }

    $s = $ahp->nj->where([
        'peserta' => $ahp->admin::$session->get("userid"),
        'kriteria' => $ahp->kriteria->where(['kriteria_nama' => 'MINAT'])->first()['kriteria_id'],
        'jurusan' => $jurusan[$i]['jurusan_id'],
    ])->first()['nilai'];
    $m = $ahp->sub->where(['kriteria_id' => $ahp->kriteria->where(['kriteria_nama' => 'MINAT'])->first()['kriteria_id']])->findAll();
    $j2 = 0;
    for ($j2; $j2 < count($m); $j2++) {
        if ($m[$j2]['sub_id'] == $s) {
            break;
        }

    }
    $jurusan[$i]['minat'] = round($mk['eigen']['avg'][$j] * $k[$j]['matrik']['eigen']['avg'][$j2], 4);

    $j = 0;
    for ($j; $j < count($k); $j++) {
        if ($k[$j]['kriteria_nama'] == "PRESTASI") {
            break;
        }

    }

    $s = $ahp->nj->where([
        'peserta' => $ahp->admin::$session->get("userid"),
        'kriteria' => $ahp->kriteria->where(['kriteria_nama' => 'PRESTASI'])->first()['kriteria_id'],
        'jurusan' => $jurusan[$i]['jurusan_id'],
    ])->first()['nilai'];
    $m = $ahp->sub->where(['kriteria_id' => $ahp->kriteria->where(['kriteria_nama' => 'PRESTASI'])->first()['kriteria_id']])->findAll();
    $j2 = 0;
    for ($j2; $j2 < count($m); $j2++) {
        if ($m[$j2]['sub_id'] == $s) {
            break;
        }

    }
    $jurusan[$i]['prestasi'] = round($mk['eigen']['avg'][$j] * $k[$j]['matrik']['eigen']['avg'][$j2], 4);

    $jurusan[$i]['total'] = array_sum([
        $jurusan[$i]['un'],
        $jurusan[$i]['minat'],
        $jurusan[$i]['prestasi'],
    ]);

}
$total = array_column($jurusan, 'total');

array_multisort($total, SORT_DESC, $jurusan);
$hasil = $ahp->hasil->where([
    'peserta' => $ahp->admin::$session->get('userid'),
    'jurusan' => $jurusan[0]['jurusan_id'],
])->first;
if ($hasil == null) {
    $ahp->hasil->save([
        'peserta' => $ahp->admin::$session->get('userid'),
        'jurusan' => $jurusan[0]['jurusan_id'],
        'total' => $jurusan[0]['total'],
    ]);
}
?>
                    <table class="table table-bordered text-center">
                        <thead class="thead-light">
                            <tr>
                                <th>Ranking</th>
                                <th>Jurusan</th>
                                <th>UN</th>
                                <th>MINAT</th>
                                <th>PRESTASI</th>
                                <th>TOTAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0;
foreach ($jurusan as $j): ?>
                            <tr>
                                <td><?=++$i;?></td>
                                <td><?=$j['jurusan_nama'];?></td>
                                <td><?=$j['un'];?></td>
                                <td><?=$j['minat'];?></td>
                                <td><?=$j['prestasi'];?></td>
                                <td><?=$j['total'];?></td>
                            </tr>
                            <?php endforeach?>
                        </tbody>
                    </table>
                    <?php else: ?>
                    <h4>Jawab pertanyaan berikut:</h4>
                    <form method="post" action="<?=route_to('kuis');?>/<?=$userid;?>">
                        <ul>
                            <?php $jj = 0;
$i = 0;foreach ($tanya as $t): ?>
                            <li class="mt-3 d-flex flex-column"><?=$t['pertanyaan'];?>
                                <?php foreach ($jawab as $j): ?>
                                <div class="input-group d-flex ml-3">
                                    <?php if ($j['pertanyaan'] == $t['pertanyaan_id']): ?>
                                    <input type="radio" id="opt-<?=$i;?>" name="opt-<?=$jj;?>"
                                        value="<?=$j['jurusan'] . '-' . $j['nilai'];?>">
                                    <label for="opt-<?=$i++;?>"
                                        style="margin-top:-5px; margin-left:5px"><?=$j['pilihan'];?></label>
                                    <?php endif?>
                                </div>
                                <?php endforeach?>
                            </li>
                            <?php $jj++;endforeach?>
                        </ul>
                        <input type="submit" class="btn btn-primary" value="kirim">
                    </form>

                    <?php endif?>
                </div>
            </div>
        </div>
        <!-- testimonial area end -->
    </div>
</div>
<link rel="stylesheet" href="/assets/css/swal2.css" />
<script src="/assets/js/swal2.js"></script>
</script>
<?=$this->endSection()?>