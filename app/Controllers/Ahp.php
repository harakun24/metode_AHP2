<?php

namespace App\Controllers;

class Ahp extends BaseController
{
    public function __construct()
    {
        $this->admin = new Admin();
        $this->user = new \App\Models\adminModel();
        $this->kriteria = new \App\Models\kriteriaModel();
        $this->mk = new \App\Models\mkriteriaModel();
        $this->ms = new \App\Models\msubModel();
        $this->hasil = new \App\Models\hasilModel();
        $this->mj = new \App\Models\mjurusanModel();
        $this->nj = new \App\Models\njModel();
        $this->ns = new \App\Models\nsubModel();
        $this->jurusan = new \App\Models\jurusanModel();
        $this->peserta = new \App\Models\siswaModel();
        $this->sub = new \App\Models\subModel();
        $this->tanya = new \App\Models\tanyaModel();
        $this->jawab = new \App\Models\jawabModel();
    }
    public function index()
    {
        if ($this->admin->isLogged()) {
            $tipe = $this->admin::$session->get("tipe");
            if ($tipe == "admin") {
                $data = [
                    'user' => $this->admin::$session->get('user'),
                    'kriteria' => $this->kriteria->findAll(),
                    'sub' => $this->sub->findAll(),
                    'jurusan' => $this->jurusan->findAll(),
                    'peserta' => $this->peserta->findAll(),
                ];
                return view('admin/home.php', $data);
            } else {
                return view('siswa/home.php', [
                    'user' => $this->admin::$session->get('user'),
                    'userid' => $this->admin::$session->get('userid'),
                    'minat' => $this->peserta->find($this->admin::$session->get('userid')),
                    'tanya' => $this->tanya->findAll(),
                    'jawab' => $this->jawab->findAll(),
                ]);
            }
            // return view("ahp/home", $data);
        } else {
            return redirect()->to("/");
        }
    }
    public function user()
    {
        if ($this->admin->isLogged()) {
            return view("admin/user", [
                'user' => $this->admin::$session->get('user'),
                'users' => $this->user->findAll()]);
        } else {
            return redirect()->to("/");
        }
    }
    public function add_user()
    {
        $this->user->save([
            'admin_nama' => $this->request->getVar('nama'),
            'admin_uname' => $this->request->getVar('uname'),
            'admin_pass' => $this->request->getVar('pass'),
        ]);
        session()->setFlashData('save', true);
        return redirect()->to("/ahp/user");
    }
    public function edit_user($id)
    {
        $tmp = $this->user->find($id);
        if ($tmp['admin_nama'] == $this->admin::$session->get('user')) {
            $this->admin::$session->set('user', $this->request->getVar("nama"));
        }
        $this->user->save([
            'admin_id' => $id,
            'admin_nama' => $this->request->getVar('nama'),
            'admin_uname' => $this->request->getVar('uname'),
            'admin_pass' => $this->request->getVar('pass'),
        ]);

        session()->setFlashData('edit', true);
        return redirect()->to("/ahp/user");
    }

    public function hapus_user($id)
    {
        $this->user->delete($id);
        session()->setFlashData('del', true);
        return redirect()->to('/ahp/user');
    }
    public function get_user($id)
    {
        return json_encode($this->user->find($id));
    }

    public function kriteria()
    {
        if ($this->admin->isLogged()) {
            return view("admin/kriteria", [
                'user' => $this->admin::$session->get('user'),
                'kriteria' => $this->kriteria->findAll()]);
        } else {
            return redirect()->to("/");
        }
    }
    public function add_kriteria()
    {
        $this->kriteria->save([
            'kriteria_nama' => $this->request->getVar('nama'),
        ]);
        session()->setFlashData('save', true);
        return redirect()->to("/ahp/kriteria");
    }

    public function edit_kriteria($id)
    {
        $this->kriteria->save([
            'kriteria_id' => $id,
            'kriteria_nama' => $this->request->getVar('nama'),
        ]);
        session()->setFlashData('edit', true);
        return redirect()->to("/ahp/kriteria");
    }

    public function hapus_kriteria($id)
    {
        $this->kriteria->delete($id);
        session()->setFlashData('del', true);
        return redirect()->to('/ahp/kriteria');
    }

