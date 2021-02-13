<?=$this->extend('template')?>
<?=$this->section('content')?>
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix py-3">
                <h4 class="page-title pull-left">Matriks kriteria</h4>
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
                <div class="card-body d-flex flex-wrap">
                    <div class="col-lg-4 col-sm-8">
                        <div class="alert-success alert" style="opacity: 0; height:0;" id="alert">
                            <i class="fa fa-check-circle"></i>
                            tersimpan
                        </div>
                        <?php foreach ($mk as $m): ?>
                        <div class="col-12">
                            <b>
                                <?php foreach ($kriteria as $k): ?>
                                <?php if ($k['kriteria_id'] == $m['k1']): ?>
                                <?=$k['kriteria_nama'];?>
                                <?php endif?>
                                <?php endforeach?>
                            </b>
                            <select class="form-control col-10 py-2" oninput="update(<?=$m['matrik_id'];?>,this)">
                                <option value="1" <?=$m['nilai'] == 1 ? "selected" : "";?>>1 - sama penting dari
                                </option>
                                <option value="2" <?=$m['nilai'] == 2 ? "selected" : "";?>>2 - mendekati sedikit lebih
                                    penting
                                    dari
                                </option>
                                <option value="3" <?=$m['nilai'] == 3 ? "selected" : "";?>>3 - sedikit lebih penting
                                    dari
                                </option>
                                <option value="4" <?=$m['nilai'] == 4 ? "selected" : "";?>>4 - emdekati lebih penting
                                    dari
                                </option>
                                <option value="5" <?=$m['nilai'] == 5 ? "selected" : "";?>>5 - lebih penting dari
                                </option>
                                <option value="6" <?=$m['nilai'] == 6 ? "selected" : "";?>>6 - emdekati lebih mutlak
                                    penting
                                    dari
                                </option>
                                <option value="7" <?=$m['nilai'] == 7 ? "selected" : "";?>>7 - lebih mutlak dari
                                </option>
                                <option value="8" <?=$m['nilai'] == 8 ? "selected" : "";?>>8 - mendekati mutlak penting
                                    dari
                                </option>
                                <option value="9" <?=$m['nilai'] == 9 ? "selected" : "";?>>9 - mutlak penting dari
                                </option>
                                <option value="0.5" <?=$m['nilai'] == 0.5 ? "selected" : "";?>>1/2 - mendekati sedikit
                                    lebih
                                    tidak
                                    penting dari</option>
                                <option value="0.3" <?=$m['nilai'] == 0.3 ? "selected" : "";?>>1/3 - sedikit lebih tidak
                                    penting
                                    dari</option>
                                <option value="0.25" <?=$m['nilai'] == 0.25 ? "selected" : "";?>>1/4 - mendekati lebih
                                    tidak
                                    penting dari
                                </option>
                                <option value="0.2" <?=$m['nilai'] == 0.2 ? "selected" : "";?>>1/5 - lebih tidak penting
                                    dari
                                </option>
                                <option value="0.166667" <?=$m['nilai'] == 0.166667 ? "selected" : "";?>>1/6 - mendekati
                                    lebih
                                    mutlak tidak dari
                                </option>
                                <option value="0.142857" <?=$m['nilai'] == 0.142857 ? "selected" : "";?>>1/7 - lebih
                                    mutlak
                                    tidak
                                    dari</option>
                                <option value="0.125" <?=$m['nilai'] == 0.125 ? "selected" : "";?>>1/8 - mendekati
                                    mutlak tidak
                                    penting dari
                                </option>
                                <option value="0.11" <?=$m['nilai'] == 0.11 ? "selected" : "";?>>1/9 - mutlak tidak
                                    penting dari
                                </option>
                            </select>
                            <b>
                                <?php foreach ($kriteria as $k): ?>
                                <?php if ($k['kriteria_id'] == $m['k2']): ?>
                                <?=$k['kriteria_nama'];?>
                                <?php endif?>
                                <?php endforeach?>
                            </b>
                        </div>
                        <?php endforeach?>

                    </div>
                    <div class="col-lg-8 col-sm-12">
                        <div class="col-12 mt-3">
                            <table class="table table-bordered text-center col-12">
                                <thead class="thead-light">
                                    <tr>
                                        <th>KRITERIA</th>
                                        <?php foreach ($kriteria as $k): ?>
                                        <th><?=$k['kriteria_nama'];?></th>
                                        <?php endforeach?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach (range(0, count($kriteria) - 1) as $i): ?>
                                    <tr>
                                        <td><b><?=$kriteria[$i]['kriteria_nama'];?></b></td>
                                        <?php foreach ($hasil['matrik'][$i] as $m): ?>
                                        <td><?=round($m, 3);?></td>
                                        <?php endforeach?>
                                    </tr>
                                    <?php endforeach?>
                                    <tr>
                                        <td><b>TOTAL</b></td>
                                        <?php foreach ($hasil['total'] as $t): ?>
                                        <td><?=round($t, 3);?></td>
                                        <?php endforeach?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="col-12 mt-1">
                            <table class="table table-bordered text-center">
                                <thead class="thead-light">
                                    <tr>
                                        <th>EIGEN</th>
                                        <?php foreach ($kriteria as $k): ?>
                                        <th><?=$k['kriteria_nama'];?></th>
                                        <?php endforeach?>
                                        <th>TOTAL</th>
                                        <th>PV</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach (range(0, count($kriteria) - 1) as $i): ?>
                                    <tr>
                                        <td><b><?=$kriteria[$i]['kriteria_nama'];?></b></td>
                                        <?php foreach ($hasil['eigen']['matrik'][$i] as $n): ?>
                                        <td><?=round($n, 3);?></td>
                                        <?php endforeach?>
                                        <td><?=round($hasil['eigen']['total'][$i], 3);?></td>
                                        <td><?=round($hasil['eigen']['avg'][$i], 3);?></td>
                                    </tr>
                                    <?php endforeach?>
                                </tbody>
                            </table>
                            <table>
                                <tr>
                                    <td>λ max</td>
                                    <td>=<span class="text-danger">

                                            <?=round($hasil['result']['λ'], 3);?>
                                        </span>
                                    </td>
                                </tr>
                                <tr class="mt-2">
                                    <td>CI</td>
                                    <td>=<span class="text-danger">
                                            <?=round($hasil['result']['ci'], 3);?></td>
                                    </span>
                                </tr>
                                <tr class="mt-2">
                                    <td>CR</td>
                                    <td>=<span class="text-danger">
                                            <?=round($hasil['result']['cr'], 3);?></td>
                                    </span>
                                </tr>
                            </table>
                        </div>

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
function update(id, context) {
    console.log(id);
    console.log(context.value);
    fetch(`/ahp/nilai/kriteria/update/${id}/${context.value}`)
        .then(res => res.json())
        .then(res => {
            console.log(res);
            alert = document.getElementById("alert");
            alert.style.opacity = 1;
            alert.style.height = 'initial';
            window.location.reload();
            setTimeout(() => {
                alert.style.opacity = 0;
                alert.style.height = 0;
            }, 2000);
        })
}
</script>
<?=$this->endSection()?>