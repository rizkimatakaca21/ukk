<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Penjualan Controller
 *
 * @property \App\Model\Table\PenjualanTable $Penjualan
 */
class PenjualanController extends AppController
{
    public function index()
    {
        $query = $this->Penjualan->find();
        $penjualan = $this->paginate($query);

        $this->set(compact('penjualan'));
    }

    public function view($id = null)
    {
        $penjualanEntity = $this->Penjualan->get($id, contain: ['Detailpenjualan']);
        $this->set(compact('penjualanEntity'));
    }

    public function add()
    {
        $penjualanEntity = $this->Penjualan->newEmptyEntity();
        $produkTable = $this->fetchTable('Produk');

        if ($this->request->is('post')) {
            $data = $this->request->getData();

            $detail = array_values(array_filter(
                $data['detailpenjualan'] ?? [],
                fn($row) => !empty($row['ProdukID']) && !empty($row['JumlahProduk']),
            ));

            
            $ids = array_column($detail, 'ProdukID');
            $produkRows = $ids
                ? $produkTable->find()
                    ->select(['ProdukID', 'NamaProduk', 'Harga', 'Stok'])
                    ->where(['ProdukID IN' => $ids])
                    ->all()
                    ->indexBy('ProdukID')
                    ->toArray()
                : [];

            $errors = [];
            $total = 0;
            $diminta = [];
            if (!$detail) {
                $errors[] = 'Pilih minimal satu produk.';
            }

            foreach ($detail as $i => $row) {
                $produk = $produkRows[$row['ProdukID']] ?? null;
                if (!$produk) {
                    $errors[] = 'Produk tidak ditemukan.';
                    continue;
                }

                $jumlah = (int)$row['JumlahProduk'];
                $diminta[$produk->ProdukID] = ($diminta[$produk->ProdukID] ?? 0) + $jumlah;

                if ($diminta[$produk->ProdukID] > (int)$produk->Stok) {
                    $errors[] = "Stok {$produk->NamaProduk} tidak cukup (sisa {$produk->Stok}).";
                }

                $subtotal = (float)$produk->Harga * $jumlah;
                $detail[$i]['SubTotal'] = $subtotal;
                $total += $subtotal;
            }

            $data['detailpenjualan'] = $detail;
            $data['TotalHarga'] = $total;

            $penjualanEntity = $this->Penjualan->patchEntity($penjualanEntity, $data, [
                'associated' => ['Detailpenjualan'],
            ]);

            if ($errors) {
                $this->Flash->error(implode(' ', array_unique($errors)));
            } else {
                $saved = $this->Penjualan->getConnection()->transactional(
                    function () use ($penjualanEntity, $diminta, $produkTable) {
                        if (!$this->Penjualan->save($penjualanEntity)) {
                            return false;
                        }
                        foreach ($diminta as $produkId => $jumlah) {
                            $produkTable->updateAll(
                                ['Stok = Stok - ' . (int)$jumlah],
                                ['ProdukID' => $produkId],
                            );
                        }

                        return true;
                    },
                );

                if ($saved) {
                    $this->Flash->success(__('The penjualan has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The penjualan could not be saved. Please, try again.'));
            }
        }


        $produkList = [];
        $hargaMap = [];
        foreach ($produkTable->find()->select(['ProdukID', 'NamaProduk', 'Harga'])->all() as $p) {
            $produkList[$p->ProdukID] = $p->NamaProduk;
            $hargaMap[$p->ProdukID] = (float)$p->Harga;
        }

        $this->set(compact('penjualanEntity', 'produkList', 'hargaMap'));
    }

    public function edit($id = null)
    {
        $penjualanEntity = $this->Penjualan->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $penjualanEntity = $this->Penjualan->patchEntity($penjualanEntity, $this->request->getData());
            if ($this->Penjualan->save($penjualanEntity)) {
                $this->Flash->success(__('The penjualan has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The penjualan could not be saved. Please, try again.'));
        }
        $this->set(compact('penjualanEntity'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $penjualanEntity = $this->Penjualan->get($id);
        if ($this->Penjualan->delete($penjualanEntity)) {
            $this->Flash->success(__('The penjualan has been deleted.'));
        } else {
            $this->Flash->error(__('The penjualan could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}