    public function get_kriteria($id)
    {
        return json_encode($this->kriteria->find($id));
    }
    // jurusan
    public function jurusan()
    {
        if ($this->admin->isLogged()) {
            return view("admin/jurusan", [
                'user' => $this->admin::$session->get('user'),
                'jurusan' => $this->jurusan->findAll()]);
        } else {
            return redirect()->to("/");
        }
    }
    public function add_jurusan()
    {
        $this->jurusan->save([
            'jurusan_nama' => $this->request->getVar('nama'),
        ]);
        session()->setFlashData('save', true);
        return redirect()->to("/ahp/jurusan");
    }

    public function edit_jurusan($id)
    {
        $this->jurusan->save([
            'jurusan_id' => $id,
            'jurusan_nama' => $this->request->getVar('nama'),
        ]);
        session()->setFlashData('edit', true);
        return redirect()->to("/ahp/jurusan");
    }

    public function hapus_jurusan($id)
    {
        $this->jurusan->delete($id);
        session()->setFlashData('del', true);
        return redirect()->to('/ahp/jurusan');
    }

    public function get_jurusan($id)
    {
        return json_encode($this->jurusan->find($id));
    }
    // tanya
    public function tanya()
    {
        if ($this->admin->isLogged()) {
            return view("admin/tanya", [
                'user' => $this->admin::$session->get('user'),
                'tanya' => $this->tanya->findAll(),
                'jawab' => $this->jawab->findAll(),
                'jurusan' => $this->jurusan->findAll()]);
        } else {
            return redirect()->to("/");
        }
    }
    public function add_tanya()
    {
        $this->tanya->save([
            'pertanyaan' => $this->request->getVar('pertanyaan'),
        ]);
        session()->setFlashData('save', true);
        return redirect()->to("/ahp/tanya");
    }

    public function add_jawab($id)
    {
        $this->jawab->save([
            'pertanyaan' => $id,
            'jurusan' => $this->request->getVar('jurusan'),
            'pilihan' => $this->request->getVar('jawaban'),
            'nilai' => $this->request->getVar('nilai'),
        ]);
        session()->setFlashData('save', true);
        return redirect()->to("/ahp/tanya");
    }

    public function edit_tanya($id)
    {
        $this->tanya->save([
            'pertanyaan_id' => $id,
            'pertanyaan' => $this->request->getVar('pertanyaan'),
        ]);
        session()->setFlashData('edit', true);
        return redirect()->to("/ahp/tanya");
    }

    public function edit_jawab($id)
    {
        $this->jawab->save([
            'pilihan_id' => $id,
            'jurusan' => $this->request->getVar('jurusan'),
            'pilihan' => $this->request->getVar('jawaban'),
            'nilai' => $this->request->getVar('nilai'),
        ]);
        session()->setFlashData('edit', true);
        return redirect()->to("/ahp/tanya");
    }

    public function hapus_tanya($id)
    {
        $this->tanya->delete($id);
        session()->setFlashData('del', true);
        return redirect()->to('/ahp/tanya');
    }

    public function hapus_jawab($id)
    {
        $this->jawab->delete($id);
        session()->setFlashData('del', true);
        return redirect()->to('/ahp/tanya');
    }

    public function get_tanya($id)
    {
        return json_encode($this->tanya->find($id));
    }

    public function get_jawab($id)
    {
        return json_encode($this->jawab->find($id));
    }
    // peserta
    public function peserta()
    {
        if ($this->admin->isLogged()) {
            return view("admin/peserta", [
                'user' => $this->admin::$session->get('user'),
                'peserta' => $this->peserta->findAll()]);
        } else {
            return redirect()->to("/");
        }
    }
    public function add_peserta()
    {
        $this->peserta->save([
            'peserta_nisn' => $this->request->getVar('nisn'),
            'peserta_nama' => $this->request->getVar('nama'),
            'peserta_jk' => $this->request->getVar('jk'),
            'peserta_alamat' => $this->request->getVar('alamat'),
        ]);
        session()->setFlashData('save', true);
        return redirect()->to("/ahp/peserta");
    }

    public function edit_peserta($id)
    {
        $this->peserta->save([
            'peserta_id' => $id,
            'peserta_nisn' => $this->request->getVar('nisn'),
            'peserta_nama' => $this->request->getVar('nama'),
            'peserta_jk' => $this->request->getVar('jk'),
            'peserta_alamat' => $this->request->getVar('alamat'),
        ]);
        session()->setFlashData('edit', true);
        return redirect()->to("/ahp/peserta");
    }

    public function kuis_peserta($id)
    {
        $jurusan = $this->jurusan->findAll();
        for ($i = 0; $i < count($jurusan); $i++) {
            $jurusan[$i]['total'] = 0;
        }
        foreach ($this->request->getVar() as $res) {
            $tmp = explode("-", $res);
            for ($i = 0; $i < count($jurusan); $i++) {
                if ($tmp[0] == $jurusan[$i]['jurusan_id']) {
                    $jurusan[$i]['total'] += $tmp[1];
                }

            }
        }
        d($jurusan);
        foreach ($jurusan as $j) {
            if ($j['total'] > 79) {
                $header = 'A1';
            } else if ($j['total'] > 59) {
                $header = 'A2';
            } else if ($j['total'] > 39) {
                $header = 'A3';
            } else if ($j['total'] > 29) {
                $header = 'A4';
            } else {
                $header = 'A5';
            }
            $this->nj->save([
                'peserta' => $this->admin::$session->get("userid"),
                'kriteria' => $this->kriteria->where([
                    'kriteria_nama' => 'MINAT',
                ])->first()['kriteria_id'],
                'jurusan' => $j['jurusan_id'],
                'nilai' => $this->sub->where([
                    'sub_nama' => $header,
                ])->first()['sub_id'],
            ]);
        }
        d($this->admin::$session->get('userid'));
        $this->peserta->save([
            'peserta_id' => $this->admin::$session->get('userid'),
            'minat' => true,
        ]);
        // dd($this->request->getVar());
        return redirect()->to("/");
    }

    public function hapus_peserta($id)
    {
        $this->peserta->delete($id);
        session()->setFlashData('del', true);
        return redirect()->to('/ahp/peserta');
    }

    public function get_peserta($id)
    {
        return json_encode($this->peserta->find($id));
    }
    // sub
    public function sub()
    {
        if ($this->admin->isLogged()) {
            return view("admin/sub", [
                'user' => $this->admin::$session->get('user'),
                'kriteria' => $this->kriteria->findAll()]);
        } else {
            return redirect()->to("/");
        }
    }
    public function add_sub()
    {
        $this->sub->save([
            'kriteria_id' => $this->request->getVar('kriteria'),
            'sub_nama' => $this->request->getVar('nama'),
        ]);
        session()->setFlashData('save', true);
        return redirect()->to("/ahp/sub");
    }

    public function edit_sub($id)
    {
        $this->sub->save([
            'sub_id' => $id,
            'sub_nama' => $this->request->getVar('nama'),
        ]);
        session()->setFlashData('edit', true);
        return redirect()->to("/ahp/sub");
    }

    public function hapus_sub($id)
    {
        $this->sub->delete($id);
        session()->setFlashData('del', true);
        return redirect()->to('/ahp/sub');
    }

    public function get_sub($id)
    {
        return json_encode($this->sub->find($id));
    }

    // nilai
    public function matrik($data, $mt, $key, $kk, $id = false)
    {
        for ($i = 0; $i < count($data); $i++) {
            for ($j = 0; $j < $i; $j++) {
                if ($i != $j) {
                    if ($id) {
                        $m = $this->$mt->where([
                            $key[0] => $data[$i][$kk],
                            $key[1] => $data[$j][$kk],
                            'sub' => $id,
                        ])->first();
                        if ($m == null) {
                            $this->$mt->save([
                                'sub' => $id,
                                $key[0] => $data[$i][$kk],
                                $key[1] => $data[$j][$kk],
                                'nilai' => 1,
                            ]);
                        }
                    } else {
                        $m = $this->$mt->where([
                            $key[0] => $data[$i][$kk],
                            $key[1] => $data[$j][$kk],
                        ])->first();
                        if ($m == null) {
                            $this->$mt->save([
                                $key[0] => $data[$i][$kk],
                                $key[1] => $data[$j][$kk],
                                'nilai' => 1,
                            ]);
                        }
                    }
                }
            }
        }
        if ($id) {
            $mk = $this->$mt->where(['sub' => $id])->findAll();
        } else {
            $mk = $this->$mt->findAll();
        }
        $matrik = [];
        foreach ($data as $k1) {
            $tmp = [];
            foreach ($data as $k2) {
                if ($k1 == $k2) {
                    $tmp[] = 1;
                } else {
                    foreach ($mk as $m) {
                        if ($m[$key[0]] == $k1[$kk] &&
                            $m[$key[1]] == $k2[$kk]) {
                            $tmp[] =
                                $m['nilai'];
                        }
                        if ($m[$key[1]] == $k1[$kk] &&
                            $m[$key[0]] == $k2[$kk]) {
                            $tmp[] =
                                1 / $m['nilai'];
                        }
                    }
                }
            }
            $matrik[] = $tmp;
        }
        $total = [];
        for ($i = 0; $i < count($matrik); $i++) {
            $total[$i] = 0;
            for ($j = 0; $j < count($matrik); $j++) {
                $total[$i] += $matrik[$j][$i];
            }
        }
        $eigen = [
            'total' => [],
            'matrik' => [],
            'avg' => [],
        ];
        for ($i = 0; $i < count($matrik); $i++) {
            $eigen['matrik'][$i] = [];
            for ($j = 0; $j < count($matrik); $j++) {
                $eigen['matrik'][$i][$j] = $matrik[$i][$j] / $total[$j];
            }
        }

        for ($i = 0; $i < count($matrik); $i++) {
            $eigen['total'][$i] = array_sum($eigen['matrik'][$i]);
            for ($j = 0; $j < count($matrik); $j++) {
                $eigen['avg'][$i] = $eigen['total'][$i] / count($matrik);
            }
        }

        $result = [
        ];
        $tmp = 0;
        for ($i = 0; $i < count($total); $i++) {
            $tmp += $total[$i] * $eigen['avg'][$i];
        }
        $result['λ'] = $tmp;
        $result['ri'] = 0;
        switch (count($total)) {
            case 1:
            case 2:
            case 3:
                $result['ri'] = 0.58;
                break;
            case 4:
                $result['ri'] = 0.90;
                break;
            case 5:
                $result['ri'] = 1.12;
                break;
            case 6:
                $result['ri'] = 1.24;
                break;
            case 7:
                $result['ri'] = 1.32;
                break;
            case 8:
                $result['ri'] = 1.41;
                break;
            case 9:
                $result['ri'] = 1.45;
                break;
            case 10:
                $result['ri'] = 0.49;
                break;
            case 11:
                $result['ri'] = 1.51;
                break;
            case 12:
                $result['ri'] = 1.48;
                break;
            case 13:
                $result['ri'] = 1.56;
                break;
            case 14:
                $result['ri'] = 1.57;
                break;
            case 15:
                $result['ri'] = 0.59;
                break;
        }
        $result['ci'] = ($result['λ'] - count($total)) / (count($total) - 1);
        $result['cr'] = $result['ci'] / $result['ri'];
        return [
            'matrik' => $matrik,
            'total' => $total,
            'eigen' => $eigen,
            'result' => $result,
        ];
    }
    public function matrik_kriteria()
    {
        if ($this->admin->isLogged()) {
            $k = $this->kriteria->findAll();
            $hasil = $this->matrik(
                $k,
                'mk',
                ['k1', 'k2'],
                'kriteria_id'
            );
            // dd($hasil);
            return view("admin/m_kriteria", [
                'user' => $this->admin::$session->get('user'),
                'kriteria' => $this->kriteria->findAll(),
                'mk' => $this->mk->findAll(),
                'hasil' => $hasil]);
        } else {
            return redirect()->to("/");
        }
    }
    public function matrik_sub($id)
    {
        if ($this->admin->isLogged()) {
            $sk = $this->sub->where(['kriteria_id' => $id])->findAll();
            $hasil = $this->matrik(
                $sk,
                'ms',
                ['sub1', 'sub2'],
                'sub_id'
            );
            // dd($hasil);
            return view("admin/m_sub", [
                'user' => $this->admin::$session->get('user'),
                'sub' => $sk,
                'k' => $this->kriteria->find($id),
                'ms' => $this->ms->
                    join('subkriteria', 'matrik_sub.sub1 = subkriteria.sub_id')->
                    where(['kriteria_id' => $id])->
                    findAll(),
                'hasil' => $hasil]);
        } else {
            return redirect()->to("/");
        }
    }
    public function matrik_j($id)
    {
        if ($this->admin->isLogged()) {
            $sk = $this->jurusan->findAll();
            $hasil = $this->matrik(
                $sk,
                'mj',
                ['jurusan1', 'jurusan2'],
                'jurusan_id',
                $id
            );
            // dd($hasil);
            return view("admin/m_jurusan", [
                'user' => $this->admin::$session->get('user'),
                'jurusan' => $sk,
                's' => $this->sub->find($id),
                'mj' => $this->mj->
                    where(['sub' => $id])->
                    findAll(),
                'hasil' => $hasil]);
        } else {
            return redirect()->to("/");
        }
    }
    public function matrik_k_update($id, $nilai)
    {
        $this->mk->save([
            'matrik_id' => $id,
            'nilai' => $nilai,
        ]);
        echo json_encode($this->mk->find($id));
    }
    public function matrik_s_update($id, $nilai)
    {
        $this->ms->save([
            'matrik_id' => $id,
            'nilai' => $nilai,
        ]);
        echo json_encode($this->ms->find($id));
    }
    public function matrik_j_update($id, $nilai)
    {
        $this->mj->save([
            'matrik_id' => $id,
            'nilai' => $nilai,
        ]);
        echo json_encode($this->mj->find($id));
    }
    public function nilai()
    {
        if ($this->admin->isLogged()) {

            return view("admin/nilai", [
                'user' => $this->admin::$session->get('user'),
                'siswa' => $this->peserta->findAll()]);
        } else {
            return redirect()->to("/");
        }
    }

    public function nilai_siswa($id)
    {
        $sub = $this->sub->where([
            'kriteria_id' => $this->kriteria->where([
                'kriteria_nama' => 'UN',
            ])->first()['kriteria_id'],
        ])->findAll();
        foreach ($sub as $s) {
            $tmp = $this->ns->where([
                'sub' => $s['sub_id'],
                'peserta' => $id,
            ])->first();
            if ($tmp == null) {
                $this->ns->save([
                    'sub' => $s['sub_id'],
                    'peserta' => $id,
                    'nilai' => 0,
                ]);
            }
        }
        $jurusan = $this->jurusan->findAll();
        foreach ($jurusan as $j) {
            $tmp = $this->nj->where([
                'jurusan' => $j['jurusan_id'],
                'peserta' => $id,
                'kriteria' => $this->kriteria->where([
                    'kriteria_nama' => 'PRESTASI',
                ])->first()['kriteria_id'],
            ])->first();
            if ($tmp == null) {
                $this->nj->save([
                    'jurusan' => $j['jurusan_id'],
                    'peserta' => $id,
                    'kriteria' => $this->kriteria->where([
                        'kriteria_nama' => 'PRESTASI',
                    ])->first()['kriteria_id'],
                    'nilai' => $this->sub->where([
                        'kriteria_id' => $this->kriteria->where([
                            'kriteria_nama' => 'PRESTASI',
                        ])->first()['kriteria_id'],
                    ])->first()['sub_id'],
                ]);
            }
        }
        $res = $this->ns->join('subkriteria',
            'subkriteria.sub_id = nilai_un.sub')->where([
            'peserta' => $id,
        ])->findAll();

        $res2 = $this->nj->join('jurusan',
            'jurusan.jurusan_id = nilai_jurusan.jurusan')->where([
            'peserta' => $id,
        ])->findAll();
        return json_encode([
            'res' => $res,
            'res2' => $res2,
            'sub' => $this->sub->where([
                'kriteria_id' => $this->kriteria->where([
                    'kriteria_nama' => 'PRESTASI',
                ])->first()['kriteria_id'],
            ])->findAll(),
        ]);
    }
    public function nilai_s_update($id, $val)
    {
        $this->ns->save([
            'nilai_id' => $id,
            'nilai' => $val,
        ]);
        return json_encode(['res' => 200]);
    }
    public function nilai_j_update($id, $val)
    {
        $this->nj->save([
            'nilai_id' => $id,
            'nilai' => $val,
        ]);
        return json_encode(['res' => 200]);
    }
}